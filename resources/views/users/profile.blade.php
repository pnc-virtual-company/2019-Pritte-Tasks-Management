@extends('templates.template')
@section('template')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg">
                <div class="card-header font-weight-bold text-center bg-dark text-light">@lang('My profile')</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <img width="150px" class="img-profile rounded-circle mx-auto d-block clickable"  src="{{asset('storage/profiles/'.Auth::user()->avatar)}}">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-10 mt-4">
                                    <div class="form-group">
                                        <table width="100%" class="lead">
                                            <tr>
                                                <th>Name</th>
                                                <td class="pl-4">{!! $user->name !!}</td>
                                            </tr>
                                            <tr>
                                                <th>Email</th>
                                                <td  class="pl-4">{!! $user->email !!}</td>
                                            </tr>
                                            <tr>
                                                <th>Password</th>
                                                <td  class="pl-4">*******</td>
                                            </tr>
                                            <tr>
                                                <th>Gender</th>
                                                <td  class="pl-4">{!! $user->gender !!}</td>
                                            </tr>
                                            <tr>
                                                <th>Position</th>
                                                <td  class="pl-4">{!! $user->position !!}</td>
                                            </tr>
                                            <tr>
                                                <th>Province</th>
                                                <td  class="pl-4">{!! $user->province !!}</td>
                                            </tr>
                                            <tr>
                                                <th>Role</th>
                                                <td  class="pl-4">
                                                    @if ($user->role_id == 1)
                                                        <span>Administrator</span>
                                                    @else
                                                        <span>Normal User</span>
                                                    @endif    
                                                </td>
                                            </tr>
                                        </table>
                                        <a href="{{url('users/edit')}} " class="btn btn-primary mx-auto d-block mt-3">Change Setting</a>
                                    </div>
                                </div>
                                <div class="col-1"></div>
                            </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div>

                    <div class="row"><div class="col-md-12">&nbsp;</div></div>

                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script type="text/javascript">

//On document ready, 
$(function() {

});
</script>
@endpush
