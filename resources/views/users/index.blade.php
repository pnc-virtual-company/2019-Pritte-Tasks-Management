@extends('templates.template')
@section('template')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @include('session-flash')

            <div class="card">
                <div class="card-header">@lang('List of users')</div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-primary"data-toggle="modal"data-target="#createModal" href="{{url('user/create')}}">@lang('Add a new user')</a>
                            <a class="btn btn-secondary" href="{{url('users/export')}}" download>@lang('Export to
                                Excel')</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="dataTable" class="table table-striped table-bordered" id="users">
                                <thead>
                                    <tr>
                                        <th>@lang('ID')</th>
                                        <th>@lang('Name')</th>
                                        <th>@lang('Gender')</th>
                                        <th>@lang('Email')</th>
                                        <th>@lang('Position')</th>
                                        <th>@lang('Roles')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr data-id="{{ $user->id }}">
                                        <td>
                                            <a href="#"data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}" title="@lang('delete the user')"><i class="mdi mdi-delete clickable text-danger delete-icon"></i></a>
                                            <a href="" data-toggle="modal" data-name="{{ $user->name }}" data-id="{{ $user->id}}"
                                                data-gender="{{$user->gender}}" data-email="{{$user->email}}"
                                                data-position="{{$user->position}}" data-province="{{$user->province}}"
                                                data-target="#editUserModal" data-roleid="{{$user->role_id}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i></a>

                                            <a href="" data-toggle="modal" data-name="{{ $user->name }}" data-id="{{ $user->id}}"
                                                data-gender="{{$user->gender}}" data-email="{{$user->email}}"
                                                data-position="{{$user->position}}" data-province="{{$user->province}}"
                                                data-target="#showModal" data-roleid="{{$user->role_id}}">
                                                <i class="mdi mdi-eye clickable text-secondary delete-icon"></i></a>

                                            <span>{{ $user->id }}</span>
                                        </td>
                                        <td>
                                            <span>{!! $user->name !!}</span>
                                        </td>
                                        <td>
                                            <span>{!! $user->gender !!}</span>
                                        </td>
                                        <td>
                                            <span>{!! $user->email !!}</span>
                                        </td>
                                        <td>
                                            <span>{!! $user->position !!}</span>
                                        </td>
                                        <td>
                                            @if ($user->role_id == 1)
                                                <span>Administrator</span>
                                            @else
                                                <span>Normal User</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- Modal Create --}}
<div class="modal fade" id="createModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header ">
                    <h4 class="modal-title">Create new user</h4>
                </div>
                <div class="container">
                    <!-- Modal body -->
                    <div class="modal-body"><br>
                        <form action="{{route('user.store')}}" method="POST">
                            @method('POST')
                            @csrf
                            <div class="form">
                                    <div class="form-group">
                                        <label for="name">@lang('Name')</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter username">
                                    </div>

                                    <div class="form-group">
                                        <label for="gender">@lang('Gender')</label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">@lang('Email')</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" value="{{ old('email') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="position">@lang('Position')</label>
                                        <input type="text" class="form-control" id="position" placeholder="Enter your position" name="position" value="{{ old('email') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="province">@lang('Province')</label>
                                        <input type="text" class="form-control" id="province" name="province" placeholder="Enter your province" value="{{ old('email') }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="txtPassword">@lang('Password')</label>
                                        <input type="password" placeholder="Enter your password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="roles[]">Roles</label>
                                        <select class="form-control" id="roles" name="roles" size="5">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}" @if (!empty(old('roles'))) @if(in_array($role->id, old('roles'))) selected @endif @endif>{!! $role->name !!}</option>
                                        @endforeach
                                        </select>
                                    </div>
                            </div>
                        <br>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create User</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
                </div>
                </div>
        </div>
    </div>
    </div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Delete Users')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>@lang('Are you sure that you want to delete this user?')</p>
            </div>
            <div class="modal-footer">
                <form action="" id="formDelete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">@lang('Delete')</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('Cancel')</button>
                </form>
            </div>
        </div>
    </div>
</div>

 <!-- model for edit -->
 <div class="modal fade" id="editUserModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit User</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body"><br>
                <form action="" id="editUser" method="POST">
                        @method('PATCH')
                        @csrf
                                <div class="form-group">
                                <label for="name">@lang('Name')</label>
                                <input type="text" class="form-control" id="name" name="name" value="">
                            </div>

                            <div class="form-group">
                                <label for="gender">@lang('Gender')</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">@lang('Email')</label>
                                <input type="email" class="form-control" id="email" name="email" value="">
                            </div>

                            <div class="form-group">
                                <label for="position">@lang('Position')</label>
                                <input type="text" class="form-control" id="position" name="position"
                                    value="{{ $user->position }}">
                            </div>

                            <div class="form-group">
                                <label for="province">@lang('Province')</label>
                                <input type="text" class="form-control" id="province" name="province"
                                    value="">
                            </div>

                            <div class="form-group">
                                <label for="roles">Roles</label>
                                <select name="roles" class="form-control" id="role">
                                    @foreach ($roles as $role)
                                        <option value="{!!$role->id!!}"> {!!$role->name!!} </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Edit User</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- view detail --}}
    <div class="modal fade" id="showModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Detail Information</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body"><br>
                    <form action="#" method="POST">
                            @method('PATCH')
                            @csrf
                                    <div class="form-group">
                                    <label for="name">@lang('Name')</label>
                                    <input type="text" class="form-control" readonly id="name" name="name" value="">
                                </div>

                                <div class="form-group">
                                    <label for="gender">@lang('Gender')</label>
                                    <select name="gender"disabled="true" id="gender" class="form-control">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="email">@lang('Email')</label>
                                    <input type="email" class="form-control"readonly id="email" name="email" value="">
                                </div>

                                <div class="form-group">
                                    <label for="position">@lang('Position')</label>
                                    <input type="text" class="form-control"readonly id="position" name="position"
                                        value="{{ $user->position }}">
                                </div>

                                <div class="form-group">
                                    <label for="province">@lang('Province')</label>
                                    <input type="text" class="form-control"readonly id="province" name="province"
                                        value="">
                                </div>

                                <div class="form-group">
                                    <label for="roles">Roles</label>
                                    <select name="roles"disabled="true" class="form-control" id="roless">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{!! $role->name !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<script>
// edit
     $('#editUserModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var name = button.data('name')
            var gender = button.data('gender')
            var email = button.data('email')
            var position = button.data('position')
            var province = button.data('province')
            var roles = button.data('roleid')
            var modal = $(this)
            modal.find('#name').attr('value', name);
            modal.find('#gender').val(gender);
            modal.find('#email').attr('value', email);
            modal.find('#province').attr('value', province);
            modal.find('#position').attr('value', position);
            $('#role').val(roles);
            modal.find('#editUser').attr('action', 'user/' + id)
        });
            // show modal
     $('#showModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var name = button.data('name')
                var gender = button.data('gender')
                var email = button.data('email')
                var position = button.data('position')
                var province = button.data('province')
                var roles = button.data('roleid')
                var modal = $(this)
                modal.find('#name').attr('value', name);
                modal.find('#gender').val(gender);
                modal.find('#email').attr('value', email);
                modal.find('#province').attr('value', province);
                modal.find('#position').attr('value', position);
                $('#roless').val(roles);
            });
            // delete user
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        $('#formDelete').attr('action', 'user/' + id)
    });
</script>

@endsection