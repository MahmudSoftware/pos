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
        width: 240px;
        height: 22px;
    }
    .form-group{
        margin-top: -10px;
    }
</style>
@endpush
@section('title', 'Depertment - ')

@section('dashboard_content')
<div class="container">
    <div class="col-md-6"></div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading text-center text-dark"><h3 class="text-center panel-title" style="padding-right: 98px;
    margin-top: -6px;">Report Criteria</h3></div>
            <div class="panel-body" style="margin-top: -31px;">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Center:</label>
                        <div class="col-sm-9">
                             <select class="form-control" name="center_id" id="center_id" style="height: 29px;">
                                  <option selected disabled>--Select Center--</option>
                                @forelse ($centers as $center)
                                     <option value="{{ $center->id }}">{{ $center->name }}</option>
                                @empty
                                     <option value="1050">Data Not Found</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">Unit:</label>
                        <div class="col-sm-9">
                             <select class="form-control" name="unit_id" id="unit_id" style="height: 29px;">
                                <option selected disabled>--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">P.B. No:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputPassword4" style="height: 29px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Purjee No:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputPassword4" style="height: 29px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Issue Date:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="inputPassword4" style="height: 29px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Deliver Date:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="inputPassword4" style="height: 29px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Status:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="unit_id" id="unit_id" style="height: 29px;">
                                <option selected disabled>--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Report Type:</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="unit_id" id="unit_id" style="height: 29px;">
                                <option selected disabled>--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Show</button>
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
                    // console.log(center_id);
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
