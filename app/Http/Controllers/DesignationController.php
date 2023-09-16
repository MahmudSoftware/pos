<?php

namespace App\Http\Controllers;

use App\Models\Designation;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreDesignationRequest;
use App\Http\Requests\UpdateDesignationRequest;
use App\Service\generate_code;
use Illuminate\Support\Facades\Auth;

class DesignationController extends Controller
{
    /**
     * Role Permission
     */
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

             $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('dashboard.designation.index')) {
            abort(403, 'Unauthorized Access');
        }

        $designations = Designation::where('office_id',Auth::user()->office_id)->latest()->get();
        if ($request->ajax()) {
            return DataTables::of($designations)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="' . route('dashboard.designation.destroy', $row->id) . '" id="delete_btn">Delete</a></li>';
                    $html .= '<li><a href="' . route('dashboard.designation.edit', $row->id) . '" id="edit_btn">Edit</a></li>';
                    if ($row->status == 1) {
                        $html .= '<li><a href="' . route('dashboard.designation.deactive', $row->id) . '" id="deactive_btn">De-Active</a></li>';
                    } else {
                        $html .= '<li><a href="' . route('dashboard.designation.active', $row->id) . '" id="active_btn">Active</a></li>';
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

        return view('dashboard.designation.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDesignationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDesignationRequest $request, generate_code $codeGenerate)
    {
        // if (is_null($this->user) || !$this->user->can('dashboard.designation.store')) {
        //     abort(403, 'Unauthorized Access');
        // }

        $formData = $request->validated();

        $designationObj = new Designation();

        $tableName = $designationObj->getTable();

        $formData['code'] = isset($request->code) ? $request->code : $codeGenerate->code($tableName);

        $designation = Designation::create($formData);

        return response()->json('Designation Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Designation $designation)
    {
        // if (is_null($this->user) || !$this->user->can('dashboard.designation.edit')) {
        //     abort(403, 'Unauthorized Access');
        // }


        return view('dashboard.designation.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDesignationRequest  $request
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDesignationRequest $request, Designation $designation)
    {
        $formData = $request->validated();

        $designation->update($formData);

        return response()->json('Designation Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();

        return response()->json('Depertment Deleted Successfully');
    }

    /**
     * Active the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */
    public function active(Designation $designation)
    {
        $designation->status = 1;
        $designation->save();
        return response()->json('Designation Activated Successfully');
    }

    /**
     * De-active the specified resource from storage.
     *
     * @param  \App\Models\Designation  $designation
     * @return \Illuminate\Http\Response
     */

    public function deactive(Designation $designation)
    {
        $designation->status = 0;
        $designation->save();
        return response()->json('Designation Deactivated Successfully');
    }
}
