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
                            <a class="btn btn-primary" href="{{url('user/create')}}">@lang('Add a new user')</a>
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
                                            <i class="mdi mdi-delete clickable text-danger delete-icon" data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}" title="@lang('delete the user')"></i>
                                            <a href="{{url('user')}}/{{ $user->id }}/edit" title="@lang('edit')"><i class="mdi mdi-pencil text-primary clickable"></i></a>
                                            <a href="{{url('user')}}/{{ $user->id }}" title="@lang('view')"><i class="mdi mdi-eye text-info clickable"></i></a>
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
                                            <span>{{ $user->roles->pluck('name')->implode(', ') }}</span>
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
        <script src="{{asset('js/app.js')}}"></script>
      <script>
      $
	  ('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        $('#formDelete').attr('action','user/'+id)
    });

<!-- Include the modal //-->
// @include('modal-confirm-delete')
// @include('modal-alert')
// @include('modal-wait')

@endsection
