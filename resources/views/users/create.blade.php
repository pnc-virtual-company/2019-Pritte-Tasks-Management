@extends('templates.template')
@section('template')
@include('validation-errors')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang('Create a new user')</div>

                <div class="card-body">

                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}

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
                            <input type="text" class="form-control" id="position" name="position"
                                value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="province">@lang('Province')</label>
                            <input type="text" class="form-control" id="province" name="province"
                                value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="txtPassword">@lang('Password')</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        <div class="form-group">
                            <label for="roles[]">Roles</label>
                            <select class="form-control" id="roles" name="roles" size="5">
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if (!empty(old('roles'))) @if(in_array($role->id,
                                    old('roles'))) selected @endif @endif>{!! $role->name !!}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Save" />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection