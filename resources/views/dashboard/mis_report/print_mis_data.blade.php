<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<<<<<<< HEAD
<body>
<div class="container" style="width: 100%;">
    <div class="row">
        <div class="col-md-12">
            <a href="" onclick="window.print()" class="btn btn-success btn-sm mt-2">Print This Page</a>
=======
<body id="body">
<div class="container" >
    <div class="row" id="data">
        <div class="col-md-12">
            <button href="" onclick="printPage()" class=" mt-2">Print This Page</button>
>>>>>>> bd2015b07b96b443198895a41b430ef644de886a
            <table class="mt-2 table table-bordered data_tbl table-striped">
                <thead>
                <tr>
                    <th>SL NO.</th>
                    <th>Purjee No</th>
                    <th>Delivery Date</th>
                    <th>SMS Send Date</th>
                    <th>Center Name</th>
                    <th>Unit No.</th>
                    <th>Grower Name</th>
                    <th>Father Name</th>
                    <th>Village</th>
                    <th>National ID</th>
                    <th>Mobile No.</th>
                    <th>Total Loan</th>
                    <th>CLF No</th>
                    <th>Actual Weight Date</th>
                    <th>Purchase Sheet</th>
                    <th>Weight Voucher</th>
                    <th>Actual Weight</th>
                    <th>Price/Kg</th>
                    <th>Total Price</th>
                    <th>Loan Deduction</th>
                    <th>Loan Purpose</th>
                    <th>Sarak Khat</th>
                    <th>Shikkha Khat</th>
                    <th>Chashi Fed. Khat</th>
                    <th>Kollyan Khat</th>
                    <th>Other</th>
                    <th>Total Deduction</th>
                    <th>Net Total</th>
                    <th>Amount Of Sugar</th>
                    <th>Remaining Loan</th>
                    <th>Remark</th>
                </tr>
                </thead>
                <tbody>
<<<<<<< HEAD
{{--                @foreach ($misPrint as $item)--}}
{{--                    <tr>--}}
{{--                        <td>{{ $item->farmer->pass_book_number }}</td>--}}
{{--                        <td>{{ $item->purjeeno }}</td>--}}
{{--                        <td>{{ $item->deliverdate }}</td>--}}
{{--                        <td>{{ $item->sms_senddate }}</td>--}}
{{--                        <td>{{ $item->rel_to_center->name }}</td>--}}
{{--                        <td>{{ $item->rel_to_unit->name }}</td>--}}
{{--                        <td>{{ $item->farmer->first_name }}</td>--}}
{{--                        <td>{{ $item->farmer->father_name }}</td>--}}
{{--                        <td>{{ $item->farmer->village }}</td>--}}
{{--                        <td>{{ $item->farmer->nid }}</td>--}}
{{--                        <td>{{ $item->farmer->phone }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->total_loan }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->clf_no }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->actual_weight_date }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->purchase_sheet_no }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->weight_vauchar }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->actual_weight }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->price }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->total_price }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->loan_deduction }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->loan_purpose }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->sarak_khat }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->shikkha_khat }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->grower_khat }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->kollyan_khat }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->other_khat }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->total_deduction }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->net_total }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->amount_sugar }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->remaining_loan_amount }}</td>--}}
{{--                        <td>{{ $item->rel_to_mis->remarks }}</td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
=======
                @foreach ($printData as $item)
                    <tr>
                        <td>{{ $item->farmer->pass_book_number }}</td>
                        <td>{{ $item->purjeeno }}</td>
                        <td>{{ $item->deliverdate }}</td>
                        <td>{{ $item->sms_senddate }}</td>
                        <td>{{ $item->rel_to_center->name }}</td>
                        <td>{{ $item->rel_to_unit->name }}</td>
                        <td>{{ $item->farmer->first_name }}</td>
                        <td>{{ $item->farmer->father_name }}</td>
                        <td>{{ $item->farmer->village }}</td>
                        <td>{{ $item->farmer->nid }}</td>
                        <td>{{ $item->farmer->phone }}</td>
                        <td>{{ $item->rel_to_mis->total_loan }}</td>
                        <td>{{ $item->rel_to_mis->clf_no }}</td>
                        <td>{{ $item->rel_to_mis->actual_weight_date }}</td>
                        <td>{{ $item->rel_to_mis->purchase_sheet_no }}</td>
                        <td>{{ $item->rel_to_mis->weight_vauchar }}</td>
                        <td>{{ $item->rel_to_mis->actual_weight }}</td>
                        <td>{{ $item->rel_to_mis->price }}</td>
                        <td>{{ $item->rel_to_mis->total_price }}</td>
                        <td>{{ $item->rel_to_mis->loan_deduction }}</td>
                        <td>{{ $item->rel_to_mis->loan_purpose }}</td>
                        <td>{{ $item->rel_to_mis->sarak_khat }}</td>
                        <td>{{ $item->rel_to_mis->shikkha_khat }}</td>
                        <td>{{ $item->rel_to_mis->grower_khat }}</td>
                        <td>{{ $item->rel_to_mis->kollyan_khat }}</td>
                        <td>{{ $item->rel_to_mis->other_khat }}</td>
                        <td>{{ $item->rel_to_mis->total_deduction }}</td>
                        <td>{{ $item->rel_to_mis->net_total }}</td>
                        <td>{{ $item->rel_to_mis->amount_sugar }}</td>
                        <td>{{ $item->rel_to_mis->remaining_loan_amount }}</td>
                        <td>{{ $item->rel_to_mis->remarks }}</td>
                    </tr>
                @endforeach
>>>>>>> bd2015b07b96b443198895a41b430ef644de886a
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

{{--  progressbar  --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/progressbar.js/dist/progressbar.min.css">
<script src="https://cdn.jsdelivr.net/npm/progressbar.js/dist/progressbar.min.js"></script>
<<<<<<< HEAD
<script>
=======
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>

    function printPage(){
        var body = document.getElementById('body').innerHTML;
        var data = document.getElementById('data').innerHTML;
            document.getElementById('body').innerHTML = data;
            window.print();
    }
    // printPage();

>>>>>>> bd2015b07b96b443198895a41b430ef644de886a
    $(document).ready(function () {
        var farmer__Table = $('.data_tbl').DataTable({
            // processing: true,
            // serverSide: true,

        });
    })
</script>
</body>
</html>
