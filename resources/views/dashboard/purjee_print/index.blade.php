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
     {{-- <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h6 class="panel-title">All Asterisk(<span class="text-danger">*</span>) Mark Will Be Required</h6></div>
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
    </div> <!-- col--> --}}
    <div class="col-md-12">
        <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center text-dark"><h3 class="panel-title" style="padding-right: 98px;
            margin-top: -16px; padding-bottom: 6px;">Search Purjee For Print</h3></div>
            <div class="panel-body" style="margin-top: -31px;">
                <form action="{{ route('purjee.get.info') }}" class="form-horizontal" method="GET">
                    @csrf
                    @method('GET')
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

                                {{-- <option value="1050">1050</option> --}}
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
                            <input type="number" name="pass_book_number" class="form-control" id="pass_book_number" style="height: 29px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Purjee No:</label>
                        <div class="col-sm-9">
                            <input type="number" name="pass_book_number" class="form-control" id="pass_book_number" style="height: 29px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Deliver Date:</label>
                        <div class="col-sm-9">
                            <input type="date" name="pass_book_number" class="form-control" id="inputPassword4" style="height: 29px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Show</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputPassword4" style="height: 29px;">
                        </div>
                    </div>
                    <div class="form-group m-b-0">
                        <div class="col-sm-offset-3 col-sm-9">
                            {{-- <button id="flip" type="submit" class="btn btn-success waves-effect waves-light">Search</button> --}}
                              <a id="search" class="btn btn-success btn-dark mb-5 mt-3" name="search">Search</a>
                            <button type="#" class="btn btn-danger waves-effect waves-light">Reset</button>
                        </div>
                    </div>
                </form>
                {{-- <div id="flip" class="btn btn-info">click</div> --}}
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading text-center text-dark"><h3 class="panel-title" style="padding-right: 98px;
            margin-top: -16px; padding-bottom: 6px;">Purjee Summary Print</h3></div>
            <div class="panel-body" style="margin-top: -31px;">
                <form class="form-horizontal" action="{{ route('purjee.issueDate') }}" method="GET">
                    @csrf
                    @method('GET')
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Issue Date:</label>
                        <div class="col-sm-9">
                            <input type="date" name="issue_date" class="form-control" id="issue_date" style="height: 29px;">
                        </div>
                    </div>
                    <div class="form-group" style="padding-bottom: 26px;">
                        <div class="col-sm-offset-3 col-sm-9">
                            {{-- <button type="submit" class="btn btn-success waves-effect waves-light">Search</button> --}}
                            <a id="summary_search" class="btn btn-success btn-dark mb-5 mt-3" name="search">Search</a>
                            <button type="submit" class="btn btn-danger waves-effect waves-light">Reset</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Deliver Date:</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="inputPassword4" style="height: 29px;">
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
    </div>
    <div class="row d-none" id="purjee-print">
        <div class="col-md-12">
            <a href="{{ route('purjee.print') }}" class="btn btn-info" target="_blank" style="margin-left: 423px;">Print</a>
            <table class="table table-bordered farmer__Table table-striped" style="width: 100%;">
                <thead>
                    <tr>        
                        {{-- <th>Sl NO</th> --}}
                        <th>Purjee No</th>
                        <th>Purjee ID</th>
                        <th>P.B.No.</th>
                        <th>Grower Name</th>
                        <th>Mobile</th>
                        <th>Center</th>
                        <th>Unit</th>
                        <th>Weight</th>
                        <th>Deliver Date</th>
                    </tr>
                </thead>
                <tbody id="purjee-print-tr">

                </tbody>

            </table>

        </div>
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

        $(document).on('click', '#summary_search', function(){
            var issue_date = $('#issue_date').val();
            // alert(issue_date);
            $.ajax({
                url: "{{ route('purjee.issueDate')}}",
                type: "get",
                dataType: "json",
                data: {'issue_date':issue_date},
                success:function(data){
                    // alert(data);
                    console.log(data);
                }
            });
        });

        // search purjee for print
        $(document).on('click', '#search', function(){
            var center_id = $('#center_id').val();
            var unit_id = $('#unit_id').val();
            var pass_book_number = $('#pass_book_number').val();
            // alert(pass_book_number);
            $.ajax({
                url: "{{ route('purjee.get.info')}}",
                type: "get",
                dataType: "json",
                data: {'center_id':center_id, 'unit_id':unit_id, 'pass_book_number':pass_book_number},
                success: function(data){
                    console.log(data);
                     $('#purjee-print').removeClass('d-none');
                        var html = '';
                     $.each( data, function(key, v){
                        html +=
                        '<tr>'+
                        '<td>'+v.purjeeno+'</td>'+
                        '<td>'+v.id+'</td>'+
                        '<td>'+v.pass_book_number+'</td>'+
                        '<td>'+v.farmer.first_name+'</td>'+
                        '<td>'+v.farmer.phone+'</td>'+
                        '<td>'+v.rel_to_center.name+'</td>'+
                        '<td>'+v.rel_to_unit.name+'</td>'+
                        '<td>'+v.purjee_weight+'</td>'+
                        '<td>'+v.deliverdate+'</td>'+
                        '</tr>';
                    });
                    html = $('#purjee-print-tr').html(html);
                }
            });
        });



        $(document).ready(function(){
            var farmer__Table = $('.farmer__Table').DataTable({
            });
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
        $('#unit_id').on('change', function(){
            var unit_id = $(this).val();
            console.log(unit_id);
        });
    });
        </script>
@endpush
