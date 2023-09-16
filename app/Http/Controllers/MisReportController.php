<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\MisReport;
use App\Models\Purjee;
use App\Models\Unit;
use Illuminate\Http\Request;

class MisReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centers = Center::orderBy('id', 'desc')->get();
        $misData = MisReport::with('center_to_mis', 'unit_to_mis', 'farmer_to_mis', 'purjee_to_mis')->get();
//         dd($misData);
        return view('dashboard.mis_report.index', compact('centers', 'misData'));
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
    public function update(Request $request)
    {
//        dd($request->all());
        $data = MisReport::where('id',$request->purjee_id)->first();
        $data->purjee_id = $request->purjee_id;
        $data->total_loan = $request->total_loan;
        $data->actual_weight_date = $request->actual_weight_date;
        $data->purchase_sheet_no = $request->purchase_sheet_no;
        $data->weight_vauchar = $request->weight_vauchar;
        $data->actual_weight = $request->actual_weight;
        $data->price = $request->price;
        $data->total_price = $request->total_price;
        $data->loan_deduction = $request->loan_deduction;
        $data->loan_purpose = $request->loan_purpose;
        $data->sarak_khat = $request->sarak_khat;
        $data->shikkha_khat = $request->shikkha_khat;
        $data->grower_khat = $request->grower_khat;
        $data->kollyan_khat = $request->kollyan_khat;
        $data->other_khat = $request->other_khat;
        $data->total_deduction = $request->total_deduction;
        $data->net_total = $request->net_total;
        $data->net_cane_weight = $request->net_cane_weight;
        $data->amount_sugar = $request->amount_sugar;
        $data->remaining_loan_amount = $request->remaining_loan_amount;
        $data->remarks = $request->remarks;
        $data->save();
        $notification = array(
            'message' => 'Data Updated successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
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
    public function getUnit($id)
    {
        $unitData = Unit::where('center_id', $id)->get();
        return response()->json($unitData);
    }
    public function infoShow()
    {
        return view('dashboard.mis_report.info_show');
    }

    public function misDataGet(Request $request){
        $center_id = $request->center_id;
        $unit_id = $request->unit_id;
//        $pass_book_number = $request->pass_book_number;
        $data = Purjee::with('farmer', 'rel_to_center', 'rel_to_unit')->where('center_id', $center_id)
            ->Where('unit_id', $unit_id)->get();
        return response()->json($data);
    }

    public function getMisDataIdWise($id){
        $getData = MisReport::where('id', $id)->with('farmer_to_mis', 'purjee_to_mis')->first();
//        dd($getData);
        return response()->json($getData);
    }
    public function printData(){
        $printData = Purjee::with('farmer', 'rel_to_mis', 'rel_to_unit', 'rel_to_center')->get();
//        dd($printData);
        return view('dashboard.mis_report.print_mis_data', compact('printData'));
    }
}
