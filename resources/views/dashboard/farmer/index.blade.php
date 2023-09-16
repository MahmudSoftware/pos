@extends('dashboard.index')


@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    {{-- Link For Select 2 --}}
    <link href="{{ asset('dashboard/assets/select2/select2.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@section('title', 'Farmers - ')

@section('dashboard_content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Datatable</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Moltran</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Datatable</li>
            </ol>
        </div>
    </div>
    <div class="col-md-6"></div>
    <div class="col-md-6" @style(['text-align: right', 'margin-bottom: 15px'])>
        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Add Farmers</button>
        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-upload-modal-lg">Upload farmer Data</button>
        <a class="btn btn-primary waves-effect waves-light" href="{{ route('farmer.export.excle') }}">Download Excel</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="col-md-6">
                        <h3 class="panel-title">Datatable</h3>
                    </div>
                    <div class="col-md-6" @style(['text-align: right'])>

                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                            <table class="table table-striped table-bordered farmer__Table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>CENTER NAME</th>
                                        <th>UNIT NAME</th>
                                        <th>FIRST NAME</th>
                                        <th>FIRST NAME (Bangla)</th>
                                        <th>LAST NAME</th>
                                        <th>LAST NAME (Bangla)</th>
                                        <th>FATHER NAME</th>
                                        <th>FATHER NAME (Bangla)</th>
                                        <th>NID</th>
                                        <th>PHONE NUMBER</th>
                                        <th>PHONE STATUS</th>
                                        <th>PASSBOOK NUMBER</th>
                                        <th>STATUS</th>
                                        <th>LOAN AMOUNT</th>
                                        <th>REMAIN LOAN</th>
                                        <th>INVESTED LOAN AMOUNT</th>
                                        <th>REMAIN CART</th>
                                        <th>TOTAL CANE</th>
                                        <th>SUPPLIED CANE</th>
                                        <th>SUPPLIED CANE CART</th>
                                        <th>VILLAGE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if ($farmers->count() > 0)
                                   @foreach ($farmers as $key => $farmer)
                                        <tr>
                                            <td>{{ $farmers->firstItem() +$key }}</td>
                                            <td><a href="" data-id="{{ $farmer->id }}"  data-toggle="modal" data-target="#popModal">{{ (isset($farmer)) ? $farmer->rel_to_center->name: '' }}</a></td>
                                            <td>{{ (isset($farmer->rel_to_unit)) ? $farmer->rel_to_unit->name: '' }}</td>
                                            <td>{{ $farmer->first_name }}</td>
                                            <td>{{ $farmer->bn_first_name }}</td>
                                            <td>{{ $farmer->last_name }}</td>
                                            <td>{{ $farmer->bn_last_name }}</td>
                                            <td>{{ $farmer->father_name }}</td>
                                            <td>{{ $farmer->bn_father_name }}</td>
                                            <td>{{ $farmer->nid }}</td>
                                            <td>{{ $farmer->phone }}</td>
                                            <td>{{ $farmer->phone_status }}</td>
                                            <td>{{ $farmer->pass_book_number }}</td>
                                            <td>{{ $farmer->status }}</td>
                                            <td>{{ $farmer->is_loan }}</td>
                                            <td>{{ $farmer->remain_loan }}</td>
                                            <td>{{ $farmer->invested_loan_amount }}</td>
                                            <td>{{ $farmer->remain_cart }}</td>
                                            <td>{{ $farmer->total_cane }}</td>
                                            <td>{{ $farmer->supplied_cane }}</td>
                                            <td>{{ $farmer->supplied_cane_cart }}</td>
                                            <td>{{ $farmer->village }}</td>
                                            <td width="200">
                                                <a data-toggle="modal" data-target="#edit_modal" href="{{ route('farmer.edit', $farmer->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                   @endforeach
                                @endif
                                </tbody>
                            </table>
                                <div class="d-flex justify-content-center">
                                    {!! $farmers->links() !!}
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Modal --}}
    <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Add Farmer</h4>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('dashboard.farmer.store') }}" id="add_farmer_form" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name" class="control-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                    <span class="error error_first_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name" class="control-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                                    <span class="error error_last_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="father_name" class="control-label">Father's Name</label>
                                    <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Fataher's Name">
                                    <span class="error error_father_name text-danger"></span>
                                </div>
                            </div>
                            <input type="hidden" name="office_id" value="{{ Auth()->user()->office_id }}">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bn_first_name" class="control-label">First Name (Bangla)</label>
                                    <input type="text" class="form-control" name="bn_first_name" id="bn_first_name" placeholder="First Name (Bangla)">
                                    <span class="error error_bn_first_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bn_last_name" class="control-label">Last Name (Bangla)</label>
                                    <input type="text" class="form-control" name="bn_last_name" id="bn_last_name" placeholder="Last Name (Bangla)">
                                    <span class="error error_bn_last_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bn_father_name" class="control-label">Father's Name (Bangla)</label>
                                    <input type="text" class="form-control" name="bn_father_name" id="bn_father_name" placeholder="Father's Name (Bangla)">
                                    <span class="error error_bn_father_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone" class="control-label">Phone Number</label>
                                    <input type="number" class="form-control" name="phone" id="phone" pattern="[0-1]{2}[0-9]{9}" placeholder="Phone Number">
                                    <span class="error error_phone text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone_status" class="control-label">Phone Status</label>
                                    <select class="form-control" name="phone_status">
                                        <option selected disabled>Choose Phone Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">De-Active</option>
                                    </select>
                                    <span class="error error_phone_status text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option disabled>Choose Status</option>
                                        <option value="1" selected>Active</option>
                                        <option value="0">De-Active</option>
                                    </select>
                                    <span class="error error_status text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pass_book_number" class="control-label">Passbook Number</label>
                                    <input type="text" class="form-control" name="pass_book_number" id="pass_book_number" placeholder="Passbook Number">
                                    <span class="error error_pass_book_number text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nid" class="control-label">NID</label>
                                    <input type="text" class="form-control" name="nid" id="nid" placeholder="NID">
                                    <span class="error error_nid text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="is_loan" class="control-label">Loan Status</label>
                                    <select class="form-control" name="is_loan">
                                        <option selected disabled>Choose Loan Status</option>
                                        <option value="1">YES</option>
                                        <option value="0">NO</option>
                                    </select>
                                    <span class="error error_is_loan text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="loan_amount" class="control-label">Loan Amount</label>
                                    <input type="number" class="form-control" step="0.01" name="loan_amount" id="loan_amount" placeholder="Loan Amount">
                                    <span class="error error_loan_amount text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="remain_loan" class="control-label">Remain Loan</label>
                                    <input type="number" class="form-control" step="0.01" name="remain_loan" id="remain_loan" placeholder="Remain Loan">
                                    <span class="error error_remain_loan text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="invested_loan_amount" class="control-label">Invested Loan Amount</label>
                                    <input type="number" class="form-control" step="0.01" name="invested_loan_amount" id="invested_loan_amount" placeholder="Invested Loan Amount">
                                    <span class="error error_invested_loan_amount text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="remain_cart" class="control-label">Remain Cart</label>
                                    <input type="number" class="form-control" step="0.01" name="remain_cart" id="remain_cart" placeholder="Remain Cart">
                                    <span class="error error_remain_cart text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="total_cane" class="control-label">Total Cane</label>
                                    <input type="number" class="form-control" step="0.01" name="total_cane" id="total_cane" placeholder="Total Cane">
                                    <span class="error error_total_cane text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="supplied_cane" class="control-label">Supplied Cane</label>
                                    <input type="number" class="form-control" step="0.01" name="supplied_cane" id="supplied_cane" placeholder="Supplied Cane">
                                    <span class="error error_supplied_cane text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="supplied_cane_cart" class="control-label">Supplied Cane Cart</label>
                                    <input type="number" class="form-control" step="0.01" name="supplied_cane_cart" id="supplied_cane" placeholder="Supplied Cane Cart">
                                    <span class="error error_supplied_cane_cart text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="center_id" class="control-label">Center</label>
                                    <select class="form-control select2" name="center_id" id="center_id">
                                        <option selected disabled>--Select Center--</option>
                                        @foreach ($centers as $center)
                                            <option value="{{ $center->id }}">{{ $center->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error error_center_id text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unit_id" class="control-label">Unit</label>
                                    <select class="form-control select2" name="unit_id" id="unit_id">
                                        <option selected disabled>--Select Center--</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error error_unit_id text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="village" class="control-label">Village</label>
                                    <input type="text" class="form-control" name="village" id="village" placeholder="Village">
                                    <span class="error error_village text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Add Farmer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="upModel" class="modal fade bs-upload-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Upload Farmer File</h4>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('dashboard.farmer.import') }}" id="import_farmer_form" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="import_file" class="control-label">Import Excle</label>
                                    <input type="file" class="form-control" name="import_file" id="import_file" placeholder="Import Excle">
                                    <span class="error error_import_file text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="import_file" class="control-label">Office</label>
                                    <select name="office_id" id="office_id" class="form-control">
                                        <option value="">--Select Office--</option>
                                        @foreach ($offices as $office)
                                            <option value="{{ $office->id }}">{{ $office->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error error_import_file text-danger"></span>
                                </div>
                            </div>
                            <input type="hidden" name="office_id" value="{{ Auth()->user()->office_id }}">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="" class="control-label">Season</label>
                                    <select name="season_id" id="season_id" class="form-control">
                                        <option value="">--Select Season--</option>
                                        @foreach ($seasons as $season)
                                            <option value="{{ $season->id }}">{{ $season->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error error_import_file text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="modal-footer" id="add_user_form">
                            <button type="button" id="resetbtn" onclick="this.form.reset()" class="btn btn-default waves-effect" data-dismiss="modal"   onclick="clearData()">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Import Farmer Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="popModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Growers Information</h4>
                </div>
                <div class="modal-body">
                  <div class="row">
                     <div class="col-md-6">
                        <ul class="list-group">
                            <li id="center_name" class="list-group-item"></li>
                            <li id="unit_name" class="list-group-item"></li>
                            <li id="f_name" class="list-group-item"></li>
                            <li id="l_name" class="list-group-item"></li>
                            <li id="f_b_name" class="list-group-item"></li>
                            <li id="l_b_name" class="list-group-item"></li>
                            <li id="fa_name" class="list-group-item"></li>
                            <li id="fa_b_name" class="list-group-item"></li>
                            <li id="p_no" class="list-group-item"></li>
                            <li id="pass_book_no" class="list-group-item"></li>
                        </ul>
                   </div>
                     <div class="col-md-6">
                        <ul class="list-group">
                            <li id="nid_no" class="list-group-item"></li>
                            <li id="phone_status" class="list-group-item"></li>
                            <li id="status" class="list-group-item"></li>
                            <li id="is_loan" class="list-group-item"></li>
                            <li id="remain_loan" class="list-group-item"></li>
                            <li id="invested_loan_amount" class="list-group-item"></li>
                            <li id="remain_cart" class="list-group-item"></li>
                            <li id="total_cane" class="list-group-item"></li>
                            <li id="supplied_cane" class="list-group-item"></li>
                            <li id="supplied_cane_cart" class="list-group-item"></li>
                        </ul>
                   </div>
                  </div>

                </div>
            </div>
        </div>
    </div>
    {{-- Edit Modal --}}
    <div id="edit_modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Add Farmer</h4>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('dashboard.farmer.store') }}" id="add_farmer_form" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name" class="control-label">First Name</label>
                                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name">
                                    <span class="error error_first_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name" class="control-label">Last Name</label>
                                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name">
                                    <span class="error error_last_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="father_name" class="control-label">Father's Name</label>
                                    <input type="text" class="form-control" name="father_name" id="father_name" placeholder="Fataher's Name">
                                    <span class="error error_father_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bn_first_name" class="control-label">First Name (Bangla)</label>
                                    <input type="text" class="form-control" name="bn_first_name" id="bn_first_name" placeholder="First Name (Bangla)">
                                    <span class="error error_bn_first_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bn_last_name" class="control-label">Last Name (Bangla)</label>
                                    <input type="text" class="form-control" name="bn_last_name" id="bn_last_name" placeholder="Last Name (Bangla)">
                                    <span class="error error_bn_last_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bn_father_name" class="control-label">Father's Name (Bangla)</label>
                                    <input type="text" class="form-control" name="bn_father_name" id="bn_father_name" placeholder="Father's Name (Bangla)">
                                    <span class="error error_bn_father_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone" class="control-label">Phone Number</label>
                                    <input type="number" class="form-control" name="phone" id="phone" pattern="[0-1]{2}[0-9]{9}" placeholder="Phone Number">
                                    <span class="error error_phone text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone_status" class="control-label">Phone Status</label>
                                    <select class="form-control" name="phone_status">
                                        <option selected disabled>Choose Phone Status</option>
                                        <option value="1">Active</option>
                                        <option value="0">De-Active</option>
                                    </select>
                                    <span class="error error_phone_status text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option disabled>Choose Status</option>
                                        <option value="1" selected>Active</option>
                                        <option value="0">De-Active</option>
                                    </select>
                                    <span class="error error_status text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pass_book_number" class="control-label">Passbook Number</label>
                                    <input type="text" class="form-control" name="pass_book_number" id="pass_book_number" placeholder="Passbook Number">
                                    <span class="error error_pass_book_number text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nid" class="control-label">NID</label>
                                    <input type="text" class="form-control" name="nid" id="nid" placeholder="NID">
                                    <span class="error error_nid text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="is_loan" class="control-label">Loan Status</label>
                                    <select class="form-control" name="is_loan">
                                        <option selected disabled>Choose Loan Status</option>
                                        <option value="1">YES</option>
                                        <option value="0">NO</option>
                                    </select>
                                    <span class="error error_is_loan text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="loan_amount" class="control-label">Loan Amount</label>
                                    <input type="number" class="form-control" step="0.01" name="loan_amount" id="loan_amount" placeholder="Loan Amount">
                                    <span class="error error_loan_amount text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="remain_loan" class="control-label">Remain Loan</label>
                                    <input type="number" class="form-control" step="0.01" name="remain_loan" id="remain_loan" placeholder="Remain Loan">
                                    <span class="error error_remain_loan text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="invested_loan_amount" class="control-label">Invested Loan Amount</label>
                                    <input type="number" class="form-control" step="0.01" name="invested_loan_amount" id="invested_loan_amount" placeholder="Invested Loan Amount">
                                    <span class="error error_invested_loan_amount text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="remain_cart" class="control-label">Remain Cart</label>
                                    <input type="number" class="form-control" step="0.01" name="remain_cart" id="remain_cart" placeholder="Remain Cart">
                                    <span class="error error_remain_cart text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="total_cane" class="control-label">Total Cane</label>
                                    <input type="number" class="form-control" step="0.01" name="total_cane" id="total_cane" placeholder="Total Cane">
                                    <span class="error error_total_cane text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="supplied_cane" class="control-label">Supplied Cane</label>
                                    <input type="number" class="form-control" step="0.01" name="supplied_cane" id="supplied_cane" placeholder="Supplied Cane">
                                    <span class="error error_supplied_cane text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="supplied_cane_cart" class="control-label">Supplied Cane Cart</label>
                                    <input type="number" class="form-control" step="0.01" name="supplied_cane_cart" id="supplied_cane" placeholder="Supplied Cane Cart">
                                    <span class="error error_supplied_cane_cart text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="center_id" class="control-label">Center</label>
                                    <select class="form-control select2" name="center_id" id="center_id">
                                        <option selected disabled>--Select Center--</option>
                                        @foreach ($centers as $center)
                                            <option value="{{ $center->id }}">{{ $center->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error error_center_id text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unit_id" class="control-label">Unit</label>
                                    <select class="form-control select2" name="unit_id" id="unit_id">
                                        <option selected disabled>--Select Center--</option>
                                        @foreach ($units as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="error error_unit_id text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="village" class="control-label">Village</label>
                                    <input type="text" class="form-control" name="village" id="village" placeholder="Village">
                                    <span class="error error_village text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Add Farmer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div> <!-- container -->
@endsection
@push('js')

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    {{--  progressbar  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/progressbar.js/dist/progressbar.min.css">
    <script src="https://cdn.jsdelivr.net/npm/progressbar.js/dist/progressbar.min.js"></script>

    <script src="{{ asset('dashboard/assets/select2/select2.min.js') }}" type="text/javascript"></script>


    <script>
         function clearData() {
            document.getElementById("add_user_form").reset();
        }

        $(document).ready( function() {
            //start
            $('[data-target="#popModal"]').click(function(){
                var id = $(this).attr('data-id');
                // console.log(id);
                if(id){
                    $.ajax({
                        url:"{{route('get.farmer', '')}}/"+id,
                        type: "GET",
                        dataType: "json",
                        success: function(data){
                            console.log(data);
                            // $('#f_name').html(data.first_name);
                            $('#center_name').html('<b>Center Name:</b>'+data.rel_to_center.name);
                            $('#unit_name').html('<b>Unit Name:</b>'+data.rel_to_unit.name);
                            $('#f_name').html('<b>First Name:</b>'+data.first_name);
                            $('#l_name').html('<b>last Name:</b>'+data.last_name);
                            $('#f_b_name').html('<b>Bangla Name:</b>'+data.bn_first_name);
                            $('#l_b_name').html('<b>Last Bangla Name:</b>'+data.bn_last_name);
                            $('#fa_name').html('<b>Father Name:</b>'+data.father_name);
                            $('#fa_b_name').html('<b>Father Bangla Name:</b>'+data.bn_father_name);
                            $('#p_no').html('<b>Phone No:</b>'+data.phone);
                            $('#pass_book_no').html('<b>Pass Book No:</b>'+data.pass_book_number);
                            $('#nid_no').html('<b>NID No:</b>'+data.nid);
                            $('#phone_status').html('<b>Phone Status:</b>'+data.phone_status);
                            $('#status').html('<b>Status:</b>'+data.status);
                            $('#is_loan').html('<b>Loan:</b>'+data.is_loan);
                            $('#remain_loan').html('<b>Remain Loan:</b>'+data.remain_loan);
                            $('#invested_loan_amount').html('<b>Invested Loan Amount:</b>'+data.invested_loan_amount);
                            $('#remain_cart').html('<b>Remain Cart:</b>'+data.remain_cart);
                            $('#total_cane').html('<b>Total Cane:</b>'+data.total_cane);
                            $('#supplied_cane').html('<b>Supplied Cane:</b>'+data.supplied_cane);
                            $('#supplied_cane_cart').html('<b>Supplied Cane Cart:</b>'+data.supplied_cane_cart);
                        }
                    })
                }else{
                    $('#f_name').empty();
                }

            });// end

            /**
             * Select 2 Component
             * */
            // jQuery(".select2").select2({
            //     width: '100%',
            // });


            /**
             * Yajra DataTable for show all data
             *
             * */
            var farmer__Table = $('.data_tbl').DataTable({
                // processing: true,
                // serverSide: true,

            });


            /**
             *  Add Farmer Form
             **/

            // $(document).on('submit', '#add_farmer_form', function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('action');

            //     $('.submit_button').prop('type', 'button');

            //     $.ajax({
            //         url: url,
            //         type: 'post',
            //         data: new FormData(this),
            //         contentType: false,
            //         cache: false,
            //         processData: false,
            //         success: function(data) {

            //             $('#add_farmer_form')[0].reset();
            //             $('#myModal').modal('hide');

            //             $('.submit_button').prop('type', 'submit');

            //             farmer__Table.ajax.reload();
            //             toastr.success(data)

            //         },
            //         error: function(err) {
            //             let error = err.responseJSON;

            //             $.each(error.errors, function (key, error){
            //                 $('.submit_button').prop('type', 'submit');
            //                 $('.error_' + key + '').html(error[0]);
            //             });
            //         }
            //     });
            // });


             /**
             *  Upload Farmer Data
             **/

            $(document).on('submit', '#import_farmer_form', function(e) {
                e.preventDefault();
                var url = $(this).attr('action');

                $('.submit_button').prop('type', 'button');

                $.ajax({
                    url: url,
                    type: 'post',
                    data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {

                        $('#import_farmer_form')[0].reset();
                        $('#upModel').modal('hide');

                        $('.submit_button').prop('type', 'submit');

                        farmer__Table.ajax.reload();
                        toastr.success(data)

                    },
                    error: function(err) {
                        let error = err.responseJSON;

                        $.each(error.errors, function (key, error){
                            $('.submit_button').prop('type', 'submit');
                            $('.error_' + key + '').html(error[0]);
                        });
                    }
                });
            });



            /**
             * Delete Form Open
             * */

            $(document).on('click', '#delete_btn', function(e) {
                e.preventDefault();

                var url = $(this).attr('href');

                $('#deleted_form').attr('action', url);

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleted_form').submit();
                }
                })

            })

            /**
             * Delete Form Submit
             * */
            $(document).on('submit', '#deleted_form', function(e) {
                e.preventDefault();
                var url = $(this).attr('action');
                var request = $(this).serialize();
                $.ajax({
                    url: url,
                    type: 'get',
                    success: function(data) {
                        toastr.error(data)
                        farmer__Table.ajax.reload();
                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        farmer__Table.ajax.reload();
                    }
                });
            });

            /**
             * Edit Form Open
             * */
            $(document).on('click', '#edit_btn', function(e) {
                e.preventDefault();

                var url = $(this).attr('href');

                $.ajax({
                    url: url,
                    type: 'get',
                    success: function(data) {
                        $('#edit-content').html(data);
                        $('#editModal').modal('show');
                    },
                    error: function(err) {
                        $('.data_preloader').hide();
                        if (err.status == 0) {
                            toastr.error('Net Connetion Error. Reload This Page.');
                        } else if (err.status == 500) {
                            toastr.error('Server Error, Please contact to the support team.');
                        }
                    }
                });
            });

            /**
             * Status Active De-Active Form
             * author : Nymul Islam Moon <towkir1997islam@gmail.com>
             * Active Status
             * */

            // $(document).on('click', '#active_btn', function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('href');
            //     $.ajax({
            //         url: url,
            //         type: 'post',
            //         success: function(data) {
            //             toastr.success(data)
            //             farmer__Table.ajax.reload();

            //         },
            //         error: function(err) {
            //             toastr.error(err.responseJSON)
            //             farmer__Table.ajax.reload();
            //         }
            //     });
            // });


             /**
             * Status Active De-Active Form
             * author : Nymul Islam Moon <towkir1997islam@gmail.com>
             * De-Active Status
             * */

            // $(document).on('click', '#deactive_btn', function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('href');
            //     $.ajax({
            //         url: url,
            //         type: 'post',
            //         success: function(data) {
            //             toastr.error(data)
            //             farmer__Table.ajax.reload();

            //         },
            //         error: function(err) {
            //             toastr.error(err.responseJSON)
            //             farmer__Table.ajax.reload();
            //         }
            //     });
            // });


            /**
             * Show Units List for Center
             *
             * */

            $(document).on('change', '#center_id', function(e) {
                e.preventDefault();
                let un_id = $(this).val();
                url = "{{ route('dashboard.unit.get') }}",
                $.ajax({
                    url: url,
                    type: 'post',
                    data: 'un_id='+un_id,
                    success: function(data) {
                        $('#unit_id').html(data);
                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        service__category__table.ajax.reload();
                    }
                });
            });
        });
        //  ajax: {


        //             url: "{{ route('dashboard.farmer.index') }}",
        //         },
        //         columns: [

        //             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
        //             {data: 'first_name', name: 'first_name'},
        //             {data: 'bn_first_name', name: 'bn_first_name'},
        //             {data: 'last_name', name: 'last_name'},
        //             {data: 'bn_last_name', name: 'bn_last_name'},
        //             {data: 'father_name', name: 'father_name'},
        //             {data: 'bn_father_name', name: 'bn_father_name'},
        //             {data: 'center_name', name: 'center_name'},
        //             {data: 'unit_name', name: 'unit_name'},
        //             {data: 'nid', name: 'nid'},
        //             {data: 'phone', name: 'phone'},
        //             {data: 'phone_status', name: 'phone_status'},
        //             {data: 'pass_book_number', name: 'pass_book_number'},
        //             {data: 'status', name: 'status'},
        //             {data: 'is_loan', name: 'is_loan'},
        //             {data: 'loan_amount', name: 'loan_amount'},
        //             {data: 'remain_loan', name: 'remain_loan'},
        //             {data: 'invested_loan_amount', name: 'invested_loan_amount'},
        //             {data: 'remain_cart', name: 'remain_cart'},
        //             {data: 'total_cane', name: 'total_cane'},
        //             {data: 'supplied_cane', name: 'supplied_cane'},
        //             {data: 'supplied_cane_cart', name: 'supplied_cane_cart'},
        //             {data: 'village', name: 'village'},
        //             {data: 'action', name: 'action'},

        //         ]


                            // {{-- @if(auth()->user()->user_type == 1)
                            //     <div class="col-md-6">
                            //         <div class="form-group">
                            //             <label for="office_id" class="control-label">Offices</label>
                            //             <select class="form-control select2" name="office_id" id="office_id">
                            //                 <option selected disabled>Choose Office</option>
                            //                 @foreach ($offices as $office)
                            //                     <option value="{{ $office->id }}">{{ $office->name }}</option>
                            //                 @endforeach

                            //             </select>
                            //             <span class="error error_office_id text-danger"></span>
                            //         </div>
                            //     </div>
                            // @endif --}}
    </script>
@endpush
