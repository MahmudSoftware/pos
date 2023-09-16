<?php

namespace App\Http\Controllers;

use App\Exports\DepertmentsExport;
use App\Models\Depertment;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreDepertmentRequest;
use App\Http\Requests\UpdateDepertmentRequest;
use App\Imports\DepertmentsImport;
use App\Service\generate_code;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class DepertmentController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('dashboard.depertment.index')) {
            abort(403, 'Unauthorized Access');
        }

        // $depertments = Depertment::where('office_id',Auth::user()->office_id)->latest()->get(); //Thisline for Authenticationwise Dept

        $depertments = Depertment::latest()->get();
        // if (isset($request->status)) {
        //     $depertments = $query->where('status', 0)->get();
        // }else{
        //     $depertments = $query;
        // }

        if ($request->ajax()) {

            return DataTables::of($depertments)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';

                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="'. route('dashboard.depertment.destroy', $row->id) . '" id="delete_btn">Delete</a></li>';
                    $html .= '<li><a href="' . route('dashboard.depertment.edit', $row->id) . '" id="edit_btn">Edit</a></li>';
                    if ($row->status == 1){
                        $html .= '<li><a href="' . route('dashboard.depertment.deactive', $row->id) . '" id="deactive_btn">De-Active</a></li>';
                    }else{
                        $html .= '<li><a href="' . route('dashboard.depertment.active', $row->id) . '" id="active_btn">Active</a></li>';
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
                        $html .='<button class="btn btn-danger waves-effect waves-light m-b-5"> <span>De-Active</span> </button>';
                    }
                    return $html;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('dashboard.depertments.index');
    }

    public function test(Request $request)
    {
        dd($request->status);
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
     * @param  \App\Http\Requests\StoreDepertmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepertmentRequest $request, generate_code $codeGenerate)
    {


        $formData = $request->validated();


        $depertmentObj = new Depertment();

        $tableName = $depertmentObj->getTable();


        $formData['code'] = isset($request->code) ? $request->code : $codeGenerate->code($tableName);

         Depertment::create($formData);

        return response()->json('Depertment Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function show(Depertment $depertment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function edit(Depertment $depertment)
    {
        return view('dashboard.depertments.edit', compact('depertment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDepertmentRequest  $request
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepertmentRequest $request, Depertment $depertment)
    {
        $formData = $request->validated();

        $depertment->update($formData);

        return response()->json('Depertment Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depertment $depertment)
    {
        $depertment->delete();

        return response()->json('Depertment Deleted Successfully');
    }

    /**
     * Active the specified resource from storage.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */
    public function active(Depertment $depertment)
    {
        $depertment->status = 1;
        $depertment->save();
        return response()->json('Depertment Activated Successfully');
    }

    /**
     * De-active the specified resource from storage.
     *
     * @param  \App\Models\Depertment  $depertment
     * @return \Illuminate\Http\Response
     */

    public function deactive(Depertment $depertment)
    {
        $depertment->status = 0;
        $depertment->save();
        return response()->json('Depertment Deactivated Successfully');
    }

    public function fileImport(Request $request,  generate_code $codeGenerate)
    {
        $formData = $request->validate([
            'excle' => 'required',
        ]);

        $depertmentObj = new Depertment();

        $tableName = $depertmentObj->getTable();

        $code = $codeGenerate->code($tableName);

        Excel::import(new DepertmentsImport($code), $request->file('excle')->store('temp'));

        return response()->json('Depertment Data Imported Successfully');
    }


    public function excel()
    {
        // return Excel::download(new DepertmentsExport, 'depertments.html', \Maatwebsite\Excel\Excel::HTML); // download html formated file
        // return Excel::download(new DepertmentsExport, 'depertments.xlsx', \Maatwebsite\Excel\Excel::XLSX); // download excel formated file
        return new DepertmentsExport();
    }

    public function status($id){


        $data =  Depertment::where('status',$id)->get();

         return response()->json($data);

    }
}
