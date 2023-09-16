<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserRoleController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

             $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }

    public function create(Request $request)
    {


        $permission_groups = User::getPermissionGroup();

        $roles = Role::all();

        if (is_null($this->user) || !$this->user->can('user.role.create')) {
            abort(403, 'Unauthorized Access');
        }
        // if ($request->ajax()) {
        //     return DataTables::of($role)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {
        //             $html = '';
        //             $html .= '<div class="btn-group">';
        //             $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
        //             $html .= '<ul class="dropdown-menu">';
        //             $html .= '<li><a href="' . route('dashboard.user.destroy', $row->id) . '" id="delete_btn">Delete</a></li>';
        //             $html .= '<li><a href="' . route('dashboard.user.edit', $row->id) . '" id="edit_btn">Edit</a></li>';
        //             $html .= '</ul>';
        //             $html .= '</div>';
        //             return $html;
        //         })

        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        return view('dashboard.user_role.index', compact('roles', 'permission_groups'));
    }

    public function roleStore(Request $request)
    {

        $saveRole = new Role();
        $saveRole->name = $request->name;
        $saveRole->save();
        $saveRole->syncPermissions($request->permissions);
        return redirect()->back();
    }

    public function rolEdit($id){
        // if (is_null($this->user) || !$this->user->can('user.role.edit')) {
        //     abort(403, 'Unauthorized Access');
        // }
        $role = Role::findById($id);
        $permissions = Permission::all();
        $permission_groups = User::getPermissionGroup();

    return view('dashboard.user_role.edit',compact('role','permissions','permission_groups'));

    }

    public function roleUpdate(Request $request){

       $updateRole = Role::where('id',$request->role_id)->first();
       $updateRole->name = $request->name;
       $updateRole->save();
       $updateRole->syncPermissions($request->permissions);
       return redirect()->route('user.role.create');
    }



}
