@extends('dashboard.index')


@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush


@section('dashboard_content')
    <div class="container">


        <div class="row">
            <div class="col-sm-12">
                <h4 class="pull-left page-title">Dashboard</h4>
                <ol class="breadcrumb pull-right">
                    <li><a href="#">Moltran</a></li>
                    <li><a href="#">Tables</a></li>
                    <li class="active">Datatable</li>
                </ol>
            </div>
        </div>
        <div class="col-md-6"></div>
        <div class="col-md-6" @style(['text-align: right'])>
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                data-target=".bs-example-modal-lg">Add Session</button>
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
                                <table class="table table-striped table-bordered data_tbl office__table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>PREFIX</th>
                                            <th>NAME</th>
                                            <th>PHONE</th>
                                            <th>E-MAIL</th>
                                            <th>STATUS</th>
                                            <th>TYPE</th>
                                            <th>ADDRESS</th>
                                            <th>DESCRIPTION</th>
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
                        <h4 class="modal-title" id="myLargeModalLabel">Add Session</h4>
                    </div>
                    <div class="modal-body">
                        <form class="" action="{{ route('dashboard.session.store') }}" id="add_office_form"
                            method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Session Name</label>
                                        <select name="" id="" class="form-control">
                                            <option value="">Select Session</option>
                                        </select>
                                        {{-- <input required type="text" class="form-control" name="season" id="season"
                                            value="{{ old('season') }}" placeholder="Session Name"> --}}
                                        <span class="error error_name text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="phone" class="control-label">Installed Capacity</label>
                                        <input type="number" class="form-control" name="installed_capacity"
                                            id="installed_capacity" value="{{ old('installed_capacity') }}"
                                            placeholder="Installed Capacity">
                                        <span class="error error_phone text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Cane Crushing Tar</label>
                                        <input type="number" class="form-control" name="cane_crushing_tar"
                                            id="cane_crushing_tar-2" value="{{ old('cane_crushing_tar') }}"
                                            placeholder="Cane Crushing Tar">
                                        <span class="error error_email text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Sugar Production Tar</label>
                                        <input type="number" class="form-control" name="sugar_production_tar"
                                            id="sugar_production_tar" value="{{ old('sugar_production_tar') }}"
                                            placeholder="Sugar Production Tar">
                                        <span class="error error_email text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Recovery Per Tar</label>
                                        <input type="number" class="form-control" name="recovery_per_tar"
                                            id="recovery_per_tar" value="{{ old('recovery_per_tar') }}"
                                            placeholder="Recovery Per Tar">
                                        <span class="error error_email text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Date Of Start Mill</label>
                                        <input type="date" class="form-control" name="date_of_start_mill"
                                            id="date_of_start_mill" value="{{ old('date_of_start_mill') }}"
                                            placeholder="Date Of Start Mill">
                                        <span class="error error_email text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Crop Day</label>
                                        <input type="number" class="form-control" name="crop_day" id="crop_day"
                                            value="{{ old('crop_day') }}" placeholder="Crop Day">
                                        <span class="error error_email text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Status</label>
                                        <select class="form-control" name="status">
                                            {{--  <option selected disabled>Choose Status</option>  --}}
                                            <option value="1">Active</option>
                                            <option value="2">De-Active</option>
                                        </select>
                                        <span class="error error_status text-danger"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light submit_button">Add Session</button>
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
    <script>
        $(document).ready(function() {

            /**
             * Yajra DataTable for show all data
             *
             * */
            var office__table = $('.data_tbl').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.office.index') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'prefix',
                        name: 'prefix'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'address',
                        name: 'address'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ]
            });


            /**
             *  Add Office Form
             **/

            $(document).on('submit', '#add_office_form', function(e) {
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
                        $('#add_office_form')[0].reset();
                        $('#myModal').modal('hide');
                        $('.submit_button').prop('type', 'submit');
                        office__table.ajax.reload();
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
                        office__table.ajax.reload();
                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        office__table.ajax.reload();
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
             * */

            $(document).on('click', '#active_btn', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'post',
                    success: function(data) {
                        toastr.success(data)
                        office__table.ajax.reload();

                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        office__table.ajax.reload();
                    }
                });
            });



            $(document).on('click', '#deactive_btn', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'post',
                    success: function(data) {
                        toastr.error(data)
                        office__table.ajax.reload();

                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        office__table.ajax.reload();
                    }
                });
            });

        });
    </script>
@endpush
