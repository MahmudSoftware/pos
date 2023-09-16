<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductionReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productions = Production::orderBy('id', 'desc')->get();
        return view('dashboard.productionReport.index', compact('productions'));
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
        // dd($request->all());
        $request->validate([
            'production_date' => 'required',
            'cane_crushed' => 'required',
            'sugar_production' => 'required',
            'sugar_recovery' => 'required',
            'available_sugar' => 'required',
            'molasses' => 'required',
            'bagasse' => 'required',
            'press_mud' => 'required',
            'crush_stoppage' => 'required',
            'mill_stoppage' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $production = new Production();
            $production->production_date = $request->production_date;
            $production->cane_crushed    = $request->cane_crushed;
            $production->sugar_production= $request->sugar_production;
            $production->sugar_recovery  = $request->sugar_recovery;
            $production->available_sugar = $request->available_sugar;
            $production->molasses        = $request->molasses;
            $production->bagasse         = $request->bagasse;
            $production->press_mud       = $request->press_mud;
            $production->crush_stoppage  = $request->crush_stoppage;
            $production->mill_stoppage   = $request->mill_stoppage;
            $production->remark          = $request->remark;
            $production->save();
            DB::commit();
            $notification = array(
                'message' => 'Production Created successfully!',
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
        $production = Production::findOrFail($id);
        return view('dashboard.productionReport.edit', compact('production'));
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
            'production_date' => 'required',
            'cane_crushed' => 'required',
            'sugar_production' => 'required',
            'sugar_recovery' => 'required',
            'available_sugar' => 'required',
            'molasses' => 'required',
            'bagasse' => 'required',
            'press_mud' => 'required',
            'crush_stoppage' => 'required',
            'mill_stoppage' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $production = Production::findOrFail($id);
            $production->production_date = $request->production_date;
            $production->cane_crushed    = $request->cane_crushed;
            $production->sugar_production = $request->sugar_production;
            $production->sugar_recovery  = $request->sugar_recovery;
            $production->available_sugar = $request->available_sugar;
            $production->molasses        = $request->molasses;
            $production->bagasse         = $request->bagasse;
            $production->press_mud       = $request->press_mud;
            $production->crush_stoppage  = $request->crush_stoppage;
            $production->mill_stoppage   = $request->mill_stoppage;
            $production->remark          = $request->remark;
            $production->save();
            DB::commit();
            $notification = array(
                'message' => 'Production Updated successfully!',
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
        $production = Production::findOrFail($id);
        $production->delete();
        $notification = array(
            'message' => 'Deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
