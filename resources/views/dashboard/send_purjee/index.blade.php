@extends('dashboard.index')


@push('style')
    {{-- Datatable Link --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    {{-- Datatable Button Link --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

@endpush
@push('style')
<style>
    .form-group .col-sm-9, select{
        width: 243px;
    }
</style>
@endpush
@section('title', 'Depertment - ')

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
    <div class="col-md-6"></div>
    {{-- <div class="col-md-6" @style(['text-align: right'])>
        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Add Depertment</button>
        <button class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-import-modal-lg">Upload Depertment Data</button>
        <a class="btn btn-info" href="{{ route('depertment.export.excle') }}">Export Excel File</a>
    </div> --}}
     <div class="col-md-12">
        <div class="panel panel-default">
            {{-- <div class="panel-heading"><h6 class="panel-title">All Asterisk(<span class="text-danger">*</span>) Mark Will Be Required</h6></div> --}}
            <div class="panel-body">
                <div class="row">
                    <h4 class="text-center text-black" style="margin-top: -19px;">Purjee Status</h4>
                    <form role="form">
                    <div class="col-md-1">
                         <label for="exampleInputEmail1">Date<span class="text-danger">*</span></label>
                    </div>
                    <div class="col-md-2">
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <button class="btn btn-info">Show</button>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group text-danger" style="margin-top: 9px; font-family: bolt;">
                            <p class="text-bold">Not Send:</p>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group text-danger" style="margin-top: 9px; font-family: bolt;">
                            <p class="text-bold">Total: </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group text-danger" style="margin-top: 9px; font-family: bolt;">
                            <p class="text-bold">Total Not Send: </p>
                        </div>
                    </div>
                </form>
                </div>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading text-center"><h3 class="panel-title" style="padding-right: 98px;
    margin-top: -6px;">Search Purjee For Send SMS</h3></div>
            <div class="panel-body" style="margin-top: -31px;">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Center:</label>
                        <div class="col-sm-9">
                             <select class="form-control" name="center_id" id="center_id">
                                <option selected disabled>--Select Center--</option>
                                @forelse ($centers as $center)
                                    <option value="{{ $center->id }}">{{ $center->name }}</option>
                                @empty
                                    <option value="">Data Not Found</option>
                                @endforelse

                                {{-- <option value="1050">1050</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Unit:</label>
                        <div class="col-sm-9">
                             <select class="form-control" name="unit_id" id="unit_id">
                                <option selected disabled>--Select Unit--</option>
                                {{-- <option value="1050">1050</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">P.B. No:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Purjee No:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Deliver:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Search</button>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Reset</button>
                        </div>
                    </div>
                </form>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div>
</div> <!-- container -->
@endsection
@push('js')

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    {{-- Datatable Buttons --}}
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>

    <script type="text/javascript">
            $(document).ready(function(){
                $('#center_id').on('change',function(){
                    var center_id= $(this).val();
                    console.log(center_id);
                    if (center_id) {
                        $.ajax({
                            url:"{{route('get_Unit', '')}}/"+center_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data){
                            // console.log(data);
                            // var html = <option>Select Unit</option>
                            $('#unit_id').empty();
                            $.each(data,function(key,value){
                                $('#unit_id').append('<option value="'+value.id+'">'+value.name+'</option>');
                            });
                        }
                        });
                        }else {
                            //  $('select[name="state"]').empty();
                            alert('Data Not Found');
                }
            });
        });
    </script>
@endpush
