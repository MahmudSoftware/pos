<?php

namespace App\Http\Controllers;

use App\Models\Routegroup;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RouteController extends Controller
{
    public function index(Request $request)
    {
        $PermissionLists = Permission::all();
        $routeGroups = Routegroup::all();
        if ($request->ajax()) {
            return DataTables::of($PermissionLists)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="' . route('route.group.delete', $row->id) . '" id="delete_btn">Delete</a></li>';
                    $html .= '<li><a href="' . route('route.group.edit', $row->id) . '" id="edit_btn">Edit</a></li>';
                    $html .= '</ul>';
                    $html .= '</div>';
                    return $html;
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.route.index',compact('routeGroups'));
    }

     public function routeStore(Request $request){

      $routePermission = new Permission();
       $routePermission->name = $request->name;
       $routePermission->group_name = $request->group_name;
       $routePermission->save();
       return response()->json('Route Created Successfully');
     }
    public function routeGroup(Request $request)
    {
        $userGroup = Routegroup::all();

        if ($request->ajax()) {
            return DataTables::of($userGroup)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $html = '';
                    $html .= '<div class="btn-group">';
                    $html .= '<button type="button" class="btn btn-primary dropdown-toggle waves-effect waves-light  waves-effect" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span> </button>';
                    $html .= '<ul class="dropdown-menu">';
                    $html .= '<li><a href="' . route('route.group.delete', $row->id) . '" id="delete_btn">Delete</a></li>';
                    $html .= '<li><a href="' . route('route.group.edit', $row->id) . '" id="edit_btn">Edit</a></li>';
                    $html .= '</ul>';
                    $html .= '</div>';
                    return $html;
                })

                ->rawColumns(['action'])
                ->make(true);
        }
        return view('dashboard.route_group.index');
    }

    public function routeGroupStore(Request $request)
    {

        $routeGroup = new Routegroup();
        $routeGroup->group_name = $request->group_name;
        $routeGroup->save();
        return response()->json('Group for Route Created Successfully');
    }
}
