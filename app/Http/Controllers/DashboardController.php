<?php

namespace App\Http\Controllers;

use App\Models\Center;
use App\Models\Farmer;
use App\Models\Office;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $farmerStatus = Farmer::where('office_id', Auth::user()->office_id)->get();

        $totalCart = $farmerStatus->sum('total_cane');
        $remailCart = $farmerStatus->sum('remain_cart');

        $farmerLoan = Farmer::where('office_id', Auth::user()->office_id)->where('is_loan', '>', 0)->get();
        $farmerNonLoan = Farmer::where('office_id', Auth::user()->office_id)->where('is_loan', '<', 0)->get();

        if ($farmerNonLoan->count() != null && $farmerStatus->count() != null) {

            $percentageOfLoan = ($farmerLoan->count() / $farmerStatus->count()) * 100;

        }else{
            $percentageOfLoan = 0;
        }

        if ($farmerNonLoan->count() != null && $farmerStatus->count() != null) {

            $percentageOfNonLoan = ($farmerNonLoan->count() / $farmerStatus->count()) * 100;

        } else {
            $percentageOfNonLoan = 0;
        }



        $totalUnit = Unit::where('office_id', Auth::user()->office_id);

        $totalCenter = Center::where('office_id', Auth::user()->office_id);

        $farmers = $farmerStatus->count();

        $millName = Office::where('id', Auth::user()->office_id)->first();

        // return $millName;

        $distinct_office_ids = Farmer::select('office_id')
            ->distinct()
            ->pluck('office_id');

        $data = DB::table('offices')
            ->leftJoin('farmers', 'offices.id', '=', 'farmers.office_id')
            ->leftJoin('mill_yearly_setups', 'offices.id', '=', 'mill_yearly_setups.office_id')
            ->select(
                'offices.id',
                'offices.mill_name_bn',
                DB::raw('(SELECT COUNT(id) FROM farmers WHERE office_id = offices.id) AS total_grower'),
                DB::raw('(SELECT COUNT(supplied_cane_cart) FROM farmers WHERE office_id = offices.id) AS total_cart'),
                DB::raw('(SELECT COUNT(remain_cart) FROM farmers WHERE office_id = offices.id) AS total_remain_cart'),
                DB::raw('(SELECT SUM(CASE WHEN is_loan > 0 THEN 1 ELSE 0 END) FROM farmers WHERE office_id = offices.id) AS total_loan_grower'),
                DB::raw('(SELECT SUM(is_loan) FROM farmers WHERE office_id = offices.id) AS total_loan_amount'),
                'mill_yearly_setups.crop_day',
                'mill_yearly_setups.date_of_start_mill'
            )
            ->groupBy('offices.id', 'offices.mill_name_bn', 'mill_yearly_setups.crop_day', 'mill_yearly_setups.date_of_start_mill')
            ->get();
        // return $data;


        return view('dashboard.home.index', compact('farmers', 'data', 'distinct_office_ids', 'farmerLoan', 'percentageOfLoan', 'farmerNonLoan', 'percentageOfNonLoan', 'totalUnit', 'totalCenter', 'millName','totalCart','remailCart'));
    }
}
