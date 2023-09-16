<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRolePermissionController extends Controller
{
    public $user;
    public function __construct()
    {

        $this->middleware(function ($request, $next) {

             $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    public function permissionCreate(){

      
        return view('dashboard.user_role_permission.index');
    }
}
