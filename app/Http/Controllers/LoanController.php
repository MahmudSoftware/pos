<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoanHead;
use App\Models\LoanHead as ModelsLoanHead;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class LoanController extends Controller
{
    public function index(Request $request){
        $headEntryList = ModelsLoanHead::all();
        if ($request->ajax()) {
            return DataTables::of($headEntryList)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="' . route('route.group.delete', $row->id) . '" id="delete_btn">Delete</a></li>';
                    $html .= '<li><a href="' . route('edit.head.entry', $row->id) . '" id="edit_btn">Edit</a></li>';
                    $html .= '</ul>';
                    $html .= '</div>';
                    return $html;
                })
                ->editColumn('status', function ($row) {
                    $type = '';
                    if ($row->status == 1) {
                        $type =  'Active';
                    }
                    else {
                        $type =  'De Active';
                    }
                    return $type;
                })

                ->rawColumns(['action','status'])
                ->make(true);
        }

        return view('dashboard.head_entry.index');
    }

    public function store(LoanHead $request){

        $formData = $request->all();
        $user = ModelsLoanHead::create($formData);
        return response()->json('Loan Head Created Successfully');
    }

    public function editHeadEntry(ModelsLoanHead $ModelsLoanHead)
    {


        return view('dashboard.head_entry.edit', compact('ModelsLoanHead'));
    }

}
