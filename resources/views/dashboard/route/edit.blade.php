<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myLargeModalLabel">Add Edit</h4>
        </div>
        <div class="modal-body">
            <form class="" action="{{ route('dashboard.user.update', $user->id) }}" id="edit_user_form" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="first_name" class="control-label">First Name</label>
                            <input required type="text" class="form-control" name="first_name" id="first_name" value="{{ $user->first_name }}" placeholder="First Name">
                            <span class="error error_e_first_name text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="last_name" class="control-label">Last Name</label>
                            <input required type="text" class="form-control" name="last_name" id="last_name" value="{{ $user->last_name }}" placeholder="Last Name">
                            <span class="error error_e_last_name text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone" class="control-label">Phone</label>
                            <input type="text" class="form-control" name="phone" id="phone" value="{{ $user->phone }}" placeholder="Phone Number">
                            <span class="error error_e_phone text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-2" class="control-label">User Type</label>
                            <select class="form-control" name="roles[]">
                                <option selected disabled>Choose Type</option>
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->user_type == $role->id ? 'SELECTED':'' }}>{{ $role->name }}</option>
                                @endforeach
                            </select>
                            <span class="error error_e_user_type text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email" class="control-label">E-mail</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $user->email }}" placeholder="E-mail">
                            <span class="error error_e_email text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Address</label>
                            <input type="text" class="form-control" name="address" id="address" value="{{ $user->address }}" placeholder="Office Address">
                            <span class="error error_e_address text-danger"></span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="field-2" class="control-label">Office</label>
                            <select class="form-control" name="office_id" id="office_id">
                                <option selected disabled>Choose Office</option>
                                @foreach ($offices as $office)
                                <option value="{{$office->id}}" {{($user->office_id == $office->id) ? 'selected': ''}}>{{$office->name}}</option>
                                @endforeach
                                {{--  <option value="1">Super Admin</option>  --}}
                            </select>
                            <span class="error error_user_type text-danger"></span>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light update_button">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>

    $(document).on('submit', '#edit_user_form', function(e) {
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
                $('.user__table').DataTable().ajax.reload();
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
