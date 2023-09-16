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
        height: 27px;
    }
    .col-md-12{
        width: 1089px;
        margin-left: -10px;
    }
    .uniq{
        margin-top: -40px;
        margin-left: -65px;
    }
</style>
@endpush
@section('title', 'Depertment - ')

@section('dashboard_content')
<div class="container" style="margin-top: -14px;">
     <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-body">
                <h4 class="text-center text-black" style="margin-top: -19px;">MIS Report</h4>
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
    <div class="row">
        <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-body" style="margin-top: -53px;">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Center:</label>
                        <div class="col-sm-9">
                             <select class="form-control" id="center_id" name="center_id" style="height: 29px;">
                                <option selected disabled>--Select--</option>
                                @forelse ($centers as $center)
                                    <option value="{{ $center->id }}">{{ $center->name }}</option>
                                @empty
                                    <option value="">Data No Found</option>
                                @endforelse
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
                        <label for="inputPassword4" class="col-sm-3 control-label">W/R No:</label>
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
                </form>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div>
        <div class="col-md-6" style="margin-right: -20px;
        width: 545px;">
        <div class="panel panel-default" style="margin-left: -20px;">
            <div class="panel-body" style="margin-top: -53px;">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Unit:</label>
                        <div class="col-sm-9">
                             <select class="form-control" id="unit_id" name="unit_id" style="height: 29px;">
                                <option selected disabled>--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Pur. S. No:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputPassword4" style="height: 29px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label">Show:</label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control" id="inputPassword4" style="height: 29px;">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword4" class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-md-6"><button type="submit" class="btn btn-info ">Report Excel</button></div>
                                <div class="col-md-6"><a href="{{ route('print.data') }}" target="_blank" type="submit" class="btn btn-info">print</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 uniq"><a id="search" href="#" type="submit" class="btn btn-success">Show</a></div>
                </form>
            </div> <!-- panel-body -->
        </div> <!-- panel -->
    </div>
    </div>
    <div class="panel-body">
        <div class="row">
           <div class="row d-none" id="mis_data">
               <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                   <table class="table table-striped table-bordered data_tbl designation__table">
                       <thead>
                       <tr>
                           <th>SL</th>
                           <th>ACTION</th>
                           <th>P.B.No</th>
                           <th>Purjee No</th>
                           <th>Delivery Date</th>
                           <th>Sms Send Date</th>
                           <th>Center Name</th>
                           <th>Unit No</th>
                           <th>Grower Name</th>
                           <th>Father Name</th>
                           <th>Village</th>
                           <th>National ID</th>
                           <th>Mobile No</th>
                           <th>Total Loan</th>
                           <th>CLF No</th>
                           <th>Actual Weight Date</th>
                           <th>Purchase Sheet</th>
                           <th>Weight Voucher</th>
                           <th>Actual Weight</th>
                           <th>Price/Kg</th>
                           <th>Cane Total Production</th>
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
                       <tbody id="mis_tbody_tr">
                            @foreach($misData as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <a href="" data-id="{{ $item->id }}" data-toggle="modal" data-target="#misModal" class="btn btn-success btn-sm">Update</a>
                                    </td>
                                    <td>{{ $item->farmer_to_mis->pass_book_number }}</td>
                                    <td>{{ $item->purjeeno }}</td>
                                    <td>{{ $item->deliverdate }}</td>
                                    <td>{{ $item->deliverdate }}</td>
                                    <td>{{ $item->farmer_to_mis->center_id }}</td>
                                    <td>{{ $item->farmer_to_mis->unit_id }}</td>
                                    <td>{{ $item->farmer_to_mis->first_name }}</td>
                                    <td>{{ $item->farmer_to_mis->father_name }}</td>
                                    <td>{{ $item->farmer_to_mis->village }}</td>
                                    <td>{{ $item->farmer_to_mis->nid }}</td>
                                    <td>{{ $item->farmer_to_mis->phone }}</td>
                                    <td>{{ $item->total_loan }}</td>
                                    <td>{{ $item->clf_no }}</td>
                                    <td>{{ $item->actual_weight_date }}</td>
                                    <td>{{ $item->purchase_sheet_no }}</td>
                                    <td>{{ $item->weight_vauchar }}</td>
                                    <td>{{ $item->actual_weight }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->total_price }}</td>
                                    <td>{{ $item->loan_deduction }}</td>
                                    <td>{{ $item->loan_purpose }}</td>
                                    <td>{{ $item->sarak_khat }}</td>
                                    <td>{{ $item->shikkha_khat }}</td>
                                    <td>{{ $item->grower_khat }}</td>
                                    <td>{{ $item->kollyan_khat }}</td>
                                    <td>{{ $item->other_khat }}</td>
                                    <td>{{ $item->total_deduction }}</td>
                                    <td>{{ $item->net_total }}</td>
{{--                                    <td>{{ $item->net_cane_weight }}</td>--}}
                                    <td>{{ $item->amount_sugar }}</td>
                                    <td>{{ $item->remaining_loan_amount }}</td>
                                    <td>{{ $item->remarks }}</td>
                                </tr>
                            @endforeach
                       </tbody>
                   </table>

               </div>
           </div>
        </div>
    </div>
</div> <!-- container -->
<div id="misModal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="myLargeModalLabel">MIS Report Entry</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form class="" action="{{ route('mis.info.update') }}" id="add_farmer_form" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="first_name" class="control-label">Grower Name</label>
                                    <input type="text" class="form-control" name="grower_name" id="grower_name" placeholder="Grower Name">
                                    <span class="error error_first_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="last_name" class="control-label">Purjee No</label>
                                    <input type="text" class="form-control" name="purjee_id" id="purjee_id" placeholder="Purjee No">
                                    <span class="error error_last_name text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="father_name" class="control-label">Total Loan</label>
                                    <input type="text" class="form-control" name="total_loan" id="total_loan" placeholder="Total Loan">
                                    @error('total_loan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bn_first_name" class="control-label">Actual Weight Date</label>
                                    <input type="date" class="form-control" name="actual_weight_date" id="actual_weight_date" placeholder="Actual Weight Date">
                                    @error('actual_weight_date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bn_last_name" class="control-label">Perchase Sheet No</label>
                                    <input type="text" class="form-control" name="purchase_sheet_no" id="purchase_sheet_no" placeholder="Perchase Sheet No">
                                    @error('purchase_sheet_no')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="bn_father_name" class="control-label">Weight Voucher</label>
                                    <input type="text" class="form-control" name="weight_vauchar" id="weight_vauchar" placeholder="Weight Voucher">
                                    @error('weight_vauchar')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="mis_id" id="mis_id">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone" class="control-label">Actual Weight</label>
                                    <input type="number" class="form-control" name="actual_weight" id="actual_weight"  placeholder="Actual Weight">
                                    @error('actual_weight')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone_status" class="control-label">Price/Kg</label>
                                    <input type="number" class="form-control" step="0.01" name="price" id="price" placeholder="Price/Kg">
                                    @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="field-2" class="control-label">Cane Total Price</label>
                                    <input type="number" class="form-control" step="0.01" name="total_price" id="total_price" placeholder="Cane Total Price">
                                    @error('total_price')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="pass_book_number" class="control-label">Loan Deduction(75%)</label>
                                    <input type="text" class="form-control" name="loan_deduction" id="loan_deduction" placeholder="Loan Deduction(75%)">
                                    @error('loan_deduction')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nid" class="control-label">Loan Purpose</label>
                                    <input type="text" class="form-control" name="loan_purpose" id="loan_purpose" placeholder="Loan Purpose">
                                    @error('loan_purpose')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="is_loan" class="control-label">Sarak Khat</label>
                                    <input type="text" class="form-control" name="sarak_khat" id="sarak_khat" placeholder="Sarak Khat">
                                    @error('sarak_khat')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="loan_amount" class="control-label">Shikkha Khat</label>
                                    <input type="number" class="form-control" step="0.01" name="shikkha_khat" id="shikkha_khat" placeholder="Shikkha Khat">
                                    @error('shikkha_khat')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="remain_loan" class="control-label">Chashi Fed. Khat</label>
                                    <input type="number" class="form-control" step="0.01" name="grower_khat" id="grower_khat" placeholder="Chashi Fed Khat">
                                    @error('grower_khat')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="invested_loan_amount" class="control-label">Kollyan Khat</label>
                                    <input type="number" class="form-control" step="0.01" name="kollyan_khat" id="kollyan_khat" placeholder="Kollyan Khat">
                                    @error('kollyan_khat')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="remain_cart" class="control-label">Others</label>
                                    <input type="number" class="form-control" step="0.01" name="other_khat" id="other_khat" placeholder="Others">
{{--                                    @error('other_khat')--}}
{{--                                    <span class="text-danger">{{ $message }}</span>--}}
{{--                                    @enderror--}}
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="total_cane" class="control-label">Total Deduction</label>
                                    <input type="number" class="form-control" step="0.01" name="total_deduction" id="total_deduction" placeholder="Total Deduction">
                                    <span class="error error_total_cane text-danger"></span>
                                </div>
                            </div>
{{--                            <div class="col-md-4">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="supplied_cane" class="control-label">Supplied Cane</label>--}}
{{--                                    <input type="number" class="form-control" step="0.01" name="supplied_cane" id="supplied_cane" placeholder="Supplied Cane">--}}
{{--                                    <span class="error error_supplied_cane text-danger"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="supplied_cane_cart" class="control-label">Net Total</label>
                                    <input type="number" class="form-control" step="0.01" name="net_total" id="net_total" placeholder="Net Total">
                                    <span class="error error_supplied_cane_cart text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="center_id" class="control-label">Amount Of Sugar</label>
                                    <input type="number" class="form-control" step="0.01" name="amount_sugar" id="amount_sugar" placeholder="Amount Of Sugar">
                                    <span class="error error_center_id text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unit_id" class="control-label">Remaining Loan Amount</label>
                                    <input type="number" class="form-control" step="0.01" name="remaining_loan_amount" id="remaining_loan_amount" placeholder="Remaining Loan Amount">
                                    <span class="error error_unit_id text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="village" class="control-label">Remarks</label>
                                    <input type="text" class="form-control" name="remarks" id="remarks" placeholder="Remarks">
                                    <span class="error error_village text-danger"></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@push('js')

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

    {{-- Datatable Buttons --}}
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="/vendor/datatables/buttons.server-side.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            $('[data-target="#misModal"]').click(function(){
                let id = $(this).attr('data-id');
                    // alert(id);
                if(id){
                    $.ajax({
                        url:"{{route('get.mis.data', '')}}/"+id,
                        type: "GET",
                        dataType: "json",
                        success: function(data){
                            console.log(data);
                            $('#grower_name').val(data.farmer_to_mis.first_name);
                            $('#purjee_id').val(data.id);
                            $('#total_loan').val(data.total_loan);
                            $('#actual_weight_date').val(data.actual_weight_date);
                            $('#purchase_sheet_no').val(data.purchase_sheet_no);
                            $('#weight_vauchar').val(data.weight_vauchar);
                            $('#actual_weight').val(data.actual_weight);
                            $('#price').val(data.price);
                            $('#total_price').val(data.total_price);
                            $('#loan_deduction').val(data.loan_deduction);
                            $('#loan_purpose').val(data.loan_purpose);
                            $('#sarak_khat').val(data.sarak_khat);
                            $('#shikkha_khat').val(data.shikkha_khat);
                            $('#grower_khat').val(data.grower_khat);
                            $('#kollyan_khat').val(data.kollyan_khat);
                            $('#other_khat').val(data.other_khat);
                            $('#total_deduction').val(data.total_deduction);
                            $('#net_total').val(data.net_total);
                            $('#amount_sugar').val(data.amount_sugar);
                            $('#remaining_loan_amount').val(data.remaining_loan_amount);
                            $('#remarks').val(data.remarks);
                        }
                    })
                }else{
                    alert('Data Not Fount')
                }
            });




            $('#actual_weight').on('keyup', function(){
                let actual_weight = $(this).val();
                let totalPrice = actual_weight*2.5;
                let loanDetection = actual_weight*2.5*(0.75);
                let sarakh = (0.12*(actual_weight/37.324)).toFixed(2);
                let shikkha = (0.15*(actual_weight/37.324)).toFixed(2);
                let grower = (0.05*(actual_weight/37.324)).toFixed(2);
                let kollyan = (0.08*(actual_weight/37.324)).toFixed(2);
                let totalDetection = (12*(actual_weight/1119.72)).toFixed(2);
                let sugar = (12*(actual_weight/1119.72)).toFixed(2);
                let totalNet = (totalPrice*1 -totalDetection*1).toFixed(2);
                // $('#price').val(multiple);
                $('#total_price').val(totalPrice);
                $('#loan_deduction').val(loanDetection);
                $('#sarak_khat').val(sarakh);
                $('#shikkha_khat').val(shikkha);
                $('#grower_khat').val(grower);
                $('#kollyan_khat').val(kollyan);
                $('#total_deduction').val(totalDetection);
                $('#net_total').val(totalNet);
                $('#amount_sugar').val(sugar);
                // alert(multiple);
            });
        });







        $(document).on('click', '#search', function(){
            var center_id = $('#center_id').val();
            var unit_id = $('#unit_id').val();
            // var pass_book_number = $('#pass_book_number').val();
            // alert(unit_id);
            $.ajax({
                url: "{{ route('mis.get.data')}}",
                type: "get",
                dataType: "json",
                data: {'center_id':center_id, 'unit_id':unit_id},
                success: function(data){
                    console.log(data);
                    $('#mis_data').removeClass('d-none');
                    var html = '';
                    $.each( data, function(key, v){
                        html +=
                            '<tr>'+
                            '<td>'+v.id+'</td>'+
                            '<td><a href="" data-toggle="modal" data-target="#misModal" class="btn btn-info btn-sm">Update</a></td>'+
                            '<td>'+v.pass_book_number+'</td>'+
                            '<td>'+v.purjeeno+'</td>'+
                            '<td>'+v.deliverdate+'</td>'+
                            '<td></td>'+
                            '<td>'+v.rel_to_center.name+'</td>'+
                            '<td>'+v.rel_to_unit.name+'</td>'+
                            '<td>'+v.farmer.first_name+'</td>'+
                            '<td>'+v.farmer.father_name+'</td>'+
                            '<td>'+v.farmer.village+'</td>'+
                            '<td>'+v.farmer.nid+'</td>'+
                            '<td>'+v.farmer.phone+'</td>'+


                            // '<td>'+v.purjee_weight+'</td>'+

                            '</tr>';
                    });
                    html = $('#mis_tbody_tr').html(html);
                }
            });
        });

        $(document).on('click', '.search', function () {
            var grower_id = $('#')
        })


            $(document).ready(function(){
                $('#center_id').on('change',function(){
                    var center_id= $(this).val();
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
        // console.log($('#farmer_id').append('<td><div value="+value.id+">+value.first_name+</div></td>'))
        // $('#farmer_name').append('<td>'+value.first_name+'</td>')
        // $('#farmer_center').append('<td>'+value.center_id+', '+value.unit_id+'</td>')
    </script>
@endpush
