  <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myLargeModalLabel">Edit Mill Year Setup</h4>
                </div>
                <div class="modal-body">
                      <form class="" action="{{ route('millYearSetup.update', $millYearSetup->id) }}" id="" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="control-label">Economical Year</label>
                                     <select class="form-control" name="season_id" id="season_id">
                                        <option selected disabled>--Select--</option>
                                        @foreach ($yearSetups as $yearSetup)
                                            <option value="{{ $yearSetup->id }}">{{ $yearSetup->name }}</option>
                                        @endforeach
                                    </select>
                                     @error('season_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name" class="control-label">Office Name</label>
                                     <select class="form-control" name="office_id" id="office_id">
                                        <option selected disabled>--Select--</option>
                                        @foreach ($offices as $office)
                                            <option value="{{ $office->id }}"{{ ($millYearSetup->id == $office->id)? 'selected':'' }}>{{ $office->name }}</option>
                                        @endforeach
                                    </select>
                                     @error('season_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="start_date" class="control-label">Install Capacity(TCD)</label>
                                    <input type="number" value="{{ $millYearSetup->install_capacity }}" class="form-control" name="install_capacity" id="install_capacity" value="{{ old('install_capacity') }}">
                                    @error('install_capacity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Cane Crusing Target(M.T.)</label>
                                    <input type="number" value="{{ $millYearSetup->cane_crushing }}" class="form-control" name="cane_crushing" id="cane_crushing" value="{{ old('cane_crushing') }}">
                                     @error('cane_crushing')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Sugar Production Target(M.T.)</label>
                                    <input type="number" value="{{ $millYearSetup->sugar_production }}" class="form-control" name="sugar_production" id="sugar_production" value="{{ old('sugar_production') }}">
                                    @error('sugar_production')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Recovery Target(M.T.)</label>
                                    <input type="number" value="{{ $millYearSetup->recovery_target }}" step="0.01" class="form-control" name="recovery_target" id="recovery_target" value="{{ old('recovery_target') }}">
                                     @error('recovery_target')
                                        <span class="text-danger">{{ $message }}</span>
                                     @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="end_date" class="control-label">Crop Day</label>
                                    <input type="number" value="{{ $millYearSetup->crop_day }}" class="form-control" name="crop_day" id="crop_day" value="{{ old('crop_day') }}">
                                    @error('crop_day')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="" class="control-label">Mill Start Date</label>
                                    <input type="date" value="{{ $millYearSetup->date_of_start_mill }}" class="form-control" name="date_of_start_mill" id="date_of_start_mill" value="{{ old('date_of_start_mill') }}">
                                    @error('date_of_start_mill')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" onclick="this.form.reset()" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Update Mill Setup Year</button>
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
