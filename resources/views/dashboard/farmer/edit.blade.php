<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel">Edit Farmer</h4>
    </div>
    <div class="modal-body">
        <form class="" action="{{ route('farmer.update', $farmer->id) }}" id="edit_farmer_form" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="first_name" class="control-label">First Name</label>
                        <input type="text" class="form-control" name="first_name" id="first_name" value="{{ $farmer->first_name }}" placeholder="First Name">
                        <span class="error error_e_first_name text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="last_name" class="control-label">Last Name</label>
                        <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $farmer->last_name }}" placeholder="Last Name">
                        <span class="error error_e_last_name text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="father_name" class="control-label">Father's Name</label>
                        <input type="text" class="form-control" name="father_name" id="father_name" value="{{ $farmer->father_name }}" placeholder="Fataher's Name">
                        <span class="error error_e_father_name text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bn_first_name" class="control-label">First Name (Bangla)</label>
                        <input type="text" class="form-control" name="bn_first_name" id="bn_first_name" value="{{ $farmer->bn_first_name }}" placeholder="First Name (Bangla)">
                        <span class="error error_e_bn_first_name text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bn_last_name" class="control-label">Last Name (Bangla)</label>
                        <input type="text" class="form-control" name="bn_last_name" id="bn_last_name" value="{{ $farmer->bn_last_name }}" placeholder="Last Name (Bangla)">
                        <span class="error error_e_bn_last_name text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="bn_father_name" class="control-label">Father's Name (Bangla)</label>
                        <input type="text" class="form-control" name="bn_father_name" id="bn_father_name" value="{{ $farmer->bn_father_name }}" placeholder="Father's Name (Bangla)">
                        <span class="error error_e_bn_father_name text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone" class="control-label">Phone Number</label>
                        <input type="tel"git init
                         class="form-control" name="phone" id="phone" pattern="[0-1]{2}[0-9]{9}" value="{{ $farmer->phone }}" placeholder="Phone Number">
                        <span class="error error_e_phone text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="phone_status" class="control-label">Phone Status</label>
                        <select class="form-control" name="phone_status">
                            <option selected disabled>Choose Phone Status</option>
                            <option value="1" {{ $farmer->phone_status == 1 ? 'SELECTED': '' }}>Active</option>
                            <option value="0" {{ $farmer->phone_status == 0 ? 'SELECTED': '' }}>De-Active</option>
                        </select>
                        <span class="error error_e_phone_status text-danger"></span>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Status</label>
                        <select class="form-control" name="status">
                            <option selected disabled>Choose Status</option>
                            <option value="1" {{ $farmer->status == 1 ? 'SELECTED': '' }}>Active</option>
                            <option value="0" {{ $farmer->status == 0 ? 'SELECTED': '' }}>De-Active</option>
                        </select>
                        <span class="error error_e_status text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pass_book_number" class="control-label">Passbook Number</label>
                        <input type="text" class="form-control" name="pass_book_number" id="pass_book_number" value="{{ $farmer->pass_book_number }}" placeholder="Passbook Number">
                        <span class="error error_e_pass_book_number text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nid" class="control-label">NID</label>
                        <input type="text" class="form-control" name="nid" id="nid" value="{{ $farmer->nid }}" placeholder="NID">
                        <span class="error error_e_nid text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="is_loan" class="control-label">Loan Status</label>
                        <select class="form-control" name="is_loan">
                            <option selected disabled>Choose Loan Status</option>
                            <option value="1" {{ $farmer->is_loan == 1 ? 'SELECTED': '' }} > YES </option>
                            <option value="0" {{ $farmer->is_loan == 0 ? 'SELECTED': '' }} > NO </option>
                        </select>
                        <span class="error error_e_is_loan text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="loan_amount" class="control-label">Loan Amount</label>
                        <input type="number" class="form-control" step="0.01" name="loan_amount" id="loan_amount" value="{{ $farmer->loan_amount }}" placeholder="Loan Amount">
                        <span class="error error_e_loan_amount text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="remain_loan" class="control-label">Remain Loan</label>
                        <input type="number" class="form-control" step="0.01" name="remain_loan" id="remain_loan" value="{{ $farmer->remain_loan }}" placeholder="Remain Loan">
                        <span class="error error_e_remain_loan text-danger"></span>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="invested_loan_amount" class="control-label">Invested Loan Amount</label>
                        <input type="number" class="form-control" step="0.01" name="invested_loan_amount" id="invested_loan_amount" value="{{ $farmer->invested_loan_amount }}" placeholder="Invested Loan Amount">
                        <span class="error error_e_invested_loan_amount text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="remain_cart" class="control-label">Remain Cart</label>
                        <input type="number" class="form-control" step="0.01" name="remain_cart" id="remain_cart" value="{{ $farmer->remain_cart }}" placeholder="Remain Cart">
                        <span class="error error_e_remain_cart text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="total_cane" class="control-label">Total Cane</label>
                        <input type="number" class="form-control" step="0.01" name="total_cane" id="total_cane" value="{{ $farmer->total_cane }}" placeholder="Total Cane">
                        <span class="error error_e_total_cane text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="supplied_cane" class="control-label">Supplied Cane</label>
                        <input type="number" class="form-control" step="0.01" name="supplied_cane" id="supplied_cane" value="{{ $farmer->supplied_cane }}" placeholder="Supplied Cane">
                        <span class="error error_e_supplied_cane text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="supplied_cane_cart" class="control-label">Supplied Cane Cart</label>
                        <input type="number" class="form-control" step="0.01" name="supplied_cane_cart" id="supplied_cane" value="{{ $farmer->supplied_cane_cart }}" placeholder="Supplied Cane Cart">
                        <span class="error error_e_supplied_cane_cart text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="center_id" class="control-label">Center</label>
                        <select class="form-control" name="center_id" id="edit_center_id">
                            <option selected disabled>Choose Center</option>
                            @foreach ($centers as $center)
                                <option value="{{ $center->id }}" {{ $farmer->center_id == $center->id ? 'SELECTED' : '' }}>{{ $center->name }}</option>
                            @endforeach
                        </select>
                        <span class="error error_e_center_id text-danger"></span>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="unit_id" class="control-label">Unit</label>
                        <select class="form-control" name="unit_id" id="edit_unit_id">
                        </select>
                        <span class="error error_e_unit_id text-danger"></span>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="village" class="control-label">Village</label>
                        <input type="text" class="form-control" name="village" id="village" value="{{ $farmer->village }}" placeholder="Village">
                        <span class="error error_e_village text-danger"></span>
                    </div>
                </div>



            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light update_button">Update Farmer</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function () {

        // Show Unit Datas By Default
        // let un_id = $('#edit_center_id').find(":selected").val();
        // url = "{{ route('dashboard.unit.get') }}",
        // $.ajax({
        //     url: url,
        //     type: 'post',
        //     data: 'un_id='+un_id,
        //     success: function(data) {
        //         $('#edit_unit_id').html(data);
        //     },
        //     error: function(err) {
        //         toastr.error(err.responseJSON)
        //     }
        // });

        // Show data on change edit center
        // $(document).on('change', '#edit_center_id', function(e) {
        //     e.preventDefault();
        //     let un_id = $(this).val();
        //     url = "{{ route('dashboard.unit.get') }}",
        //     $.ajax({
        //         url: url,
        //         type: 'post',
        //         data: 'un_id='+un_id,
        //         success: function(data) {
        //             $('#edit_unit_id').html(data);
        //             // console.log(data);
        //             // toastr.error(data)

        //             // $('.contact_table').DataTable().ajax.reload();
        //         },
        //         error: function(err) {
        //             toastr.error(err.responseJSON)
        //         }
        //     });
        // });


        // $(document).on('submit', '#edit_farmer_form', function(e) {
        //     e.preventDefault();

        //     $('.update_button').prop('type', 'button');

        //     var url = $(this).attr('action');

        //     $.ajax({
        //         url: url,
        //         type: 'post',
        //         data: new FormData(this),
        //         contentType: false,
        //         cache: false,
        //         processData: false,
        //         success: function(data) {
        //             toastr.success(data);
        //             $('#editModal').modal('hide');
        //             $('.update_button').prop('type', 'submit');
        //             $('.farmer__Table').DataTable().ajax.reload();
        //         },
        //         error: function(err) {

        //             $('.error').html('');
        //             $('.update_button').prop('type', 'submit');

        //             if (err.status == 0) {
        //                 toastr.error('Net Connetion Error. Reload This Page.');
        //                 return;
        //             } else if (err.status == 500) {
        //                 toastr.error('Server error. Please contact to the support team.');
        //                 return;
        //             }
        //             $.each(err.responseJSON.errors, function(key, error) {
        //                 $('.error_e_' + key + '').html(error[0]);
        //             });
        //         }
        //     });


        // });

    });
</script>
