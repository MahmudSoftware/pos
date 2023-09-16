<div class="modal-dialog modal-lg">
    <div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title" id="myLargeModalLabel">Edit Office</h4>
</div>
<div class="modal-body">
<form class="" action="{{ route('office.update') }}" id="edit_office_form" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="name" class="control-label">Name</label>
            <input required type="text" class="form-control" name="name" id="name" value="{{ $office->name }}" placeholder="Office Name">
            <span class="error error_name text-danger"></span>
        </div>
    </div>
       <input type="hidden" name="office_id" value="{{ $office->id }}">
    <div class="col-md-4">
        <div class="form-group">
            <label for="phone" class="control-label">Phone</label>
            <input type="text" class="form-control" name="phone" id="phone" value="{{ $office->phone }}" placeholder="Office Phone">
            <span class="error error_phone text-danger"></span>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="field-2" class="control-label">E-mail</label>
            <input type="email" class="form-control" name="email" id="field-2" value="{{ $office->email }}" placeholder="Office E-mail">
            <span class="error error_email text-danger"></span>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="field-2" class="control-label">Status</label>
            <select class="form-control" name="status">
                <option value="1" {{ $office->status == 1 ? 'SELECTED': '' }}>Active</option>
                <option value="0" {{ $office->status == 0 ? 'SELECTED': '' }}>De-Active</option>
            </select>
            <span class="error error_status text-danger"></span>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="field-2" class="control-label">Office Type</label>
            <select class="form-control" name="type">
                <option selected disabled>Choose Status</option>
                <option value="1" {{ $office->type == 1 ? 'SELECTED': '' }}>Head Office</option>
                <option value="2" {{ $office->type == 2 ? 'SELECTED': '' }}>Mill Office</option>
                <option value="3" {{ $office->type == 3 ? 'SELECTED': '' }}>Mill Zone</option>
            </select>
            <span class="error error_type text-danger"></span>
        </div>
    </div>

        <div class="col-md-4">
        <div class="form-group">
            <label for="field-2" class="control-label">Address</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $office->address }}" placeholder="Office Address">
            <span class="error error_address text-danger"></span>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group no-margin">

            <label for="field-7" class="control-label">Description</label>
            <textarea class="form-control autogrow" id="description" name="description" placeholder="Write something about Office" style="overflow: hidden; word-wrap: break-word; resize: horizontal; height: 104px;">{{ $office->description }}</textarea>
            <span class="error error_description text-danger"></span>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group no-margin">
            <label for="" class="control-label">Logo</label>
            <input type="file" class="form-control" id="logo" name="logo"><br>
            <img src="{{ asset('upload/mill_logos/'.$office->logo) }}" style="height: 50px; width: 50%;" alt="">
        </div>
    </div>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-default waves-effect" onclick="this.form.reset()" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Update Office</button>
</div>
</form>
</div>
    </div>
</div>
<script>

    $(document).on('submit', '#edit_office_form', function(e) {
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
                $('.office__table').DataTable().ajax.reload();
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

