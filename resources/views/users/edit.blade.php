@extends('templates.template')
@section('template')

@include('validation-errors')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang('Edit a user')</div>

                <div class="card-body">

                    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
<<<<<<< HEAD
                        <!-- Simulate PUT or PATCH verb, 
                             See: https://laravel.com/docs/5.7/controllers#resource-controllers //-->
=======
>>>>>>> deee474b8df2fdb3d351e1f5b8c303978ddb85b6
                        @method('PUT')

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="name">@lang('Name')</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
<<<<<<< HEAD
                            <label for="gender">@lang('Gender')</label>
                            <input type="text" class="form-control" id="gender" name="gender" value="{{ $user->gender }}">
=======
                            @if ($user->gender == "Male")
                                <label for="gender">@lang('Gender')</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            @else
                                <label for="gender">@lang('Gender')</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                                </select>
                            @endif

>>>>>>> deee474b8df2fdb3d351e1f5b8c303978ddb85b6
                        </div>

                        <div class="form-group">
                            <label for="email">@lang('Email')</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="position">@lang('Position')</label>
                            <input type="text" class="form-control" id="Position" name="position"  value="{{ $user->position }}">
                        </div>

                        <div class="form-group">
                            <label for="province">@lang('Province')</label>
                            <input type="text" class="form-control" id="Province" name="province" value="{{ $user->province }}">
                        </div>

                        <div class="form-group">
                            <label for="roles[]">Roles</label>
                            <select class="form-control" id="roles" name="roles" multiple size="5">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if(($role->id == $user->role_id)) selected @endif>{!! $role->name !!}</option>
                            @endforeach
                            </select>
                        </div>
<<<<<<< HEAD
                        <input type="submit" class="btn btn-primary" value="Save" />
=======
                        <input type="submit" class="btn btn-primary" value="Edit User" />
                        <a href="{{url('user')}} " class="btn btn-secondary ">Cancel</a>
>>>>>>> deee474b8df2fdb3d351e1f5b8c303978ddb85b6
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<<<<<<< HEAD

@push('scripts')
<script type="text/javascript">
//On document ready, 
$(function() {
});
</script>
@endpush
=======
>>>>>>> deee474b8df2fdb3d351e1f5b8c303978ddb85b6
