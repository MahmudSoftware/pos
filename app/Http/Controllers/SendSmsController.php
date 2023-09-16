<?php

namespace App\Http\Controllers;

use App\Models\SendSms;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreSendSmsRequest;
use App\Http\Requests\UpdateSendSmsRequest;
use App\Models\Center;
use App\Models\Farmer;
use App\Models\Sms;
use App\Models\Unit;

class SendSmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sendSms = SendSms::latest()->get();
        $farmers = Farmer::where('status', '1')->orderBy('pass_book_number')->get();
        $centers = Center::where('status', '1')->orderBy('name')->get();
        $units = Unit::where('status', '1')->orderBy('name')->get();
        $smss = Sms::where('status', '1')->orderBy('subject')->get();
        if ($request->ajax()) {
            return DataTables::of($sendSms)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="' . route('dashboard.sendSms.destroy', $row->id) . '" id="delete_btn"> Delete </a></li>';
                    // $html .= '<li><a href="' . route('dashboard.sendSms.edit', $row->id) . '" id="edit_btn"> Edit </a></li>';
                    $html .= '</ul>';
                    $html .= '</div>';
                    return $html;
                })
                ->addColumn('subject', function ($row) {

                    $smsObj = Sms::where('id', $row->sms_id)->select('subject')->first();

                    return $smsObj->subject;
                })

                ->addColumn('message', function ($row) {

                    $smsObj = Sms::where('id', $row->sms_id)->select('message')->first();

                    return $smsObj->message;
                })
                ->addColumn('center', function ($row) {
                    return $row->rel_to_center->name;
                })
                ->addColumn('unit', function ($row) {
                    return $row->rel_to_unit->name;
                })
                ->editColumn('passbook_number', function ($row) {
                    $passBookArr = json_decode($row->passbook_number);
                    $pass_books = '';
                    foreach ($passBookArr as $key => $passBook) {
                        $pass_books = $pass_books . $passBook . ', ';
                    }
                    return $pass_books;
                })
                ->rawColumns(['action', 'center', 'unit', 'passbook_number', 'subject', 'message'])
                ->make(true);
        }

        return view('dashboard.send_sms.index', compact('farmers', 'centers', 'units', 'smss'));
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
     * @param  \App\Http\Requests\StoreSendSmsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSendSmsRequest $request)
    {
        $formData = $request->validated();

        $passBookArray = array();

        foreach($formData['pass_book_number'] as $key => $passBookNumber)
        {
            array_push($passBookArray, $passBookNumber);
        }

        $passBookJson = json_encode($passBookArray);

        $formData['from'] = date('Y-m-d', strtotime($formData['from']));
        $formData['to'] = date('Y-m-d', strtotime($formData['to']));
        $formData['passbook_number'] = $passBookJson;


        $sendSms = SendSms::create($formData);

        return response()->json('SMS send Successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SendSms  $sendSms
     * @return \Illuminate\Http\Response
     */
    public function show(SendSms $sendSms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SendSms  $sendSms
     * @return \Illuminate\Http\Response
     */
    public function edit(SendSms $sendSms)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSendSmsRequest  $request
     * @param  \App\Models\SendSms  $sendSms
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSendSmsRequest $request, SendSms $sendSms)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SendSms  $sendSms
     * @return \Illuminate\Http\Response
     */
    public function destroy(SendSms $sendSms)
    {
        $sendSms->delete();
        return response()->json('Send SMS Deleted Successfully');
    }
}
