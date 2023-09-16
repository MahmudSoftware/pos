{{-- @php
    $data = App\Models\YearSetup::get();
    dd($data);
@endphp --}}
<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myLargeModalLabel">Edit Year Setup</h4>
    </div>
    <div class="modal-body">
            <form class="" action="{{ route('dashboard.yearSetup.store') }}" id="edit_yearsetup_form" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="name" class="control-label">Business Year Name</label>
                        <input required type="text" value="" class="form-control" name="name" id="name" value="{{ old('name') }}" placeholder="Business Year Name">
                        <span class="error error_name text-danger"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="start_date" class="control-label">Start Date</label>
                        <input required type="date" value="" class="form-control" name="start_date" id="start_date" value="{{ old('start_date') }}" placeholder="Last Name">
                        <span class="error error_start_date text-danger"></span>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="end_date" class="control-label">End Date</label>
                        <input type="date" value="" class="form-control" name="end_date" id="end_date" value="{{ old('end_date') }}" placeholder="Office Phone">
                        <span class="error error_end_date text-danger"></span>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light update_button">Update Business Year</button>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript">
    //    $(document).on('submit', '#edit_yearsetup_form', function(e) {
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
    //             $('.center__Table').DataTable().ajax.reload();
    //         },
    //         error: function(err) {

    //             $('.error').html('');

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
</script>
