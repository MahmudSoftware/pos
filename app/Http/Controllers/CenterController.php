<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreCenterRequest;
use App\Http\Requests\UpdateCenterRequest;
use App\Service\generate_code;
use Illuminate\Support\Facades\DB;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $query = DB::table('centers');

        if (!empty($request->f_soft_delete_id)) {
            if ($request->f_soft_delete_id == 1) {
                $query->where('deleted_at', '=', null);
            } else {
                $query->where('deleted_at', '!=', null);
            }
        }


        if (!empty($request->f_status)) {
            if ($request->f_status == 1){
                $query->where('status', 1);
            }else{
                $query->where('status', 0);
            }
        }

        if ($request->center_id && $request->center_id != 0) {
            $query->where('id', $request->center_id);
        }

        $centers = $query->get();
        // return $centers;
        if ($request->ajax()) {
            return DataTables::of($centers)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';

                    if ($row->deleted_at == null) {

                        $html .= '<li><a href="' . route('dashboard.center.destroy', $row->id) . '" id="delete_btn">Delete</a></li>';
                        $html .= '<li><a href="' . route('dashboard.center.edit', $row->id) . '" id="edit_btn">Edit</a></li>';
                        if ($row->status == 1) {
                            $html .= '<li><a href="' . route('dashboard.center.deactive', $row->id) . '" id="deactive_btn">De-Active</a></li>';
                        } else {
                            $html .= '<li><a href="' . route('dashboard.center.active', $row->id) . '" id="active_btn">Active</a></li>';
                        }
                    }else{
                        $html .= '<li><a href="'. route('dashboard.center.force-delete', $row->id) .'" id="force_delete_btn">Hard Delete</a></li>';
                        $html .= '<li><a href="'. route('dashboard.center.restore', $row->id) .'" id="restore_btn">Restore</a></li>';
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

        $centers = Center::latest()->get();

        return view('dashboard.center.index', compact('centers'));
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
     * @param  \App\Http\Requests\StoreCenterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCenterRequest $request, generate_code $codeGenerate)
    {
        //return $request->all();

        $formData = $request->validated();

        $centerObj = new Center();

        $tableName = $centerObj->getTable();

        $formData['code'] = isset($request->code) ? $request->code : $codeGenerate->code($tableName);

        Center::create($formData);

        return response()->json('Center Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function show(Center $center)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function edit(Center $center)
    {
        return view('dashboard.center.edit', compact('center'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCenterRequest  $request
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCenterRequest $request, Center $center)
    {
        $formData = $request->validated();
        $center->update($formData);

        return response()->json('Center Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function destroy(Center $center)
    {
        $center->delete();
        return response()->json('Center Deleted Successfully');

    }

    /**
     * Active the specified resource from storage.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */
    public function active(Center $center)
    {
        $center->status = 1;
        $center->save();
        return response()->json('Center Activated Successfully');
    }

    /**
     * De-active the specified resource from storage.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */

    public function deactive(Center $center)
    {
        $center->status = 0;
        $center->save();
        return response()->json('Center Deactivated Successfully');
    }


    /**
     * Restore the soft deleted data.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */

    public function restore($center)
    {
        Center::where('id', $center)->withTrashed()->restore();

        return response()->json('Center Restored Successfully');
    }



    /**
     * Force Delete the soft deleted data.
     *
     * @param  \App\Models\Center  $center
     * @return \Illuminate\Http\Response
     */

    public function forceDelete($center)
    {
        Center::where('id', $center)->withTrashed()->forceDelete();
        return response()->json('Center Permanently Deleted Successfully');
    }


}
