<?php

namespace App\Http\Controllers;

use App\Models\SendPurjee;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreSendPurjeeRequest;
use App\Http\Requests\UpdateSendPurjeeRequest;
use App\Models\Center;
use App\Models\Unit;

class SendPurjeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $centers = Center::orderBy('id', 'desc')->get();
        // $sendPurjees = SendPurjee::latest()->get();
        // if ($request->ajax()) {
        //     return DataTables::of($sendPurjees)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {
        //             $html = '';
        //             $html .= '<div class="btn-group">';
        //             $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
        //             $html .= '<ul class="dropdown-menu">';
        //             $html .= '<li><a href="' . route('dashboard.sendPurjee.destroy', $row->id) . '" id="delete_btn"> Delete </a></li>';
        //             $html .= '<li><a href="' . route('dashboard.sendPurjee.edit', $row->id) . '" id="edit_btn"> Edit </a></li>';
        //             $html .= '</ul>';
        //             $html .= '</div>';
        //             return $html;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }

        return view('dashboard.send_purjee.index', compact('centers'));
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
     * @param  \App\Http\Requests\StoreSendPurjeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSendPurjeeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SendPurjee  $sendPurjee
     * @return \Illuminate\Http\Response
     */
    public function show(SendPurjee $sendPurjee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SendPurjee  $sendPurjee
     * @return \Illuminate\Http\Response
     */
    public function edit(SendPurjee $sendPurjee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSendPurjeeRequest  $request
     * @param  \App\Models\SendPurjee  $sendPurjee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSendPurjeeRequest $request, SendPurjee $sendPurjee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SendPurjee  $sendPurjee
     * @return \Illuminate\Http\Response
     */
    public function destroy(SendPurjee $sendPurjee)
    {
        //
    }

    public function getUnit($id)
    {
        $unitData = Unit::where('center_id', $id)->get();
        return response()->json($unitData);
    }
}
