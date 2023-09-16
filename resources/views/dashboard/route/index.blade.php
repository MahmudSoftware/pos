@extends('dashboard.index')


@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush


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
            <button class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                data-target=".bs-example-modal-lg">Add Route</button>
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
                                <table class="table table-striped table-bordered data_tbl user__table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Group Name</th>
                                            <th>Route Name</th>
                                            <th>Action</th>
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
                        <h4 class="modal-title" id="myLargeModalLabel">Add Route</h4>
                    </div>
                    <div class="modal-body">
                        <form class="" action="{{ route('route.create.store') }}" id="add_user_form" method="POST">
                            @csrf
                            @method('POST')
                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="field-2" class="control-label">Group Name</label>
                                        <select class="form-control" name="group_name" id="group_name">
                                            <option selected="" disabled="">Choose Group</option>
                                            @foreach ($routeGroups as $routeGroup)
                                            <option value="{{ $routeGroup->group_name }}">{{ $routeGroup->group_name }}</option>
                                            @endforeach

                                        </select>
                                        <span class="error error_user_type text-danger"></span>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="first_name" class="control-label">Route Name</label>
                                        <input required type="text" class="form-control" name="name" id="name"
                                            value="" placeholder="Route Name">
                                        <span class="error error_first_name text-danger"></span>
                                    </div>
                                </div>

                            </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal"
                            onclick="clearData()">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Add
                            User</button>
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
            var user__table = $('.data_tbl').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('route.create') }}",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'group_name',
                        name: 'group_name'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },

                ]
            });


            /**
             *  Add Designation Form
             **/

            $(document).on('submit', '#add_user_form', function(e) {
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

                        $('#add_user_form')[0].reset();
                        $('#myModal').modal('hide');

                        $('.submit_button').prop('type', 'submit');

                        user__table.ajax.reload();
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
                        user__table.ajax.reload();
                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        user__table.ajax.reload();
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
                        user__table.ajax.reload();

                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        user__table.ajax.reload();
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
                        user__table.ajax.reload();

                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        user__table.ajax.reload();
                    }
                });
            });

        });

        function clearData() {
            document.getElementById("add_user_form").reset();
        }
    </script>
@endpush
