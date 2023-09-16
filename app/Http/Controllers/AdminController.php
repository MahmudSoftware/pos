<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Admin;
use App\Models\Mill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        return view('dashboard.admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.admin.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $formData = $request->all();
        $formData['password'] = Hash::make($formData['password']);

        $user = User::create($formData);
        if($request->roles){
            $user->assignRole($request->roles);
        }

        return response()->json('User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $offices = Office::latest()->get();
        return view('dashboard.admin.edit', compact('user', 'offices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $formData = $request->all();
        $user->update($formData);
        return response()->json('User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('dashboard.user_profile.index', compact('user'));
    }
    public function profileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->first_name     = $request->fname;
        $data->last_name      = $request->lname;
        $data->email          = $request->email;
        $data->phone          = $request->phone;
        $data->address        = $request->address;

        if ($request->file('image')) {
            $file = $request->file('image');
            @unlink(public_path('upload/user_images/' . $data->image));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->back();
    }

    public function PasswordUpdate(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'password'  => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::guard('web')->logout();
            return redirect()->route('login');
        } else {
            return redirect()->back();
        }
    }

    public function millList(Request $request){
        $mills = Mill::get();
        if ($request->ajax()) {

            return DataTables::of($mills)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="' . route('dashboard.depertment.destroy', $row->id) . '" id="delete_btn">Delete</a></li>';
                    $html .= '<li><a href="' . route('dashboard.depertment.edit', $row->id) . '" id="edit_btn">Edit</a></li>';
                    if ($row->status == 1) {
                        $html .= '<li><a href="' . route('dashboard.depertment.deactive', $row->id) . '" id="deactive_btn">De-Active</a></li>';
                    } else {
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
                        $html .= '<button class="btn btn-danger waves-effect waves-light m-b-5"> <span>De-Active</span> </button>';
                    }
                    return $html;
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('dashboard.mill.index');
    }

    public function millStore(Request $request){
        $request->validate([
            'mill_name' => 'required'
        ]);

        $millData = new Mill();
        $millData->mill_name = $request->mill_name;
        $millData->save();
        return redirect()->route('mill');
    }
}
