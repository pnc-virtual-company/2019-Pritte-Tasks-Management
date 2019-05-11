@extends('templates.template')
@section('template')

@include('validation-errors')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header bg-dark text-light">@lang('User details')</div>

                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="{{url('user')}}">@lang('Back to list')</a>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">@lang('Name')</label>
                        <input type="text" class="form-control" name="name" readonly value="{!! $user->name !!}">
                    </div>

                    <div class="form-group">
                        <label for="email">@lang('Email')</label>
                        <input type="email" class="form-control" name="email" readonly value="{{ $user->email }}">
                    </div>

                    <div class="form-group">
                        <label for="gender">@lang('Gender')</label>
                        <input type="text" class="form-control" name="gender" readonly value="{!! $user->gender !!}">
                    </div>

                    <div class="form-group">
                        <label for="position">@lang('Position')</label>
                        <input type="text" class="form-control" name="position" readonly
                            value="{!! $user->position !!}">
                    </div>

                    <div class="form-group">
                        <label for="province">@lang('Province')</label>
                        <input type="text" class="form-control" name="province" readonly
                            value="{!! $user->province !!}">
                    </div>

                    <div class="form-group">
                        <label for="roles[]">Roles</label>
                        <select class="form-control" readonly multiple size="5">
                            @foreach ($roles as $role)
                            <option value="{{ $role->id }}" @if(($role->id == $user->role_id)) selected @endif>{!!
                                $role->name !!}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection