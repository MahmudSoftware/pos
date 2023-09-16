<?php

namespace App\Http\Controllers;

use App\Models\Purjee;
use App\Http\Requests\StorePurjeeRequest;
use App\Http\Requests\UpdatePurjeeRequest;
use App\Models\Farmer;
use App\Models\Purjeesingle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PurjeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $purjees = Purjee::latest()->get();
        if ($request->ajax()) {
            return DataTables::of($purjees)
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
        return view('dashboard.purjee.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $start_num = Purjee::max('purjeeno');
        return view('dashboard.purjee.create', compact('start_num'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePurjeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        return $request->all();

        $data = [];
        foreach ($request->purjee_no as $key => $value) {
            $data[] = [
                'purjeeno' => $value,
                'purjeenoMe' => $request->pass_book_no[$key],
                'grower_id' => $request->farmer_id[$key],
                'center_id' => $request->center_id[$key],
                'unit_id' => $request->unit_id[$key],
                'pass_book_number' => $request->pass_book_no[$key],
                'issuedate' => $request->issuedate,
                'deliverdate' => $request->deliverdate,
                'purjee_weight' => $request->purjee_weight,
            ];
        }

        // Save the loop data to the CuponDetails model
        Purjee::insert($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purjee  $purjee
     * @return \Illuminate\Http\Response
     */
    public function show(Purjee $purjee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purjee  $purjee
     * @return \Illuminate\Http\Response
     */
    public function edit(Purjee $purjee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePurjeeRequest  $request
     * @param  \App\Models\Purjee  $purjee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePurjeeRequest $request, Purjee $purjee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purjee  $purjee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purjee $purjee)
    {
        //
    }

    public function purjeeNextPage(Request $request)
    {


        $issuedate = $request->issuedate;
        $start_num = $request->purjeeno;
        $end_num = $request->end_num;
        $deliverdate = $request->deliverdate;
        $purjee_weight = $request->purjee_weight;

        // $purjeeNo = Purjee::orderBy('id', 'asc')->first();
        // $start_num = $purjeeNo->purjeeno;
        // $purjeeNo = Purjee::orderBy('id', 'desc')->first();
        // $end_num = $purjeeNo->purjeeno;
        // $range = $end_num - $start_num;
        // $farmersPB = Farmer::orderBy('id', 'desc')->with('rel_to_center', 'rel_to_unit')->get();
        return view('dashboard.purjee.next_page', compact('issuedate', 'start_num', 'end_num', 'deliverdate', 'purjee_weight'));
    }
    public function purjeeDataStore(Request $request)
    {

        $data = [];

        foreach ($request->purjee_no as $key => $value) {
            $data[] = [
                'purjeeno' => $value,
                'office_id' => Auth::user()->office_id,
                'purjeenoMe' => $request->pass_book_no[$key],
                'pass_book_number' => $request->pass_book_no[$key],
                'grower_id' => $request->farmer_id[$key],
                'center_id' => $request->center_id[$key],
                'unit_id' => $request->unit_id[$key],
                'issuedate' => $request->issuedate,
                'deliverdate' => $request->deliverdate,
                'purjee_weight' => $request->purjee_weight,
            ];
        }
        Purjee::insert($data);
        return redirect('/admin/purjee/add');
    }
    public function farmerPB($id)
    {
        $farmersPbNo = Farmer::with('rel_to_center', 'rel_to_unit')->where("pass_book_number", $id)->first();
        return response()->json($farmersPbNo);
    }
}
