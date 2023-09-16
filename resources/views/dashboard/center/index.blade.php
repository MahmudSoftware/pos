@extends('dashboard.index')


@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    {{-- Link For Select 2 --}}
    <link href="{{ asset('dashboard/assets/select2/select2.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('title', 'Center - ')

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

        <div class="col-md-12" @style(['text-align: right'])>
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                data-target=".bs-example-modal-lg">Add Center</button>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">

                    <div class="row" @style('margin-left: 10px;')>

                        <div class="col-md-3">
                            <label><strong>Data Type :</strong></label>
                            <select class="form-control submitable" name="f_soft_delete_id" id="f_soft_delete_id">
                                <option selected value="1">All Center</option>
                                <option value="2">Trash Center</option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label><strong>Center Name :</strong></label>
                            <select class="form-control submitable" name="center_id" id="center_id">
                                <option selected value="0">All</option>
                                @foreach ($centers as $center)
                                    <option value="{{ $center->id }}">{{ $center->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3">
                            <label><strong>Status :</strong></label>
                            <select id='f_status' class="form-control submitable" name="f_status" style="width: 250px">
                                <option value="">--Select Status--</option>
                                <option value="1">Active</option>
                                <option value="2">Deactive</option>
                            </select>
                        </div>
                    </div>

                    <div class="panel-heading">
                        <div class="col-md-6">
                            <h3 class="panel-title">Datatable</h3>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                                <table class="table table-striped table-bordered data_tbl center__Table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>CENTER NAME</th>
                                            <th>CENTER STATUS</th>
                                            <th>CENTER ADDRESS</th>
                                            <th>CART PRICE</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Add Modal --}}
        <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
            aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="myLargeModalLabel">Add Center</h4>
                    </div>
                    <div class="modal-body">
                        <form class="" action="{{ route('dashboard.center.store') }}" id="add_center_form"
                            method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Center Name</label>
                                        <input type="text" class="form-control" name="name" id="field-2"
                                            placeholder="Center Name">
                                        <span class="error error_name text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Status</label>
                                        <select class="form-control" name="status">
                                            <option value="1">Active</option>
                                            <option value="0">De-Active</option>
                                        </select>
                                        <span class="error error_status text-danger"></span>
                                    </div>
                                </div>
                                <input type="hidden" name="office_id" value="{{ Auth()->user()->office_id }}">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Center Address</label>
                                        <input type="text" class="form-control" name="address" id="field-2"
                                            placeholder="Center Address">
                                        <span class="error error_address text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Cart Price</label>
                                        <input type="number" class="form-control" name="cart_price" id="field-2"
                                            placeholder="Cart Price">
                                        <span class="error error_address text-danger"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default waves-effect"
                                    data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Add
                                    Center</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Modal --}}
        <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg" id="edit-content"></div>
        </div>


        <form id="deleted_form" action="" method="post">
            @method('DELETE')
            @csrf
        </form>

    </div> <!-- container -->
@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    {{-- Script For SELECT 2 --}}
    <script src="{{ asset('dashboard/assets/select2/select2.min.js') }}" type="text/javascript"></script>
    <script>
        $(document).ready(function() {


            /**
             * Select 2 Component
             * */
            jQuery(".select2").select2({
                width: '100%',
            });

            /**
             * Yajra DataTable for show all data
             *
             * */
            var center__Table = $('.data_tbl').DataTable({
                processing: true,
                serverSide: true,
                searching: true,
                ajax: {
                    url: "{{ route('dashboard.center.index') }}",
                    data: function(e) {
                        e.center_id = $('#center_id').val();
                        e.f_status = $('#f_status').val();
                        e.f_soft_delete_id = $('#f_soft_delete_id').val();
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                     {
                        data: 'cart_price',
                        name: 'cart_price'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ]
            });


            /**
             *  Add Center Form
             **/

            $(document).on('submit', '#add_center_form', function(e) {
                e.preventDefault();
                // $('.loading_button').show();
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

                        $('#add_center_form')[0].reset();
                        $('#myModal').modal('hide');

                        $('.submit_button').prop('type', 'submit');

                        center__Table.ajax.reload();
                        toastr.success(data)

                    },
                    error: function(err) {
                        let error = err.responseJSON;

                        $.each(error.errors, function(key, error) {

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
                        center__Table.ajax.reload();
                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        center__Table.ajax.reload();
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

                        // $('#edit-content').empty();
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

            $(document).on('click', '#active_btn', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'post',
                    success: function(data) {
                        toastr.success(data)
                        center__Table.ajax.reload();

                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        center__Table.ajax.reload();
                    }
                });
            });


            /**
             * Status Active De-Active Form
             * author : Nymul Islam Moon <towkir1997islam@gmail.com>
             * De-Active Status
             * */

            $(document).on('click', '#deactive_btn', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'post',
                    success: function(data) {
                        toastr.error(data)
                        center__Table.ajax.reload();

                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        center__Table.ajax.reload();
                    }
                });
            });

            /**
             * Filter js for reload the table on change
             * */

            $('.submitable').on('change', function(e) {
                center__Table.ajax.reload();
            });


            /**
             * Restore Data ajax function
             * author : Nymul Islam Moon <towkir1997islam@gmail.com>
             * Active Status
             * */

            $(document).on('click', '#restore_btn', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'post',
                    success: function(data) {
                        toastr.success(data)
                        center__Table.ajax.reload();

                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        center__Table.ajax.reload();
                    }
                });
            });


            /**
             * Force Delete Data ajax function
             * author : Nymul Islam Moon <towkir1997islam@gmail.com>
             * Active Status
             * */

            $(document).on('click', '#force_delete_btn', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'delete',
                    success: function(data) {
                        toastr.error(data)
                        center__Table.ajax.reload();
                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        center__Table.ajax.reload();
                    }
                });
            });


        });
    </script>
@endpush
