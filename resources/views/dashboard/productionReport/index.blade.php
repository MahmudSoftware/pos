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
        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Add Product Report</button>
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
                                        <th>Production Date</th>
                                        <th>Cane Crushed(M.T)</th>
                                        <th>Sugar Produced(M.T)</th>
                                        <th>Sugar Recovery(%)</th>
                                        <th>Available Sugar</th>
                                        <th>Molasses(M.T)</th>
                                        <th>Bagasse(M.T)</th>
                                        <th>Press Mud(M.T)</th>
                                        <th>Average Of Crushing Including Stoppage(M.T)</th>
                                        <th>Mill Stoppage(Hr)</th>
                                        <th>Remark</th>
                                        <th width="25%">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productions as $production)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $production->production_date }}</td>
                                            <td>{{ $production->cane_crushed }}</td>
                                            <td>{{ $production->sugar_production }}</td>
                                            <td>{{ $production->sugar_recovery }}</td>
                                            <td>{{ $production->available_sugar }}</td>
                                            <td>{{ $production->molasses }}</td>
                                            <td>{{ $production->bagasse }}</td>
                                            <td>{{ $production->press_mud }}</td>
                                            <td>{{ $production->crush_stoppage }}</td>
                                            <td>{{ $production->mill_stoppage }}</td>
                                            <td>{{ $production->remark }}</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#editModal" href="{{ route('production.edit', $production->id) }}" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('production.destroy',$production->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
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
                    <h4 class="modal-title" id="myLargeModalLabel">Add Production Report</h4>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('production.store') }}" id="" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="control-label">Production Date</label>
                                    <input type="date" class="form-control" name="production_date" id="name" value="{{ old('production_date') }}">
                                    @error('production_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone" class="control-label">Cane Crushed(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="cane_crushed" id="phone" value="{{ old('cane_crushed') }}">
                                     @error('cane_crushed')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Sugar Produced(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="sugar_production" id="field-2" value="{{ old('sugar_production') }}">
                                    @error('sugar_production')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Sugar Recovery(%)</label>
                                    <input type="text" class="form-control" step="0.01" name="sugar_recovery" id="field-2" value="{{ old('sugar_recovery') }}">
                                     @error('sugar_recovery')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Available Sugar</label>
                                    <input type="text" class="form-control" step="0.01" name="available_sugar" id="field-2" value="{{ old('available_sugar') }}">
                                     @error('available_sugar')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Molasses(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="molasses" id="field-2" value="{{ old('molasses') }}">
                                     @error('molasses')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Bagasse(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="bagasse" id="field-2" value="{{ old('bagasse') }}">
                                     @error('bagasse')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Press Mud(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="press_mud" id="field-2" value="{{ old('press_mud') }}">
                                    @error('press_mud')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Average Of Crushing Including Stoppage(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="crush_stoppage" id="field-2" value="{{ old('crush_stoppage') }}">
                                     @error('crush_stoppage')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Mill Stoppage(Hr)</label>
                                    <input type="text" class="form-control" step="0.01" name="mill_stoppage" id="field-2" value="{{ old('mill_stoppage') }}">
                                    @error('mill_stoppage')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Remark</label>
                                    <input type="text" class="form-control" name="remark" id="field-2" value="{{ old('remark') }}">
                                    @error('remark')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" onclick="this.form.reset()" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Modal --}}
     <div id="editModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Edit Production Report</h4>
                </div>
                <div class="modal-body">
                    <form class="" action="{{ route('production.update', $production->id) }}" id="" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="control-label">Production Date</label>
                                    <input type="date" class="form-control" name="production_date" id="name" value="{{ old('production_date') }}">
                                    @error('production_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone" class="control-label">Cane Crushed(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="cane_crushed" id="phone" value="{{ old('cane_crushed') }}">
                                     @error('cane_crushed')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Sugar Produced(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="sugar_production" id="field-2" value="{{ old('sugar_production') }}">
                                    @error('sugar_production')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Sugar Recovery(%)</label>
                                    <input type="text" class="form-control" step="0.01" name="sugar_recovery" id="field-2" value="{{ old('sugar_recovery') }}">
                                     @error('sugar_recovery')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Available Sugar</label>
                                    <input type="text" class="form-control" step="0.01" name="available_sugar" id="field-2" value="{{ old('available_sugar') }}">
                                     @error('available_sugar')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Molasses(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="molasses" id="field-2" value="{{ old('molasses') }}">
                                     @error('molasses')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Bagasse(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="bagasse" id="field-2" value="{{ old('bagasse') }}">
                                     @error('bagasse')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Press Mud(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="press_mud" id="field-2" value="{{ old('press_mud') }}">
                                    @error('press_mud')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Average Of Crushing Including Stoppage(M.T)</label>
                                    <input type="text" class="form-control" step="0.01" name="crush_stoppage" id="field-2" value="{{ old('crush_stoppage') }}">
                                     @error('crush_stoppage')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Mill Stoppage(Hr)</label>
                                    <input type="text" class="form-control" step="0.01" name="mill_stoppage" id="field-2" value="{{ old('mill_stoppage') }}">
                                    @error('mill_stoppage')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Remark</label>
                                    <input type="text" class="form-control" name="remark" id="field-2" value="{{ old('remark') }}">
                                    @error('remark')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" onclick="this.form.reset()" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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


            $('[data-target="#edit_modal"]').click(function(){

             });


            /**
             * Yajra DataTable for show all data
             *
             * */
            var office__table = $('.data_tbl').DataTable({
                // processing: true,
                // serverSide: true,
                // ajax: {
                //     url: "{{ route('dashboard.office.index') }}",
                // },
                // columns: [
                //     {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                //     {data: 'prefix', name: 'prefix'},
                //     {data: 'name', name: 'name'},
                //     {data: 'phone', name: 'phone'},
                //     {data: 'email', name: 'email'},
                //     {data: 'status', name: 'status'},
                //     {data: 'type', name: 'type'},
                //     {data: 'address', name: 'address'},
                //     {data: 'description', name: 'description'},
                //     {data: 'action', name: 'action'},

                // ]
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
