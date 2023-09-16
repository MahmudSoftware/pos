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
        width: 176px;
        margin-left: 196px;
    }
</style>
@endpush
@section('title', 'Depertment - ')

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
     <div class="col-md-12 mx-auto">
        <div class="panel panel-default">
            {{-- <div class="panel-heading"><h6 class="panel-title">All Asterisk(<span class="text-danger">*</span>) Mark Will Be Required</h6></div> --}}
            <div class="panel-body">
                <div class="row">
                    <h2 class="text-center text-black" style="margin-top: -19px;">Gazzete Print</h2>
                    <form role="form">
                    <div class="col-md-3">
                       <select name="phone_status">
                            <option selected disabled>--Select Center--</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" style="margin-left: 127px;}">
                             <input type="text" class="" placeholder="Enter Starting Day">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group text-danger" style="margin-left: 51px;">
                             <input type="text" class="" placeholder="Enter End Day">
                        </div>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="text-center" style="margin-left: 442px;">
                                <button type="submit" class="btn btn-success btn-sm">Click To Produce List</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
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

        });
    </script>
@endpush
