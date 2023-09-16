@extends('dashboard.index')


@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush


@section('dashboard_content')
<div class="container">

<!-- Page-Title -->
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
                <h3 class="panel-title">Datatable</h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <table class="table table-striped table-bordered data_tbl">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>CODE</th>
                                    <th>NAME</th>
                                    <th>STATUS</th>
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

</div> <!-- End Row -->


</div> <!-- container -->
@endsection
@push('js')

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready( function() {
            /**
             * Yajra DataTable for show all data
             *
             * */
            var test__table = $('.data_tbl').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('test.index') }}",
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'code', name: 'code'},
                    {data: 'name', name: 'name'},
                    {data: 'status', name: 'status'},
                    // {data: 'action', name: 'action'},

                ]
            });

            $('#status').change(function(){

                let id = $(this).val();
                $.ajax({
                    url: "{{ route('test.index') }}",
                    type: 'get',
                    data: 'status='+id,
                    success: function(data) {
                        // toastr.error(data)
                        test__table.draw();
                        // $('.contact_table').DataTable().ajax.reload();
                    },
                    error: function(err) {
                        // toastr.error(err.responseJSON)
                        // test__table.ajax.reload();
                    }
                });
            });
        });
    </script>
@endpush
