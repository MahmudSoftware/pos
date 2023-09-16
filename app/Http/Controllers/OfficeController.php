<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreOfficeRequest;
use App\Http\Requests\UpdateOfficeRequest;
use App\Service\generate_code;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $office = Office::find($id);
        $offices = Office::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($offices)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="' . route('dashboard.office.destroy', $row->id) . '" id="delete_btn">Delete</a></li>';
                    $html .= '<li><a href="' . route('office.edit', $row->id) . '" id="edit_btn">Edit</a></li>';
                    if ($row->status == 1) {
                        $html .= '<li><a href="' . route('dashboard.office.deactive', $row->id) . '" id="deactive_btn">De-Active</a></li>';
                    } else {
                        $html .= '<li><a href="' . route('dashboard.office.active', $row->id) . '" id="active_btn">Active</a></li>';
                    }
                    $html .= '</ul>';
                    $html .= '</div>';
                    return $html;
                })
                ->editColumn('logo', function ($row) {
                    if ($row->logo != null) {
                        return "<img src='" . asset('upload/mill_logos/' . $row->logo) . "' height='40'/>";
                    }else{
                        return
                        "<img src='" . asset('upload/mill_logos/no_image.jpg') . "' height='40'/>";
                    }

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
                ->rawColumns(['action', 'status','logo'])
                ->make(true);
        }

        return view('dashboard.office.index');
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
     * @param  \App\Http\Requests\StoreOfficeRequest  $request
     * @return \Illuminate\Http\Response
     */

    private static $course, $image, $imageName, $imageUrl, $directory;

    public static function getImageUrl($request)
    {
        $image = $request->file('logo');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('upload/mill_logos'), $imageName);
        return $imageName;
    }
    public static function store(StoreOfficeRequest $request)
    {
        $data = new Office();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->status = $request->status;
        $data->type = $request->type;
        $data->address = $request->address;
        $data->description = $request->description;
        $data->logo = self::getImageUrl($request);
        $data->save();
        return response()->json('Office Store Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Office $office)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $office = Office::find($id);


        return view('dashboard.office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOfficeRequest  $request
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public static function update(Request $request)
    {

        $data = Office::where('id',$request->office_id)->first();

        if($request->file('logo')){
            if(file_exists($data->logo)){
                unlink($data->logo);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else{
            self::$imageUrl = $data->logo;
        }
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->status = $request->status;
        $data->type = $request->type;
        $data->address = $request->address;
        $data->description = $request->description;
        $data->logo = self::$imageUrl;
        $data->save();

       return response()->json('Office Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {

        $office->delete();

        return response()->json('Office Deleted Successfully');
    }


    /**
     * Active the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function active(Office $office)
    {
        $office->status = 1;
        $office->save();
        return response()->json('Office Activated Successfully');
    }

    /**
     * De-active the specified resource from storage.
     *
     * @param  \App\Models\Office  $office
     * @return \Illuminate\Http\Response
     */

    public function deactive(Office $office)
    {
        $office->status = 0;
        $office->save();
        return response()->json('Office Deactivated Successfully');
    }

}
