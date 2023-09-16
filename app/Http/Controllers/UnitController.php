<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUnitRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateUnitRequest;
use App\Models\Center;
use App\Service\generate_code;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $units = Unit::where('office_id',Auth::user()->office_id)->latest()->get();
        $centers = Center::where('status', '1')->where('office_id',Auth::user()->office_id)->orderBy('name')->get();
        if ($request->ajax()) {
            return DataTables::of($units)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="' . route('dashboard.unit.destroy', $row->id) . '" id="delete_btn">Delete</a></li>';
                    $html .= '<li><a href="' . route('dashboard.unit.edit', $row->id) . '" id="edit_btn">Edit</a></li>';
                    if ($row->status == 1) {
                        $html .= '<li><a href="' . route('dashboard.unit.deactive', $row->id) . '" id="deactive_btn">De-Active</a></li>';
                    } else {
                        $html .= '<li><a href="' . route('dashboard.unit.active', $row->id) . '" id="active_btn">Active</a></li>';
                    }
                    $html .= '</ul>';
                    $html .= '</div>';
                    return $html;
                })
                ->addColumn('center_name', function ($row) {

                    return $row->rel_to_center->name;
                })
                ->editColumn('status', function ($row) {
                    $html = '';
                    if ($row->status == 1) {
                        $html .= '<button class="btn btn-info waves-effect waves-light m-b-5"> <span>Active</span> </button>';
                    } else {
                        $html .= '<button class="btn btn-danger waves-effect waves-light m-b-5"> <span>De-Active</span> </button>';
                    }
                    return $html;
                })
                ->rawColumns(['action', 'status', 'center_name'])
                ->make(true);
        }

        return view('dashboard.unit.index', compact('centers'));
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
     * @param  \App\Http\Requests\StoreUnitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnitRequest $request)
    {

      //  return $request->all();

        $formData = $request->validated();

        $unitObj = new Unit();

        $tableName = $unitObj->getTable();

       // $formData['code'] = isset($request->code) ? $request->code : $codeGenerate->code($tableName);

       Unit::create($formData);

        return response()->json('Unit Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $centers = Center::where('status', '1')->orderBy('name')->get();
        return view('dashboard.unit.edit', compact('unit', 'centers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnitRequest  $request
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnitRequest $request, Unit $unit)
    {
        $formData = $request->validated();

        $unit->update($formData);

        return response()->json('Unit Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return response()->json('Unit Deleted Successfully');
    }

    /**
     * Active the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function active(Unit $unit)
    {
        $unit->status = 1;
        $unit->save();
        return response()->json('Unit Activated Successfully');
    }

    /**
     * De-active the specified resource from storage.
     *
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Http\Response
     */

    public function deactive(Unit $unit)
    {
        $unit->status = 0;
        $unit->save();
        return response()->json('unit Deactivated Successfully');
    }


    /**
     * Datatables Ajax Data
     *
     * @return units array
     * @throws \Exception
     * */

     public function unit(Request $request)
     {
        $id = $request->un_id;

        $units = Unit::where('center_id', $id)->where('status', 1)->get();

        $html = '<option selected disabled>Choose Unit</option>';
        foreach ($units as $key => $unit) {
            $html .= '<option selected value="' . $unit->id . '">' . $unit->name . '</option>';
        }
        echo $html;
     }

}
