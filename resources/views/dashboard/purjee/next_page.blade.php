@extends('dashboard.index')


@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush
@section('title', 'Purjee - ')

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
        <div class="col-md-4">

        </div>
        <div class="col-md-4">

        </div>
        <div class="col-md-4" @style(['text-align: right'])>
            <a href="{{ route('add_purjee') }}" class="btn btn-primary waves-effect waves-light" data-toggle=""
                data-target=".bs-example-modal-lg">Add New Purjee</a>
        </div>
    </div> <!-- container -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <form action="{{ route('purjee.data.store') }}" method="POST">
                        @csrf

                        <div class="col-md-4">
                            Start Number: <input class="form-control" type="text" name="start_num"
                                value="{{ $start_num }}" readonly>
                            End Number: <input type="text" class="form-control" name="end_num"
                                value="{{ $end_num }}" readonly>
                        </div>
                        <div class="col-md-4">
                            Start Date: <input class="form-control" type="text" name="issuedate"
                                value="{{ $issuedate }}" readonly>
                            End Date: <input type="text" class="form-control" name="deliverdate"
                                value="{{ $deliverdate }}" readonly>
                        </div>
                        <div class="col-md-4">
                            Weight: <input class="form-control" type="text" name="purjee_weight"
                                value="{{ $purjee_weight }}" readonly>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Purjee No</th>
                                    <th>P.B. No</th>
                                    <th>Growers Name</th>
                                    <th>Center</th>
                                    <th>Unit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $tabIndex = 0;
                                @endphp
                                @for ($i = $start_num+1; $i <= $end_num; $i++)
                                    <tr>
                                        <td><input type="integer" name="purjee_no[]" class="form-control"
                                                value="{{ $i }}"></td>
                                        <td>
                                            <input type="integer" name="pass_book_no[]"
                                                class="form-control pass_book_no{{ $i }}" id="farmer_id"
                                                value="">
                                        </td>

                                        <td id="farmer_name{{ $i }}"><input type="hidden" name="farmer_id[]">
                                        </td>
                                        <td id="farmer_center{{ $i }}"><input type="hidden" name="center_id[]">
                                        </td>
                                        <td id="farmer_unit{{ $i }}"><input type="hidden" name="unit_id[]">
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <input type="submit" class="btn btn-success text-center" value="Save">
                    </form>

                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            @for ($i = $start_num; $i <= $end_num; $i++)
                                $('.pass_book_no{{ $i }}').on('keyup', function() {
                                    var farmer_id = $(this).val();
                                    if (farmer_id) {
                                        $.ajax({
                                            url: "{{ route('user.delete', '') }}/" + farmer_id,
                                            type: "GET",
                                            dataType: "json",
                                            success: function(data) {
                                                console.log(data);
                                                $('#farmer_name{{ $i }}').empty();
                                                $('#farmer_center{{ $i }}').empty();
                                                $('#farmer_unit{{ $i }}').empty();
                                                $('#farmer_name{{ $i }}').append(
                                                    '<input type="hidden" name="farmer_id[]" value="' + data
                                                    .id + '">');
                                                $('#farmer_center{{ $i }}').append(
                                                    '<input type="hidden" name="center_id[]" value="' + data
                                                    .rel_to_center.id + '">');
                                                $('#farmer_name{{ $i }}').append('<td>' + data
                                                    .first_name + '</td>');
                                                $('#farmer_center{{ $i }}').append('<td>' + data
                                                    .rel_to_center.name + '</td>');
                                                $('#farmer_unit{{ $i }}').append('<td>' + data
                                                    .rel_to_unit.name + '</td>');

                                                $('#farmer_unit{{ $i }}').append(
                                                    '<input type="hidden" name="unit_id[]" value="' + data
                                                    .rel_to_unit.id + '">');
                                            }
                                        })
                                    } else {
                                        $('#farmer_name{{ $i }}').empty();
                                        $('#farmer_center{{ $i }}').empty();
                                        $('#farmer_unit{{ $i }}').empty();
                                    }
                                });
                            @endfor
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script> --}}
    {{-- <script>
@for ($i = $start_num; $i <= $end_num; $i++)


  @endfor
    </script> --}}
@endpush
