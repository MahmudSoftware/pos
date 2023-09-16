@extends('dashboard.index')


@push('style')
    {{-- Datatable Link --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    {{-- Datatable Button Link --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

@endpush

@section('title', 'SMS - ')

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
        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Add SMS</button>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label><strong>Status :</strong></label>
                        <select id='status' class="form-control" style="width: 200px">
                            <option value="">--Select Status--</option>
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>
                </div>
            </div>

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
                            <table class="table table-striped table-bordered data_tbl sms__table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        {{-- <th>CODE</th> --}}
                                        <th>SMS SUBJECT</th>
                                        <th>SMS STATUS</th>
                                        <th>SMS MESSAGES</th>
                                        <th>ACTION</th>
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

    {{-- Add Modal --}}
    <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Add SMS</h4>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('dashboard.sms.store') }}" id="add_sms_form" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject" class="control-label">SMS Subject</label>
                                    <input type="text" class="form-control" name="subject" id="subject" value="{{ old('subject') }}" placeholder="SMS Subject">
                                    <span class="error error_subject text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option selected disabled>Choose Status</option>
                                        <option value="1" {{ old('status') == 1 ? 'SELECTED' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == 0 ? 'SELECTED' : '' }}>De-Active</option>
                                    </select>
                                    <span class="error error_status text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group no-margin">

                                    <label for="message" class="control-label">Message</label>
                                    <textarea class="form-control autogrow" id="message" name="message" placeholder="Write the message" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{ old('message') }}</textarea>
                                    <span class="error error_message text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Add SMS</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
    <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
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

    {{-- Datatable Buttons --}}
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>

    <script>
        $(document).ready( function() {

            /**
             * Yajra DataTable for show all data
             *
             * */
            var sms__table = $('.data_tbl').DataTable({
                processing      : true,
                serverSide      : true,
                "lengthMenu": [
                    [10, 25, 50, 100, 500, 1000, -1],
                    [10, 25, 50, 100, 500, 1000, "All"],
                ],
                ajax: {
                    url: "{{ route('dashboard.sms.index') }}",
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    // {data: 'code', name: 'code'},
                    {data: 'subject', name: 'subject'},
                    {data: 'status', name: 'status'},
                    {data: 'message', name: 'message'},
                    {data: 'action', name: 'action'},
                ]
            });


            /**
             *  Add Depertment Form
             **/

            $(document).on('submit', '#add_sms_form', function(e) {
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

                        $('#add_sms_form')[0].reset();
                        $('#myModal').modal('hide');

                        $('.submit_button').prop('type', 'submit');

                        sms__table.ajax.reload();
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
                        sms__table.ajax.reload();
                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        sms__table.ajax.reload();
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
             * Status Active Script
             * */

            $(document).on('click', '#active_btn', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'post',
                    success: function(data) {
                        toastr.success(data)
                       sms__table.ajax.reload();

                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        sms__table.ajax.reload();
                    }
                });
            });



            /**
             * Status De-active Script
             * */

            $(document).on('click', '#deactive_btn', function(e) {
                e.preventDefault();
                var url = $(this).attr('href');
                $.ajax({
                    url: url,
                    type: 'post',
                    success: function(data) {
                        toastr.error(data)
                        sms__table.ajax.reload();

                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        sms__table.ajax.reload();
                    }
                });
            });

        });
    </script>
@endpush
