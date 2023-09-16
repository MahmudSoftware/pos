@extends('dashboard.index')


@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush


@section('dashboard_content')
<div class="container">
    {{-- <div class="row">
        <div class="col-sm-12">
            <h4 class="pull-left page-title">Datatable</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Moltran</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Datatable</li>
            </ol>
        </div>
    </div> --}}
    <div class="col-md-6">
        <h5>Mill Year Setup List</h5>
    </div>
    <div class="col-md-6" @style(['text-align: right'])>
        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Add New</button>
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
                            <table class="table table-striped table-bordered data_tbl year__setup__table">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Office Name</th>
                                        <th>Season</th>
                                        <th>Install Capacity(TCD)</th>
                                        <th>Cane Crushing Target(M.T.)</th>
                                        <th>Sugar Production Target(M.T.)</th>
                                        <th>Recovery Target(M.T.)</th>
                                        <th>Crop Day</th>
                                        <th>Mill Start Date</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if($millYearSetups != NULL)
                                        @foreach ($millYearSetups as $millYearSetup)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ (isset($millYearSetup->officeData))? $millYearSetup->officeData->name:'' }}</td>
                                            <td>{{ (isset($millYearSetup->millYearSetup))? $millYearSetup->seasonData->name:'' }}</td>
                                            <td>{{ $millYearSetup->install_capacity }}</td>
                                            <td>{{ $millYearSetup->cane_crushing }}</td>
                                            <td>{{ $millYearSetup->sugar_production }}</td>
                                            <td>{{ $millYearSetup->recovery_target }}</td>
                                            <td>{{ $millYearSetup->crop_day }}</td>
                                            <td>{{ $millYearSetup->date_of_start_mill }}</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#edit_modal" href="{{ route('millYearSetup.edit', $millYearSetup->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('millYearSetup.destroy', $millYearSetup->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif

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
                    <h4 class="modal-title" id="myLargeModalLabel">Add Mill Year Setup</h4>
                </div>
                <div class="modal-body">
                      <form class="" action="{{ route('millYearSetup.store') }}" id="" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="control-label">Economical Year</label>
                                     <select class="form-control" name="season_id" id="season_id">
                                        <option selected disabled>--Select--</option>
                                        @foreach ($yearSetups as $yearSetup)
                                            <option value="{{ $yearSetup->id }}">{{ $yearSetup->name }}</option>
                                        @endforeach
                                    </select>
                                     @error('season_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="control-label">Office Name</label>
                                     <select class="form-control" name="office_id" id="office_id">
                                        <option selected disabled>--Select--</option>
                                        @foreach ($offices as $office)
                                            <option value="{{ $office->id }}">{{ $office->name }}</option>
                                        @endforeach
                                    </select>
                                     @error('office_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date" class="control-label">Install Capacity(TCD)</label>
                                    <input type="number" class="form-control" name="install_capacity" id="install_capacity" value="{{ old('install_capacity') }}">
                                    @error('install_capacity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Cane Crusing Target(M.T.)</label>
                                    <input type="number" class="form-control" name="cane_crushing" id="cane_crushing" value="{{ old('cane_crushing') }}">
                                     @error('cane_crushing')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Sugar Production Target(M.T.)</label>
                                    <input type="number" class="form-control" name="sugar_production" id="sugar_production" value="{{ old('sugar_production') }}">
                                    @error('sugar_production')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Recovery Target(M.T.)</label>
                                    <input type="number" step="0.01" class="form-control" name="recovery_target" id="recovery_target" value="{{ old('recovery_target') }}">
                                     @error('recovery_target')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Crop Day</label>
                                    <input type="number" class="form-control" name="crop_day" id="crop_day" value="{{ old('crop_day') }}">
                                    @error('crop_day')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Mill Start Date</label>
                                    <input type="date" class="form-control" name="date_of_start_mill" id="date_of_start_mill" value="{{ old('date_of_start_mill') }}">
                                    @error('date_of_start_mill')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" onclick="this.form.reset()" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Add Mill Setup Year</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}

     <div id="edit_modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Edit Mill Year Setup</h4>
                </div>
                <div class="modal-body">
                      <form class="" action="{{ route('millYearSetup.update', $millYearSetup->id) }}" id="" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="control-label">Economical Year</label>
                                     <select class="form-control" name="season_id" id="season_id">
                                        <option selected disabled>--Select--</option>
                                        @foreach ($yearSetups as $yearSetup)
                                            <option value="{{ $yearSetup->id }}" {{ ($millYearSetup->id == $yearSetup->id)? 'selected':'' }}>{{ $yearSetup->name }}</option>
                                        @endforeach
                                    </select>
                                     @error('season_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="control-label">Office Name</label>
                                     <select class="form-control" name="office_id" id="office_id">
                                        <option selected disabled>--Select--</option>
                                        @foreach ($offices as $office)
                                            <option value="{{ $office->id }}"{{ ($millYearSetup->id == $office->id)? 'selected':'' }}>{{ $office->name }}</option>
                                        @endforeach
                                    </select>
                                     @error('season_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date" class="control-label">Install Capacity(TCD)</label>
                                    <input type="number" value="{{ $millYearSetup->install_capacity }}" class="form-control" name="install_capacity" id="install_capacity" value="{{ old('install_capacity') }}">
                                    @error('install_capacity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Cane Crusing Target(M.T.)</label>
                                    <input type="number" value="{{ $millYearSetup->cane_crushing }}" class="form-control" name="cane_crushing" id="cane_crushing" value="{{ old('cane_crushing') }}">
                                     @error('cane_crushing')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Sugar Production Target(M.T.)</label>
                                    <input type="number" value="{{ $millYearSetup->sugar_production }}" class="form-control" name="sugar_production" id="sugar_production" value="{{ old('sugar_production') }}">
                                    @error('sugar_production')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Recovery Target(M.T.)</label>
                                    <input type="number" value="{{ $millYearSetup->recovery_target }}" step="0.01" class="form-control" name="recovery_target" id="recovery_target" value="{{ old('recovery_target') }}">
                                     @error('recovery_target')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Crop Day</label>
                                    <input type="number" value="{{ $millYearSetup->crop_day }}" class="form-control" name="crop_day" id="crop_day" value="{{ old('crop_day') }}">
                                    @error('crop_day')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Mill Start Date</label>
                                    <input type="date" value="{{ $millYearSetup->date_of_start_mill }}" class="form-control" name="date_of_start_mill" id="date_of_start_mill" value="{{ old('date_of_start_mill') }}">
                                    @error('date_of_start_mill')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" onclick="this.form.reset()" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Update Mill Setup Year</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg" id="edit-content"></div>
    </div> --}}


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

             $('[data-target="#edit_modal"]').click(function(){

             });

            /**
             * Yajra DataTable for show all data
             *
             * */
            var year__setup__table = $('.data_tbl').DataTable({
                // processing: true,
                // serverSide: true,
                // ajax: {
                //     url: "{{ route('dashboard.millYearSetup.index') }}",
                // },
                // columns: [
                //     {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                //     {data: 'name', name: 'name'},
                //     {data: 'start_date', name: 'start_date'},
                //     {data: 'end_date', name: 'end_date'},
                //     {data: 'action', name: 'action'},
                // ]
            });


            /**
             *  Add Designation Form
             **/

            // $(document).on('submit', '#millYearSetup.store', function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('action');
            //     console.log(url);
            //     $('.submit_button').prop('type', 'button');

            //     $.ajax({
            //         url: url,
            //         type: 'post',
            //         data: new FormData(this),
            //         contentType: false,
            //         cache: false,
            //         processData: false,
            //         success: function(data) {

            //             $('#add_yearsetup_form')[0].reset();
            //             $('#myModal').modal('hide');

            //             $('.submit_button').prop('type', 'submit');

            //             user__table.ajax.reload();
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
             * Delete Form Open
             * */

            // $(document).on('click', '#delete_btn', function(e) {
            //     e.preventDefault();

            //     var url = $(this).attr('href');

            //     $('#deleted_form').attr('action', url);

            //     Swal.fire({
            //         title: 'Are you sure?',
            //         text: "You won't be able to revert this!",
            //         icon: 'warning',
            //         showCancelButton: true,
            //         confirmButtonColor: '#3085d6',
            //         cancelButtonColor: '#d33',
            //         confirmButtonText: 'Yes, delete it!'
            //     }).then((result) => {
            //     if (result.isConfirmed) {
            //         $('#deleted_form').submit();
            //     }
            //     })

            // })

            /**
             * Delete Form Submit
             * */
            // $(document).on('submit', '#deleted_form', function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('action');
            //     var request = $(this).serialize();
            //     $.ajax({
            //         url: url,
            //         type: 'get',
            //         success: function(data) {
            //             toastr.error(data)
            //             user__table.ajax.reload();
            //         },
            //         error: function(err) {
            //             toastr.error(err.responseJSON)
            //             user__table.ajax.reload();
            //         }
            //     });
            // });

            /**
             * Edit Form Open
             * */
            // $(document).on('click', '#edit_btn', function(e) {
            //     e.preventDefault();

            //     var url = $(this).attr('href');

            //     $.ajax({
            //         url: url,
            //         type: 'get',
            //         success: function(data) {

            //             // $('#edit-content').empty();
            //             $('#edit-content').html(data);
            //             $('#editModal').modal('show');
            //         },
            //         error: function(err) {
            //             $('.data_preloader').hide();
            //             if (err.status == 0) {
            //                 toastr.error('Net Connetion Error. Reload This Page.');
            //             } else if (err.status == 500) {
            //                 toastr.error('Server Error, Please contact to the support team.');
            //             }
            //         }
            //     });
            // });

            /**
             * Status Active De-Active Form
             * author : Nymul Islam Moon <towkir1997islam@gmail.com>
             * */

            // $(document).on('click', '#active_btn', function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('href');
            //     $.ajax({
            //         url: url,
            //         type: 'post',
            //         success: function(data) {
            //             toastr.success(data)
            //             user__table.ajax.reload();

            //         },
            //         error: function(err) {
            //             toastr.error(err.responseJSON)
            //             user__table.ajax.reload();
            //         }
            //     });
            // });



            // $(document).on('click', '#deactive_btn', function(e) {
            //     e.preventDefault();
            //     var url = $(this).attr('href');
            //     $.ajax({
            //         url: url,
            //         type: 'post',
            //         success: function(data) {
            //             toastr.error(data)
            //             user__table.ajax.reload();

            //         },
            //         error: function(err) {
            //             toastr.error(err.responseJSON)
            //             user__table.ajax.reload();
            //         }
            //     });
            // });

        });
    </script>
@endpush
