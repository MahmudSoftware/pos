@extends('dashboard.index')


@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@push('style')
    <style>
    .top_down{
        padding-top: 74px;
    }
</style>
@endpush
@section('title', 'Purjee - ')

@section('dashboard_content')
<div class="container">
    <div class="row">
        {{-- <div class="col-sm-12">
            <h4 class="pull-left page-title">Dashboard</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Moltran</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Datatable</li>
            </ol>
        </div> --}}
    </div>
<div class="row">
    <!-- Basic example -->
    <div class="col-md-12">
        <div class="panel panel-default">
            {{-- <div class="panel-heading"><h6 class="panel-title">All Asterisk(<span class="text-danger">*</span>) Mark Will Be Required</h6></div> --}}
            <div class="panel-body">
                <div class="row">
                    <h4 class="text-center text-black" style="margin-top: -19px;">Purjee Status</h4>

                </div>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
</div>

<div class="row">
    <!-- Basic example -->
    <div class="col-md-12">

        <div class="panel panel-default" style="height: 450px; margin-top: -23px;">
            <h4 class="text-center">Add New Purjee</h4>
            <div class="panel-heading"><h6 class="panel-title">All Asterisk(<span class="text-danger">*</span>) Mark Will Be Required</h6></div>
            <div class="panel-body">
                <div class="row">
                <form action="{{route('next_page')}}" method="GET" enctype="multipart/form-data">

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Issue Date<span class="text-danger">*</span></label>
                            <input type="date" name="issuedate" class="form-control" id="exampleInputEmail1">
                            @error('issuedate')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Purjee No. Form<span class="text-danger">*</span></label>
                            <input type="integer" name="purjeeno" id="start_num"  value="{{$start_num}}" class="form-control" id="exampleInputEmail1">
                            @error('purjeeno')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group top_down">
                            <label for="exampleInputEmail1">To:<span class="text-danger">*</span></label>
                            <input type="integer" class="form-control" id="end_num" name="end_num" id="end_num" value="" id="exampleInputEmail1">
                        </div>
                    </div>
                    <div class="col-md-4 mt-0">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Delivery Date<span class="text-danger">*</span></label>
                            <input type="date" name="deliverdate"  class="form-control" id="exampleInputEmail1">
                             @error('deliverdate')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Weight<span class="text-danger">*</span></label>
                            <select class="form-control" name="purjee_weight">
                                {{-- <option selected disabled>--Select Weight--</option> --}}
                                <option value="1050">1050</option>
                                <option value="1120">1120</option>
                                <option value="1200">1200</option>
                                <option value="1300">1300</option>
                                <option value="1400">1400</option>
                                <option value="1500">1500</option>
                                <option value="1700">1700</option>
                                <option value="1800">1800</option>
                                <option value="2000">2000</option>
                                <option value="2400">2400</option>
                                <option value="4500">4500</option>
                                <option value="4800">4800</option>
                                <option value="5000">5000</option>
                                <option value="6000">6000</option>
                                <option value="8000">8000</option>
                                <option value="9000">9000</option>
                            </select>
                        </div>
                    </div>
                    {{-- <a href="{{route('next_page')}}" class="btn btn-success waves-effect waves-light" onclick="nextStep()">Next</a> --}}

                    {{-- <button type="submit" class="btn btn-success waves-effect waves-light mx-5">Next</button> --}}
                    <button type="submit" class="btn btn-success">Next</button>
                    <button type="submit" class="btn btn-danger" onclick="document.F001.reset()">Reset</button>
                    <a href="{{route('dashboard.purjee.index')}}" class="btn btn-danger waves-effect waves-light">Cancel</a>
                </form>
                </div>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
</div>



</div> <!-- container -->
@endsection
@push('js')

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready( function() {
            let

            // $("submit").on("click", function(){
            //     var sum = start_num + end_num;
            //     alert(sum);
            // })
        });
    </script>
@endpush



