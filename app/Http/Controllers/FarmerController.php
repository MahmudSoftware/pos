<?php

namespace App\Http\Controllers;

use App\Exports\FarmersExport;
use App\Models\Farmer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreFarmerRequest;
use App\Http\Requests\UpdateFarmerRequest;
use App\Imports\FarmersImport;
use App\Models\Center;
use App\Models\Office;
use App\Models\TempFarmer;
use App\Models\Unit;
use App\Models\YearSetup;
use App\Service\generate_code;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class FarmerController extends Controller
{
    /**
     * Role Permission
     */
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

             $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('dashboard.farmer.index')) {
            abort(403, 'Unauthorized Access');
        }
        $farmers = Farmer::where('office_id', Auth()->user()->office_id )->orderBy('id', 'asc')->with('rel_to_center', 'rel_to_unit')->paginate(10);
        $offices = Office::orderBy('id', 'asc')->get();
        $seasons = YearSetup::where('office_id', Auth()->user()->office_id )->orderBy('id', 'asc')->get();
        $centers = Center::where('status', '1')->where('office_id', Auth()->user()->office_id )->orderBy('name','ASC')->get();
        $units = Unit::where('status', '1')->where('office_id', Auth()->user()->office_id )->orderBy('name','ASC')->get();
        return view('dashboard.farmer.index', compact('centers', 'units', 'farmers', 'offices', 'seasons'));
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
     * @param  \App\Http\Requests\StoreFarmerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'father_name' => 'required',
            'bn_first_name' => 'required',
            'bn_last_name' => 'required',
            'bn_father_name' => 'required',
            'phone' => 'required',
            'phone_status' => 'required',
            'status' => 'required',
            'pass_book_number' => 'required',
            'nid' => 'required',
            'is_loan' => 'required',
            'loan_amount' => 'required',
            'remain_loan' => 'required',
            'invested_loan_amount' => 'required',
            'remain_cart' => 'required',
            'center_id' => 'required',
            'unit_id' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $farmer = new Farmer();
            $farmer->office_id              = $request->office_id;
            $farmer->center_id              = $request->center_id;
            $farmer->unit_id                = $request->unit_id;
            $farmer->first_name             = $request->first_name;
            $farmer->bn_first_name          = $request->bn_first_name;
            $farmer->last_name              = $request->last_name;
            $farmer->bn_last_name           = $request->bn_last_name;
            $farmer->father_name            = $request->father_name;
            $farmer->bn_father_name         = $request->bn_father_name;
            $farmer->phone                  = $request->phone;
            $farmer->pass_book_number       = $request->pass_book_number;
            $farmer->nid                    = $request->nid;
            $farmer->phone_status           = $request->phone_status;
            $farmer->status                 = $request->status;
            $farmer->is_loan                = $request->loan_amount;
            $farmer->remain_loan            = $request->remain_loan;
            $farmer->invested_loan_amount   = $request->invested_loan_amount;
            $farmer->remain_cart            = $request->remain_cart;
            $farmer->total_cane             = $request->total_cane;
            $farmer->supplied_cane          = $request->supplied_cane;
            $farmer->supplied_cane_cart     = $request->supplied_cane_cart;
            $farmer->village                = $request->village;
            $farmer->save();
            DB::commit();
            $notification = array(
                'message' => 'Farmer Added successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            DB::rollBack();
            $notification = array(
                'message' => 'Data Error!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function show(Farmer $farmer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        $farmer = Farmer::findOrFail($id);
        // dd($farmer);
        $centers = Center::where('status', '1')->orderBy('name')->get();
        $units = Unit::where('status', '1')->orderBy('name')->get();
        return view('dashboard.farmer.edit', compact('farmer','centers', 'units'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFarmerRequest  $request
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        try {
            DB::beginTransaction();
            $farmer = Farmer::findOrFail($id);
            $farmer->center_id              = $request->center_id;
            $farmer->unit_id                = $request->unit_id;
            $farmer->first_name             = $request->first_name;
            $farmer->bn_first_name          = $request->bn_first_name;
            $farmer->last_name              = $request->last_name;
            $farmer->bn_last_name           = $request->bn_last_name;
            $farmer->father_name            = $request->father_name;
            $farmer->bn_father_name         = $request->bn_father_name;
            $farmer->phone                  = $request->phone;
            $farmer->pass_book_number       = $request->pass_book_number;
            $farmer->nid                    = $request->nid;
            $farmer->phone_status           = $request->phone_status;
            $farmer->status                 = $request->status;
            $farmer->is_loan                = $request->loan_amount;
            $farmer->remain_loan            = $request->remain_loan;
            $farmer->invested_loan_amount   = $request->invested_loan_amount;
            $farmer->remain_cart            = $request->remain_cart;
            $farmer->total_cane             = $request->total_cane;
            $farmer->supplied_cane          = $request->supplied_cane;
            $farmer->supplied_cane_cart     = $request->supplied_cane_cart;
            $farmer->village                = $request->village;
            $farmer->save();
            DB::commit();
            $notification = array(
                'message' => 'Farmer Updated successfully!',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } catch (\Throwable $th) {
            DB::rollBack();
            $notification = array(
                'message' => 'Data Not Found!',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Farmer $farmer)
    {
        $farmer->delete();
        return response()->json('Farmer Deleted Successfully');
    }

    /**
     * Active the specified resource from storage.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */
    public function active(Farmer $farmer)
    {
        $farmer->status = 1;
        $farmer->save();
        return response()->json('Farmer Activated Successfully');
    }

    /**
     * De-active the specified resource from storage.
     *
     * @param  \App\Models\Farmer  $farmer
     * @return \Illuminate\Http\Response
     */

    public function deactive(Farmer $farmer)
    {
        $farmer->status = 0;
        $farmer->save();
        return response()->json('Farmer Deactivated Successfully');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function fileImport(Request $request,  generate_code $codeGenerate)
    {
        $formData = $request->validate([
            'import_file' => 'required',
        ]);

        Excel::import(new FarmersImport(), $request->file('import_file')->store('temp'));

        $tempDatas = TempFarmer::get();

        foreach ($tempDatas as $key => $tempData) {

            $center = new Center();

            $checkCenter = Center::where('name', $tempData->center_name)->first();

            $centerId = null;

            if (!isset($checkCenter)){
                if (! $tempData->center_name == '' || ! $tempData->center_name == null) {
                    $center->name = $tempData->center_name;
                    $center->address = $tempData->center_address;
                    $center->save();
                    $centerId = $center->id;
                }
            }else{
                $centerId = $checkCenter->id;
            }

            $unit = new Unit();

            $checkUnit = Unit::where('name', $tempData->unit_number)->first();

            $unitId = null;

            if (!isset($checkUnit)) {
                if (!$tempData->unit_number == '' || !$tempData->unit_number == null) {
                    $unit->name = $tempData->unit_number;
                    $unit->center_id = $centerId;
                    $unit->cic_name = $tempData->cic_name;
                    $unit->cic_number = $tempData->cic_number;
                    $unit->cda_name = $tempData->cda_name;
                    $unit->cda_number = $tempData->cda_number;
                    $unit->save();
                    $unitId = $unit->id;
                }

            }else{
                $unitId = $checkUnit->id;
            }

            $farmer = new Farmer();

            $farmerName = $tempData->farmer_name;
            $bnFarmerName = $tempData->farmer_name_bn;

            $farmerNameArr = explode(' ', $farmerName);
            $bnFarmerNameArr = explode(' ', $bnFarmerName);

            $farmerFirstName = null;
            $farmerLastName = null;

            $bnFarmerFirstName = null;
            $bnFarmerLastName = null;

            foreach ($farmerNameArr as $key => $value) {
                if ($value != end($farmerNameArr)) {
                    $farmerFirstName = $farmerFirstName . ' ' . $value;
                }
                if ($value == end($farmerNameArr)) {
                    $farmerLastName = $value;
                }
            }

            foreach ($bnFarmerNameArr as $key => $value) {
                if ($value != end($bnFarmerNameArr)) {
                    $bnFarmerFirstName = $bnFarmerFirstName . ' ' . $value;
                }
                if ($value == end($bnFarmerNameArr)) {
                    $bnFarmerLastName = $value;
                }
            }
            $farmer->office_id = $request->office_id;
            $farmer->season_id = $request->season_id;
            $farmer->center_id = $centerId;
            $farmer->unit_id = $unitId;
            $farmer->first_name = $farmerFirstName;
            $farmer->last_name = $farmerLastName;
            $farmer->bn_first_name = $bnFarmerFirstName;
            $farmer->bn_last_name = $bnFarmerLastName;
            $farmer->father_name = $tempData->farmer_father_name;
            $farmer->bn_father_name = $tempData->farmer_father_name_bn;
            $farmer->phone = $tempData->mobile;
            $farmer->pass_book_number = $tempData->pb_number;
            $farmer->nid = $tempData->nid;
            $farmer->phone_status = 1;
            $farmer->status = $tempData->status;
            $farmer->is_loan = $tempData->lone_status;
            $farmer->is_loan = $tempData->lone_status;
            $farmer->is_loan = $tempData->lone_status;
            $farmer->remain_loan = $tempData->remain_loan;
            $farmer->invested_loan_amount = 0;
            $farmer->remain_cart = 0;
            $farmer->total_cane = 0;
            $farmer->supplied_cane = 0;
            $farmer->supplied_cane_cart = 0;
            $farmer->village = $tempData->village;
            $farmer->save();
        }
        return response()->json('Farmer Uploaded Successfully');
    }

    /*public function fileImport(Request $request, generate_code $codeGenerate)
    {
        Excel::import(new FarmersImport, $request->file('import_file'), null, \Maatwebsite\Excel\Excel::XLSX);

        return response()->json('Farmer Uploaded Successfully');
    }*/

    public function excel()
    {
        // return Excel::download(new DepertmentsExport, 'depertments.html', \Maatwebsite\Excel\Excel::HTML); // download html formated file
        // return Excel::download(new DepertmentsExport, 'depertments.xlsx', \Maatwebsite\Excel\Excel::XLSX); // download excel formated file
        return new FarmersExport();
    }
    public function getData($id){
        $farmerData = Farmer::where('id', $id)->with('rel_to_center', 'rel_to_unit')->first();
        return response()->json($farmerData);
    }
}
