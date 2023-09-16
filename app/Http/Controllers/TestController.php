<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTestRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateTestRequest;
use Illuminate\View\AppendableAttributeValue;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(isset($request->status)){
            $tests = Test::where('status', $request->status)->get();
        }else{
            $tests = Test::latest()->get();
        }


        if ($request->ajax()) {
            return DataTables::of($tests)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';

                    $html .= '<div class="btn-group" role="group" aria-label="Button group with nested dropdown">';
                    $html .= '<div class="btn-group" role="group">';
                    $html .= '<button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                    $html .= 'Action';
                    $html .= '</button>';
                    $html .= '<ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">';
                    $html .='<li><a class="dropdown-item" href="" id="delete_btn">Delete</a></li>';
                    $html .= '</ul>';
                    $html .= '</div>';
                    $html .= '</div>';
                    return $html;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status == 1) {
                        return '<span class="badge badge-primary">Active</span>';
                    } else {
                        return '<span class="badge badge-danger">Deactive</span>';
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('dashboard.test.index');
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
     * @param  \App\Http\Requests\StoreTestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTestRequest  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
