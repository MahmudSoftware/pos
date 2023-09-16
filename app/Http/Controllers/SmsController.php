<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreSmsRequest;
use App\Http\Requests\UpdateSmsRequest;

class SmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $smss = Sms::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($smss)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="' . route('dashboard.sms.destroy', $row->id) . '" id="delete_btn"> Delete </a></li>';
                    $html .= '<li><a href="' . route('dashboard.sms.edit', $row->id) . '" id="edit_btn"> Edit </a></li>';
                    if ($row->status == 1) {
                        $html .= '<li><a href="' . route('dashboard.sms.deactive', $row->id) . '" id="deactive_btn">De-Active</a></li>';
                    } else {
                        $html .= '<li><a href="' . route('dashboard.sms.active', $row->id) . '" id="active_btn">Active</a></li>';
                    }
                    $html .= '</ul>';
                    $html .= '</div>';
                    return $html;
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
                ->rawColumns(['action', 'status'])
                ->make(true);
        }

        return view('dashboard.sms.index');
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
     * @param  \App\Http\Requests\StoreSmsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSmsRequest $request)
    {
        $formData = $request->validated();

        $sms = Sms::create($formData);

        return response()->json('SMS Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function show(Sms $sms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function edit(Sms $sms)
    {
        return view('dashboard.sms.edit', compact('sms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSmsRequest  $request
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSmsRequest $request, Sms $sms)
    {
        $formData = $request->validated();
        $sms->update($formData);
        return response()->json('SMS Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sms $sms)
    {
        $sms->delete();
        return response()->json('SMS Deleted Successfully');
    }

    /**
     * Active the specified resource from storage.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */
    public function active(Sms $sms)
    {
        $sms->status = 1;
        $sms->save();
        return response()->json('SMS Activated Successfully');
    }

    /**
     * De-active the specified resource from storage.
     *
     * @param  \App\Models\Sms  $sms
     * @return \Illuminate\Http\Response
     */

    public function deactive(Sms $sms)
    {
        $sms->status = 0;
        $sms->save();
        return response()->json('SMS Deactivated Successfully');
    }
}
