<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myLargeModalLabel">Edit Designation</h4>
        </div>
        <div class="modal-body">
            <form class="" action="{{ route('dashboard.designation.update', $designation->id) }}" id="edit_designation_form" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Depertment Name</label>
                            <input type="text" class="form-control" name="name" id="field-2" value="{{ $designation->name }}" placeholder="Deperatment Name">
                            <span class="error error_e_name text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Status</label>
                            <select class="form-control" name="status">
                                <option selected disabled>Choose Status</option>
                                <option value="1" {{ $designation->status == 1 ? 'SELECTED': '' }}>Active</option>
                                <option value="2" {{ $designation->status == 2 ? 'SELECTED': '' }}>De-Active</option>
                            </select>
                            <span class="error error_e_status text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group no-margin">

                            <label for="field-7" class="control-label">Description</label>
                            <textarea class="form-control autogrow" id="description" name="description" placeholder="Write something about Depertment" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{ $designation->description }}</textarea>
                            <span class="error error_e_description text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light update_button">Update Designation</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    $(document).on('submit', '#edit_designation_form', function(e) {
        e.preventDefault();

        // $('.update_button').prop('type', 'button');

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
                // $('.update_button').prop('type', 'submit');
                $('.designation__table').DataTable().ajax.reload();
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

