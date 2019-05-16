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
                            <a class="btn btn-primary" data-toggle="modal" data-target="#createModal" href="{{url('user/create')}}">@lang('Add a new user')</a>
                            <a class="btn btn-secondary" href="{{url('users/export')}}" download>@lang('Export to Excel')</a>
                        </div>
                    </div>

                    <div class="row"><div class="col-md-12">&nbsp;</div></div>

                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered" id="users">
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
                                            <a href="#"><i class="material-icons text-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}" title="@lang('delete the user')">delete</i></a>
                                            <a href="{{url('user')}}/{{ $user->id }}/edit" title="@lang('edit')"><i class="material-icons text-primary">edit</i></a>

                                            <a href="{{url('user')}}/{{ $user->id }}" title="@lang('view')"><i class="material-icons text-info">visibility</i></a>
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
<!-- The create Modal -->
<div class="modal fade" id="createModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header ">
                <h4 class="modal-title">Create new user</h4>
            </div>
            <div class="container">


                <!-- Modal body -->
                <div class="modal-body"><br>
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="form">
                                <div class="form-group">
                                    <label for="name">@lang('Name')</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
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
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label for="position">@lang('Position')</label>
                                    <input type="text" class="form-control" id="position" name="position" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label for="province">@lang('Province')</label>
                                    <input type="text" class="form-control" id="province" name="province" value="{{ old('email') }}">
                                </div>

                                <div class="form-group">
                                    <label for="txtPassword">@lang('Password')</label>
                                    <input type="password" class="form-control" id="password" name="password">
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
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('Delete confirmation')</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <p>@lang('Are you sure that you want to delete this object?')</p>
            </div>
            <div class="modal-footer">
                <form action="" id="formDelete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">@lang('Yes')</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">@lang('No')</button>
                </form>
            </div>
          </div>
        </div>
      </div>
        {{-- <script src="{{asset('js/app.js')}}"></script> --}}
      <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            $('#formDelete').attr('action','user/'+id)
        });
    </script>

@endsection
