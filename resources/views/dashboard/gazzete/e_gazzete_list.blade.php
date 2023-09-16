@extends('dashboard.index')


@push('style')
    {{-- Datatable Link --}}
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    {{-- Datatable Button Link --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
@endpush
@push('style')
    <style>

    </style>
@endpush
@section('title', 'Depertment - ')

@section('dashboard_content')

<style>
    #showWiseData{
        display: none;
    }
</style>
    <div class="container">
        <div class="row">
            {{-- <div class="col-sm-12">
            <h4 class="pull-left page-title">Datatable</h4>
            <ol class="breadcrumb pull-right">
                <li><a href="#">Moltran</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Datatable</li>
            </ol>
        </div> --}}
        </div>
        <div class="col-md-12 mx-auto">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <h3 class="text-center text-black" style="margin-top: -19px;">E-Gazzete Generate List</h3>
                        <input type="checkbox" id="chk_btn" onclick="showHideOpt()"><span class="text-black">Cart Size Wise</span>

                      <div id="showWiseData">
                        <div id="loanGrowerShow">
                            <table width="100%" class="table table-hover" cellpadding="5" cellspacing="5" id="table2" style="display: block;">
                                <tbody>
                                    <tr>
                                        <td>Loan Grower<input type="text" id="loan_grower_perc" name="loan_grower_perc"
                                                style="width: 50px" value="90">%</td>
                                        <td>Merging Grower<input type="text" id="mergine_grower_perc"
                                                name="mergine_grower_perc" style="width: 50px" value="5">%</td>
                                        <td>Non Loan Grower<input type="text" id="non_loan_grower_perc"
                                                name="non_loan_grower_perc" style="width: 50px" value="5">%</td>
                                        <td>Crop Day<input type="text" id="crop_day" name="crop_day" style="width: 50px"
                                                value="100"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                      </div>

                        <div class="row" style="margin-bottom: 20px;color:#1a1818">
                            <div class="col-md-6">
                                <h4 style="color:#1a1818" id="cartSizeView"><u>*Purjee will be generated according to grower cart size</u>
                                </h4>
                            </div>
                            <div class="col-md-6" @style(['text-align: right'])>
                                <h4 class="text-center">Crop Day:<input type="text" name="" class="ml-2" size="10"
                                        value="{{ $cropDay }}"></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 py-5">
                                <div class="form-group">
                                    <label class="ml-2 mx-2" size="10">Unit Name:</label>
                                    <label class="ml-2" size="10" style="padding-left: 35px; font-size: 12px;">Center
                                        Name:</label>
                                    <label class="ml-2" size="10" style="padding-left: 15px;">Unit Loan
                                        Total:</label>
                                    <label class="ml-2" size="10" style="padding-left: 4px;">Unit Cart Total:</label>
                                    <label class="ml-2" size="10" style="padding-left: 6px;">Price of Total:</label>
                                    <label class="ml-2" size="10" style="padding-left:9px;width: 109px;}">Quota
                                        Daily:</label>
                                    <label class="ml-2" size="10" style="padding-left: 11px;">Starting Day:</label>
                                    <label class="ml-2" size="10" style="padding-left: 13px;width:120px;">Number of
                                        Day:</label>
                                    <label class="ml-2" size="10" style="padding-left: 1px;">Generate List:</label>
                                </div>
                            </div>
                        </div>


                        <div class="">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($units as $unit)
                                <form role="form" action="{{ route('gazzete.generate') }}" method="GET">
                                    <div class="form-group">
                                        <input type="text" name="unit_id" class="ml-2" size="11"
                                            value="{{ $unit->id }}">
                                        <input type="text" name="center_name" class="ml-2" size="11"
                                            value="{{ $unit ? $unit->rel_to_center->name : '' }}">
                                        <input type="text" class="ml-2" name="remain_loan" size="11"
                                            value="{{ $unit->rel_to_farmer->sum('remain_loan') }}">
                                        <input type="text" class="ml-2" name="remain_cart" size="11"
                                            value="{{ $unit->rel_to_farmer->sum('remain_cart') }}">
                                        <input type="text" class="ml-2" name="total_price" size="11"
                                            value="{{ $unit ? $unit->rel_to_center->cart_price : '' }}">
                                        <input type="text" class="ml-2" name="daily_quota" size="11"
                                            value="{{ ceil($unit->rel_to_farmer->sum('remain_cart') / $cropDay) }}">
                                        <input type="text" class="ml-2" name="starting_dat" size="11"
                                            value="{{ $unit->rel_to_final_gazzert_list->max('day') }}">
                                        <input type="text" class="ml-2" name="end_day" size="11" required>
                                        <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                                        <input type="submit" class="ml-2" size="" value="{{ $i++ }}">
                                        <input type="hidden" name="crop_day" value="{{ $cropDay }}">
                                    </div>
                                </form>
                            @endforeach
                        </div>

                        <button>Click Here To Print</button>
                        <button>Export Into Excel</button>
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
      function showHideOpt() {
				if (document.getElementById("chk_btn").checked) {
					// $("#unitsetup").attr("action", "egazette.php");

                    $("#showWiseData").css("display", "none");
					$("#showWiseData").css("display", "block");
                    $('#cartSizeView').css("display","block");
                    $('#cartSizeView').css("display","none");

				} else {

					// $("#unitsetup").attr("action", "egazette_input_wise.php");
                    $("#showWiseData").css("display", "block");
					$("#showWiseData").css("display", "none");
                    $('#cartSizeView').css("display","none");
                    $('#cartSizeView').css("display","block");

				}
			}
    </script>
@endpush
