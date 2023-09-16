<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel">Edit Unit</h4>
    </div>
    <div class="modal-body">
        <form class="" action="{{ route('dashboard.unit.update', $unit->id) }}" id="edit_unit_form" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Unit Name</label>
                        <input type="text" class="form-control" name="name" id="field-2" value="{{ $unit->name }}" placeholder="Center Name">
                        <span class="error error_name text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="center_id" class="control-label">Select Center</label>
                        <select class="form-control" name="center_id">
                            <option selected disabled>Choose Center</option>
                            @foreach ($centers as $center)
                                <option value="{{ $center->id }}" {{ $center->id == $unit->center_id ? 'SELECTED': '' }}>{{ $center->name }}</option>
                            @endforeach
                        </select>
                        <span class="error error_center_id text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Status</label>
                        <select class="form-control" name="status">
                            <option selected disabled>Choose Status</option>
                            <option value="1" {{ $unit->status == 1 ? 'SELECTED': '' }}>Active</option>
                            <option value="0" {{ $unit->status == 0 ? 'SELECTED': '' }}>De-Active</option>
                        </select>
                        <span class="error error_e_status text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cic_name" class="control-label">CIC Name</label>
                        <input type="text" class="form-control" name="cic_name" id="cic_name" value="{{ $unit->cic_name }}" placeholder="CIC Name">
                        <span class="error error_e_cic_name text-danger"></span>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">CIC Phone</label>
                        <input type="tel" required class="form-control" name="cic_number" id="cic_phone" value="{{ $unit->cic_number }}" pattern="[0-1]{2}[0-9]{9}" placeholder="CIC Phone">
                        <span class="error error_e_cic_number text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cda_name" class="control-label">CDA Name</label>
                        <input type="text" class="form-control" name="cda_name" id="cda_name" value="{{ $unit->cda_name }}" placeholder="CDA Name">
                        <span class="error error_e_cda_name text-danger"></span>
                    </div>
                </div>


                <div class="col-md-4">
                    <div class="form-group">
                        <label for="cda_number" class="control-label">CDA Phone</label>
                        <input type="tel" required class="form-control" name="cda_number" id="cda_number" value="{{ $unit->cda_number }}" pattern="[0-1]{2}[0-9]{9}" placeholder="CDA Phone">
                        <span class="error error_e_cda_number text-danger"></span>
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light update_button">Update Unit</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).on('submit', '#edit_unit_form', function(e) {
        e.preventDefault();

        $('.update_button').prop('type', 'button');

        var url = $(this).attr('action');

        $.ajax({
            url: url,
            type: 'post',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                toastr.success(data);
                $('#editModal').modal('hide');
                $('.update_button').prop('type', 'submit');
                $('.unit__Table').DataTable().ajax.reload();
            },
            error: function(err) {

                $('.error').html('');
                $('.update_button').prop('type', 'submit');
                if (err.status == 0) {
                    toastr.error('Net Connetion Error. Reload This Page.');
                    return;
                } else if (err.status == 500) {
                    toastr.error('Server error. Please contact to the support team.');
                    return;
                }
                $.each(err.responseJSON.errors, function(key, error) {
                    $('.error_e_' + key + '').html(error[0]);
                });
            }
        });
    });
</script>
