@extends('dashboard.index')

@push('style')
    {{-- Datatable Link --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    {{-- Datatable Button Link --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

    {{-- Select 2 --}}
    <link href="assets/jquery-multi-select/multi-select.css"  rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard/assets/select2/select2.css') }}" rel="stylesheet" type="text/css" />

@endpush

@section('title', 'Send SMS- ')

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
        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Send SMS</button>
    </div>

    <div class="row">
        <div class="col-md-12">
            {{-- <div class="card">
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
            </div> --}}

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
                            <table class="table table-striped table-bordered data_tbl send_sms__table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>PASSBOOK NUMBER</th>
                                        <th>CENTER</th>
                                        <th>UNIT</th>
                                        <th>SMS SUBJECT</th>
                                        <th>SMS MESSAGES</th>
                                        <th>FROM DATE</th>
                                        <th>TO DATE</th>
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
                    <h4 class="modal-title" id="myLargeModalLabel">Send SMS</h4>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('dashboard.sendSms.store') }}" id="send_sms_form" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sms_id" class="control-label">SMS</label>
                                    <select class="form-control select2" name="sms_id" id="sms_id">
                                        <option selected disabled>Choose SMS</option>
                                        @foreach ($smss as $sms)
                                            <option value="{{ $sms->id }}">{{ $sms->subject }}</option>
                                        @endforeach

                                    </select>
                                    <span class="error error_sms_id text-danger"></span>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pass_book_number" class="control-label">PassBook Number</label>
                                    <select class="form-control select2" name="pass_book_number[]" id="pass_book_number" multiple="multiple">
                                        <option selected disabled>Choose Passbook Number</option>
                                        @foreach ($farmers as $farmer)
                                            <option value="{{ $farmer->pass_book_number }}">{{ $farmer->pass_book_number }}</option>
                                        @endforeach

                                    </select>
                                    <span class="error error_pass_book_number text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="center_id" class="control-label">Center</label>
                                    <select class="form-control select2" name="center_id" id="center_id">
                                        <option selected disabled>Choose Center</option>
                                        @foreach ($centers as $center)
                                            <option value="{{ $center->id }}">{{ $center->name }}</option>
                                        @endforeach

                                    </select>
                                    <span class="error error_center_id text-danger"></span>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="unit_id" class="control-label">Unit</label>
                                    <select class="form-control select2" name="unit_id" id="unit_id">
                                    </select>
                                    <span class="error error_unit_id text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="from" class="control-label">From Date</label>
                                    <input type="date" class="form-control" name="from" id="from" placeholder="From Date">
                                    <span class="error error_from text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="to" class="control-label">To Date</label>
                                    <input type="date" class="form-control" name="to" id="to" placeholder="To Date">
                                    <span class="error error_to text-danger"></span>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Send SMS</button>
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

    <script src="{{ asset('dashboard/assets/select2/select2.min.js') }}" type="text/javascript"></script>

    <script type="text/javascript" src="{{ asset('dashboard/assets/jquery-multi-select/jquery.multi-select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('dashboard/assets/jquery-multi-select/jquery.quicksearch.js') }}"></script>

    <script>
        $(document).ready( function() {


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
            var send_sms__table = $('.data_tbl').DataTable({
                processing      : true,
                serverSide      : true,
                "lengthMenu": [
                    [10, 25, 50, 100, 500, 1000, -1],
                    [10, 25, 50, 100, 500, 1000, "All"],
                ],
                ajax: {
                    url: "{{ route('dashboard.sendSms.index') }}",
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    // {data: 'code', name: 'code'},
                    {data: 'passbook_number', name: 'passbook_number'},
                    {data: 'center', name: 'center'},
                    {data: 'unit', name: 'unit'},
                    {data: 'subject', name: 'subject'},
                    {data: 'message', name: 'message'},
                    {data: 'from', name: 'from'},
                    {data: 'to', name: 'to'},
                    {data: 'action', name: 'action'},
                ]
            });


           /**
             *  Send Sms Form
             **/

            $(document).on('submit', '#send_sms_form', function(e) {
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

                        $('#send_sms_form')[0].reset();
                        $('#myModal').modal('hide');

                        $('.submit_button').prop('type', 'submit');

                        send_sms__table.ajax.reload();
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
                        send_sms__table.ajax.reload();
                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        send_sms__table.ajax.reload();
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
                        // console.log(data);
                        // toastr.error(data)

                        // $('.contact_table').DataTable().ajax.reload();
                    },
                    error: function(err) {
                        toastr.error(err.responseJSON)
                        service__category__table.ajax.reload();
                    }
                });
            });
        });
    </script>
@endpush
