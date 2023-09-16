@extends('dashboard.index')


@push('style')
    {{-- Datatable Link --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    {{-- Datatable Button Link --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
@endpush
@push('style')
    <style>
        .form-group .col-sm-9,
        select {
            width: 176px;
            margin-left: 196px;
        }

        .row-container {
            display: flex;
            overflow-y: auto;
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
        <div class="row"id="print-container">
            <div class="row-container" id="pcs">
                <form action="{{ route('saveFinalGazzet') }}" method="POST">
                    @csrf
                    <p style="display: none;"> <?php $i = $starting_day; ?></p>
                    @foreach ($gazetteListData->groupBy('day') as $gazetteLis)
                        <p style="display: none;">{{ $i++ }}</p>
                        <div class="col-md-2">
                            <div class="border-2">
                                <h3>Day - {{ $i }} </h3>
                                @foreach ($gazetteLis as $purjeeData)
                                    <div class="border-2">
                                        <P>PSL No: {{ $purjeeData ? $purjeeData->psl_no : '' }} <input class="form-control"
                                                type="text" value="{{ $purjeeData ? $purjeeData->psl_no : '' }}"></P>
                                        <input type="hidden" name="unit_id[]"
                                            value="{{ $purjeeData ? $purjeeData->unit_id : '' }}">
                                        <input type="hidden" name="grower_id[]"
                                            value="{{ $purjeeData ? $purjeeData->grower_id : '' }}">
                                        <input type="hidden" name="psl_no[]"
                                            value="{{ $purjeeData ? $purjeeData->psl_no : '' }}">
                                        <input type="hidden" name="purjee_id[]"
                                            value="{{ $purjeeData ? $purjeeData->id : '' }}">
                                        <input type="hidden" name="day[]" value="{{ $endDay }}">
                                        <input type="hidden" name="generate_date[]" value="{{ date('Y-m-d H:i:s') }}">
                                        <input type="hidden" name="current_loan[]"
                                            value="{{ $purjeeData ? $purjeeData->current_loan : '' }}">
                                        <input type="hidden" name="remain_cart[]"
                                            value="{{ $purjeeData ? $purjeeData->remain_cart : '' }}">
                                        <p>Current Loan :
                                            {{ $purjeeData->current_loan > 2799 ? $purjeeData->current_loan : '' }}</p>
                                        <p>Remaining Cart :
                                            {{ $purjeeData->remain_cart > 0 ? $purjeeData->remain_cart : '' }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

            </div>
            <button type="submit" class="btn btn-success">Save</button>
            </form>
        </div>

        <button id="print-button" class="btn btn-primary">Click Here To Print</button>
        <button id="exportButton" class="btn btn-success">Export Into Excel</button>

        <script>
            document.getElementById('exportButton').addEventListener('click', function () {
                // Redirect to the export route
                window.location.href = '{{ route('exportGazetteToExcel') }}';
            });
        </script>




        <script>
        document.getElementById('print-button').addEventListener('click', function() {
        var printContent = document.getElementById('pcs').innerHTML;
        var printWindow = window.open('', '', 'width=800,height=600'); // Open a new window

        printWindow.document.open();
        printWindow.document.write('<html><head><title>Print</title></head><body>');
        printWindow.document.write(printContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();

        printWindow.print();
        printWindow.close();
    });
        </script>

    </div> <!-- container -->

@endsection
@push('js')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    {{-- Datatable Buttons --}}
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@endpush
