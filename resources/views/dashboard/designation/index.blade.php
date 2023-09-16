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
        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Add Designation</button>
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
                                        <th>DESIGNATION NAME</th>
                                        <th>STATUS</th>
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
    <div id="myModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="closeModel" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Add Designation</h4>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('dashboard.designation.store') }}" id="add_designation_form" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Designation Name</label>
                                    <input type="text" class="form-control" name="name" id="field-2" placeholder="Designation Name">
                                    <span class="error error_name text-danger" id="errorLogname"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Status</label>
                                    <select class="form-control" name="status" id="status">
                                        {{-- <option selected disabled>Choose Status</option> --}}
                                        <option value="1">Active</option>
                                        <option value="2">De-Active</option>
                                    </select>
                                    <span class="error error_status text-danger" id="errorLog"></span>
                                </div>
                            </div>
                            <input type="hidden" name="office_id" value="{{ Auth()->user()->office_id }}">
                            <div class="col-md-12">
                                <div class="form-group no-margin">

                                    <label for="field-7" class="control-label">Description</label>
                                    <textarea class="form-control autogrow" id="description" name="description" placeholder="Write something about Designation" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;"></textarea>
                                    <span class="error error_description text-danger"></span>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" id="closeModel" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Add Designation</button>
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
    <script>
        $(document).ready( function() {

            /**
             * Yajra DataTable for show all data
             *
             * */
            var designation__table = $('.data_tbl').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dashboard.designation.index') }}",
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'status', name: 'status'},
                    {data: 'description', name: 'description'},
                    {data: 'action', name: 'action'},

                ]
            });


            /**
             *  Add Designation Form
             **/

            $(document).on('submit', '#add_designation_form', function(e) {
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

                        $('#add_designation_form')[0].reset();
                        $('#myModal').modal('hide');

                        $('.submit_button').prop('type', 'submit');

                        designation__table.ajax.reload();
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

            $(document).on('click','#closeModel',function(e){
                e.preventDefault();
               $('#status').val(1);
               $('#field-2').val(null);
               $('#errorLogname').empty();
               $('#errorLog').empty();
               $('#description').val(null);
            })

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
                        designation__table.ajax.reload();
                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        designation__table.ajax.reload();
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
                        console.log(data);
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
                        designation__table.ajax.reload();

                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        designation__table.ajax.reload();
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
                        designation__table.ajax.reload();

                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        designation__table.ajax.reload();
                    }
                });
            });

        });
    </script>
@endpush
