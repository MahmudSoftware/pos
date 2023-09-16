<?php

namespace App\Http\Controllers;

use App\Models\YearSetup;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreYearSetupRequest;
use App\Http\Requests\UpdateYearSetupRequest;
use App\Service\generate_code;

class YearSetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $yearSetups = YearSetup::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($yearSetups)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="' . route('dashboard.yearSetup.destroy', $row->id) . '" id="delete_btn">Delete</a></li>';
                    $html .= '<li><a href="' . route('dashboard.yearSetup.edit', $row->id) . '" id="edit_btn">Edit</a></li>';
                    $html .= '</ul>';
                    $html .= '</div>';
                    return $html;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.year_setup.index');
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
     * @param  \App\Http\Requests\StoreYearSetupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreYearSetupRequest $request, generate_code $codeGenerate)
    {
        $formData = $request->validated();
        $yearSetupObj = new YearSetup();
        $tableName = $yearSetupObj->getTable();
        $formData['code'] = isset($request->code) ? $request->code : $codeGenerate->code($tableName);
        $formData['start_date'] = date('Y-m-d', strtotime($formData['start_date']));
        $formData['end_date'] = date('Y-m-d', strtotime($formData['end_date']));

        YearSetup::create($formData);
        return response()->json('Year Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\YearSetup  $yearSetup
     * @return \Illuminate\Http\Response
     */
    public function show(YearSetup $yearSetup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\YearSetup  $yearSetup
     * @return \Illuminate\Http\Response
     */
    public function edit(YearSetup $yearSetup)
    {
        $yearSetup = YearSetup::where('id', 'desc')->first();
        return view('dashboard.year_setup.edit', compact('yearSetup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateYearSetupRequest  $request
     * @param  \App\Models\YearSetup  $yearSetup
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateYearSetupRequest $request, YearSetup $yearSetup)
    {
        $formData = $request->validate();
        $yearSetup->update($formData);
        return response()->json('Year Setup Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\YearSetup  $yearSetup
     * @return \Illuminate\Http\Response
     */
    public function destroy(YearSetup $yearSetup)
    {
        $yearSetup->delete();
        return response()->json('Year Setup Deleted Successfully');
    }
}
