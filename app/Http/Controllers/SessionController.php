<?php

namespace App\Http\Controllers;

use App\Models\MillYearlySetup;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index(){

        return view('dashboard.session.index');
    }
    public function store(Request $request){

        $formData = $request->all();
        MillYearlySetup::create($formData);
        return response()->json('Year Setup Successfully');
    }
}
