@extends('dashboard.index')


@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush

@section('title', 'Designation - ')

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
        <div class="col-md-6" @style(['text-align: right'])>
{{--        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Add Designation</button>--}}
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
                        <table class="table table-striped table-bordered data_tbl designation__table">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>ACTION</th>
                                <th>P.B.No</th>
                                <th>Purjee No</th>
                                <th>Delivery Date</th>
                                <th>Sms Send Date</th>
                                <th>Center Name</th>
                                <th>Unit No</th>
                                <th>Grower Name</th>
                                <th>Father Name</th>
                                <th>Village</th>
                                <th>National ID</th>
                                <th>Mobile No</th>
                                <th>Total Loan</th>
                                <th>CLF No</th>
                                <th>Actual Weight Date</th>
                                <th>Purchase Sheet</th>
                                <th>Weight Voucher</th>
                                <th>Actual Weight</th>
                                <th>Price/Kg</th>
                                <th>Cane Total Production</th>
                                <th>Loan Deduction</th>
                                <th>Loan Purpose</th>
                                <th>Sarak Khat</th>
                                <th>Chashi Fed. Khat</th>
                                <th>Kollyan Khat</th>
                                <th>Other</th>
                                <th>Total Deduction</th>
                                <th>Net Total</th>
                                <th>Amount Of Sugar</th>
                                <th>Remaining Loan</th>
                                <th>Remark</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div> <!-- container -->
@endsection
@push('js')

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>

        $(document).ready( function() {
            var farmer_Table = $('.data_tbl').DataTable({

            });
        });
    </script>
@endpush
