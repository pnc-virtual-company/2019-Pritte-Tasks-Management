@extends('templates.template')
@section('template')

@include('validation-errors')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@lang('Edit Profile')</div>

                <div class="card-body">
                    <img width="100px" src="{{asset('storage/storage/profiles/'.Auth::user()->avatar)}}" class="profile"
                        alt="profile picture" />

                    <form action="{{ url('users/update')}}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="avatar">Upload Profile</label>
                            <input type="file" name="avatar" value="{{ Auth::user()->avatar }}" />
                        </div>

                        <div class="form-group">
                            <label for="name">@lang('Name')</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ Auth::user()->name }}">
                        </div>

                        <div class="form-group">
                            @if (Auth::user()->gender == "Male")
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

                        </div>

                        <div class="form-group">
                            <label for="email">@lang('Email')</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ Auth::user()->email }}">
                        </div>

                        <div class="form-group">
                            <label for="position">@lang('Position')</label>
                            <input type="text" class="form-control" id="Position" name="position"
                                value="{{ Auth::user()->position }}">
                        </div>

                        <div class="form-group">
                            <label for="province">@lang('Province')</label>
                            <input type="text" class="form-control" id="Province" name="province"
                                value="{{ Auth::user()->province }}">
                        </div>

                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select class="form-control" id="roles" name="roles" multiple size="5">
                                @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if(($role->id == Auth::user()->role_id)) selected
                                    @endif>{!! $role->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Edit User" />
                        <a href="{{url('user')}} " class="btn btn-secondary ">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection