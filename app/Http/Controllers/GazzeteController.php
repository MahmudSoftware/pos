<?php

namespace App\Http\Controllers;

use App\Models\Farmer;
use App\Models\FinalGazetteList;
use App\Models\GazetteGrower;
use App\Models\GazetteList;
use App\Models\MillYearlySetup;
use App\Models\Purjee;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\GazetteExport;
use Maatwebsite\Excel\Facades\Excel;

class GazzeteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.gazzete.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function gazzeteList()
    {

        $finalGazzetDay = FinalGazetteList::max('day');

        $purjeeQuota = Farmer::where('office_id', Auth()->user()->office_id)->sum('remain_cart');

        $cropData = MillYearlySetup::orderBy('id', 'DESC')->take(1)->first();

        $cropDay = $cropData->crop_day;

        $units = Unit::with('rel_to_center', 'rel_to_farmer', 'rel_to_final_gazzert_list')->where('office_id', Auth()->user()->office_id)->get();

        // return $units;

        return view('dashboard.gazzete.e_gazzete_list', compact('units', 'purjeeQuota', 'cropDay', 'finalGazzetDay'));
    }
    public function editGazzete()
    {
        return view('dashboard.gazzete.edit_gazzete_list');
    }

    public function egazzeteGenerate(Request $request)
    {
       //return $request->all();

        GazetteGrower::truncate();
        GazetteList::truncate();

        $farmerData = Farmer::where('unit_id', $request->unit_id)->where('remain_cart', '>', 0)->get();

        //  return $farmerData->count();

        $data = [];
        $i = 0;
        foreach ($farmerData->toArray() as $key => $value) {
            $i++;
            $data[] = [
                'psl_no' => $value['pass_book_number'],
                'office_id' => Auth::user()->office_id,
                'unit_id' => $value['unit_id'],
                'farmer_id' => $value['id'],
                'grower_name' => $value['first_name'],
                'father_name' => $value['first_name'],
                'mobile_no' => $value['phone'],
                'loan_status' => $value['is_loan'],
                'current_loan' => $value['remain_loan'],
                'remain_cart' => $value['remain_cart'] - $i,
            ];
        }
        GazetteGrower::insert($data);



        $starting_day = $request->starting_dat;
        $day_number = $request->end_day;
        $cart_price = $request->total_price;
        $crop_day = $request->crop_day;
        // dd($crop_day);
        // die;
        $day_n = 0;

        for ($k = 0; $k < $day_number; ++$k) {

            $daily_quota = $request->daily_quota;



            for ($q = 0; $q < $daily_quota; $q++) {

                //$purjeeSirialNumbers = GazetteGrower::where('remain_cart','>',0)->get();

                $purjeeSirialNumbers = GazetteGrower::orderBy('remain_cart','DESC')->where('remain_cart', '>', 0)->get();
                // dd($purjeeSirialNumbers);
                // die;

               //  return $purjeeSirialNumbers;

                foreach ($purjeeSirialNumbers as $row_loan) {
                    $psl_no = $row_loan['psl_no'];
                    $grower_id_loan = $row_loan['farmer_id'];
                    $date = date("Y-m-d");
                    $day_n = $k + 1;
                    $day_remain_cart = $k -1;

                    $cartPriceData = $k * $request->total_price;

                    $remain_cart = $row_loan['remain_cart'] - $day_remain_cart;
                    $loop_val = ceil($remain_cart /  $crop_day);

                    $current_loan = $row_loan['current_loan'];

                    $unit_id = $row_loan['unit_id'];
                    $current_loan = $current_loan - $cartPriceData;
                    // dd($current_loan);
                    // die;
                    if($current_loan - $cartPriceData > 0){

                        $current_loan = $current_loan - $cartPriceData;
                    }
                    else{
                        $current_loan = 0;
                    }
                    for ($jj = 0; $jj < $loop_val; $jj++) {
                        if ($daily_quota < 1) {
                            break;
                        }

                        $daily_quota--;
                        $gazetteListData = [
                            'unit_id' => $unit_id,
                            'office_id' => Auth::user()->office_id,
                            'grower_id' => $grower_id_loan,
                            'psl_no' => $psl_no,
                            'day' => $day_n,
                            'generate_date' => $date,
                            'current_loan' => $current_loan,
                            'remain_cart' => $remain_cart,
                        ];
                        // dd($gazetteListData);
                        // die;
                        GazetteList::create($gazetteListData);
                    }

                    // $gazetteGrowersData = [
                    //     'current_loan' => $current_loan,
                    //     'remain_cart' => $remain_cart,
                    // ];

                    // GazetteGrower::where('psl_no', $psl_no)->update($gazetteGrowersData);
                }

            }


        }

        $gazetteListData = GazetteList::all();
        $endDay = $request->end_day;
    return view('dashboard.gazzete.gazzete_generate', compact('gazetteListData','endDay', 'starting_day'));

    }

    public function saveFinalGazzet(Request $request)
    {

       // return $request->all();
       FinalGazetteList::truncate();
        $data = [];
        foreach ($request->day as $key => $value) {
            $dayValue = FinalGazetteList::max('day');
            if ($dayValue != null) {
                $value = $dayValue + max($request->day);
            }
            $data[] = [
                'office_id' => Auth()->user()->office_id,
                'unit_id' => $request->unit_id[$key],
                'grower_id' => $request->grower_id[$key],
                'psl_no' => $request->psl_no[$key],
                'purjee_id' => $request->purjee_id[$key],
                'day' => $value,
                'generate_date' => $request->generate_date[$key],
                'current_loan' => $request->current_loan[$key],
                'remain_cart' => $request->remain_cart[$key],

            ];

            // return $data;


        }


        foreach($data as $datagazeteLise){

            $gazetteListData = Farmer::where('id',$datagazeteLise['grower_id'])->get();


        }



    //   $farmerData = Farmer::all();

    //   foreach{

    //   }
    //     return $data;
        // Save the loop data to the CuponDetails model
        FinalGazetteList::insert($data);

        $lastGrowerData = [];
        foreach ($data as $item) {
            $lastGrowerData[$item['grower_id']] = [
                'current_loan' => $item['current_loan'],
                'remain_cart' => $item['remain_cart'],
            ];
        }

        foreach ($lastGrowerData as $growerId => $values) {
            // Update farmers table for each distinct grower_id
            Farmer::where('id', $growerId) // Assuming 'id' is the primary key of farmers table
                ->update([
                    'is_loan' => $values['current_loan'],
                    'remain_cart' => $values['remain_cart'],
                ]);
        }

        return redirect('/admin/gazzete/e-gazzete-List');
    }
    public function exportToExcel()
    {
        return Excel::download(new GazetteExport(), 'gazette.xlsx');
    }
}
