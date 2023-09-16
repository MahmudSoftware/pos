  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myLargeModalLabel">Edit SMS</h4>
        </div>
        <div class="modal-body">
            <form class="" action="{{ route('dashboard.sms.update', $sms->id) }}" id="edit_sms_form" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subject" class="control-label">SMS Subject</label>
                            <input type="text" class="form-control" name="subject" id="subject" value="{{ $sms->subject }}" placeholder="SMS Subject">
                            <span class="error error_subject text-danger"></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Status</label>
                            <select class="form-control" name="status">
                                <option selected disabled>Choose Status</option>
                                <option value="1" {{ $sms->status == 1 ? 'SELECTED' : '' }}>Active</option>
                                <option value="0" {{ $sms->status == 0 ? 'SELECTED' : '' }}>De-Active</option>
                            </select>
                            <span class="error error_status text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group no-margin">

                            <label for="message" class="control-label">Message</label>
                            <textarea class="form-control autogrow" id="message" name="message" placeholder="Write the message" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{ $sms->message }}</textarea>
                            <span class="error error_message text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light update_button">Update SMS</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    $(document).on('submit', '#edit_sms_form', function(e) {
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
                $('.sms__table').DataTable().ajax.reload();
            },
            error: function(err) {
                $('.update_button').prop('type', 'submit');
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

