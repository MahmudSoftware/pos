<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Mill;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Spatie\Permission\Models\Role;

class UserController extends Controller
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

     // if (is_null($this->user) || !$this->user->can('user.role.create')) {
        //     abort(403, 'Unauthorized Access');
        // }
        // $users = User::latest()->get()->except(auth()->user()->id);
        //return $users;
        $roles = Role::all();
        $users = User::where('office_id',Auth::user()->office_id)->leftJoin('offices','users.office_id','=','offices.id')
               ->select('users.*','offices.name')
               ->get();
        $offices = Office::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="' . route('dashboard.user.destroy', $row->id) . '" id="delete_btn">Delete</a></li>';
                    $html .= '<li><a href="' . route('dashboard.user.edit', $row->id) . '" id="edit_btn">Edit</a></li>';
                    $html .= '</ul>';
                    $html .= '</div>';
                    return $html;
                })
                ->editColumn('user_type', function ($row) {
                    $type = '';
                    if ($row->user_type == 1) {
                        $type =  'Super Admin';
                    } elseif ($row->user_type == 2) {
                        $type =  'Admin';
                    } elseif ($row->user_type == 3) {
                        $type =  'Operator';
                    } elseif ($row->user_type == 4) {
                    $type =  'MIS';
                    } else {
                        $type =  'Mill Supervisor';
                    }
                    return $type;
                })
                ->rawColumns(['action', 'user_type'])
                ->make(true);
        }
        return view('dashboard.user.index', compact('offices','roles'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // if (is_null($this->user) || !$this->user->can('user.role.create')) {
        //     abort(403, 'Unauthorized Access');
        // }
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
        // if (is_null($this->user) || !$this->user->can('user.role.create')) {
        //     abort(403, 'Unauthorized Access');
        // }
        $roles = Role::all();
        $offices = Office::latest()->get();
        return view('dashboard.user.edit', compact('user','roles','offices'));
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
        // if (is_null($this->user) || !$this->user->can('user.role.create')) {
        //     abort(403, 'Unauthorized Access');
        // }
        $formData = $request->all();
        $user->update($formData);

            $user->syncRoles($request->roles);

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
        $deleteUser = User::where('id',$id)->first();
        $deleteUser->delete();
        return response()->json('User Deleted Successfully');

    }
    public function userProfile(){
        // if (is_null($this->user) || !$this->user->can('user.role.create')) {
        //     abort(403, 'Unauthorized Access');
        // }
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
        // if (is_null($this->user) || !$this->user->can('user.role.create')) {
        //     abort(403, 'update.password');
        // }
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
        // if (is_null($this->user) || !$this->user->can('user.role.create')) {
        //     abort(403, 'Unauthorized Access');
        // }
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
        // if (is_null($this->user) || !$this->user->can('user.role.create')) {
        //     abort(403, 'Unauthorized Access');
        // }
        $request->validate([
            'mill_name' => 'required'
        ]);

        $millData = new Mill();
        $millData->mill_name = $request->mill_name;
        $millData->save();
        return redirect()->route('mill');
    }
}
