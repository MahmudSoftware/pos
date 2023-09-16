@extends('dashboard.index')


@push('style')
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
@endpush


@section('dashboard_content')
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h4 class="modal-title" id="myLargeModalLabel">Edit Role</h4>
        </div>
        <div class="modal-body">
            <form class="" action="{{ route('user.role.update') }}" id="add_role_form" method="POST">
                @csrf
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Role Name:*</label>
                                    <input class="form-control" required="" placeholder="Role Name" name="name"
                                        type="text" id="name" value="{{ $role->name }}">
                                        <input type="hidden" name="role_id" value="{{ $role->id }}">
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="modal-footer">
                                    <button type="submit"
                                        class="btn btn-primary waves-effect waves-light submit_button">Update Role Permission</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <label>Permissions:</label>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($permission_groups as $group)
                                <div class="col-md-4">
                                    <div class="panel panel-border panel-primary">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">{{ $group->group_name }}</h3>
                                        </div>
                                        @php
                                            $permissions = App\Models\user::getPermissionByGroupName($group->group_name);

                                        @endphp
                                        <div class="panel-body">
                                            <p style="display: none;"></p>
                                            @foreach ($permissions as $permissionData)
                                                <div class="checkbox checkbox-danger">
                                                    <input id="checkbox{{ $permissionData->name }}" name="permissions[]" {{  $role->hasPermissionTo($permissionData->name) ? 'checked' : ''}}  type="checkbox"
                                                        value="  {{ $permissionData->name }}">
                                                    <label for="checkbox{{ $permissionData->name }}">
                                                        {{ $permissionData->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary waves-effect waves-light submit_button">Update Role Permission</button>
                </div>
            </form>
        </div>
    </div>
    @include('dashboard.user_role.partial.script')
@endsection
