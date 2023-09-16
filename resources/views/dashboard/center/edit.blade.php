 <div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel">Edit Center</h4>
    </div>
    <div class="modal-body">
        <form class="" action="{{ route('dashboard.center.update', $center->id) }}" id="edit_center_form" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Center Name</label>
                        <input type="text" class="form-control" name="name" id="field-2" value="{{ $center->name }}" placeholder="Center Name">
                        <span class="error error_e_name text-danger"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Status</label>
                        <select class="form-control" name="status">
                            <option selected disabled>Choose Status</option>
                            <option value="1" {{ $center->status == 1 ? 'SELECTED': '' }}>Active</option>
                            <option value="0" {{ $center->status == 0 ? 'SELECTED': '' }}>De-Active</option>
                        </select>
                        <span class="error error_e_status text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Center Address</label>
                        <input type="text" class="form-control" name="address" id="field-2" value="{{ $center->address }}" placeholder="Center Address">
                        <span class="error error_e_address text-danger"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="field-2" class="control-label">Cart Price</label>
                        <input type="number" class="form-control" name="cart_price" value="{{ $center->cart_price }}" id="field-2"
                            placeholder="Center Address">
                        <span class="error error_address text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light update_button">Update Center</button>
            </div>
        </form>
    </div>
</div>

<script>

    $(document).on('submit', '#edit_center_form', function(e) {
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
                $('.center__Table').DataTable().ajax.reload();
            },
            error: function(err) {

                $('.error').html('');

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
