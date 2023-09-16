<?php

namespace App\Http\Controllers;

use App\Models\MillYearlySetup;
use App\Models\Office;
use App\Models\YearSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MillYearlySetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::orderBy('id', 'desc')->get();
        $yearSetups = YearSetup::orderBy('id', 'asc')->get();
        $millYearSetups = MillYearlySetup::orderBy('id', 'asc')->with('seasonData')->get();
        return view('dashboard.mill_year_setup.index', compact('yearSetups', 'millYearSetups', 'offices'));
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
   //  dd($request->all());
        $request->validate([
            'season_id' => 'required',
            'install_capacity' => 'required',
            'cane_crushing' => 'required',
            'sugar_production' => 'required',
            'recovery_target' => 'required',
            'date_of_start_mill' => 'required',
            'crop_day' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $millYearSetup = new MillYearlySetup();
            $millYearSetup->season_id           = $request->season_id;
            $millYearSetup->office_id           = $request->office_id;
            $millYearSetup->install_capacity    = $request->install_capacity;
            $millYearSetup->cane_crushing       = $request->cane_crushing;
            $millYearSetup->sugar_production    = $request->sugar_production;
            $millYearSetup->recovery_target     = $request->recovery_target;
            $millYearSetup->date_of_start_mill  = $request->date_of_start_mill;
            $millYearSetup->crop_day            = $request->crop_day;
            $millYearSetup->save();
            DB::commit();
            $notification = array(
                'message' => 'Mill Year Setup Added successfully!',
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
        $millYearSetups = MillYearlySetup::findOrFail($id);
        return view('dashboard.mill_year_setup.edit', compact('yearSetups', 'millYearSetups'));
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
        // dd($request->all());
        $request->validate([
            'season_id' => 'required',
            'install_capacity' => 'required',
            'cane_crushing' => 'required',
            'sugar_production' => 'required',
            'recovery_target' => 'required',
            'date_of_start_mill' => 'required',
            'crop_day' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $millYearSetup = MillYearlySetup::findOrFail($id);
            $millYearSetup->season_id           = $request->season_id;
            $millYearSetup->office_id           = $request->office_id;
            $millYearSetup->install_capacity    = $request->install_capacity;
            $millYearSetup->cane_crushing       = $request->cane_crushing;
            $millYearSetup->sugar_production    = $request->sugar_production;
            $millYearSetup->recovery_target     = $request->recovery_target;
            $millYearSetup->date_of_start_mill  = $request->date_of_start_mill;
            $millYearSetup->crop_day            = $request->crop_day;
            $millYearSetup->update();
            DB::commit();
            $notification = array(
                'message' => 'Mill Year Setup Updated successfully!',
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $millYearSetup = MillYearlySetup::findOrFail($id);
        $millYearSetup->delete();
        $notification = array(
            'message' => 'Mill Year Setup Deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
