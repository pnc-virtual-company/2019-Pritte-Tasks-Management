@extends('templates.template')
@section('template')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Profile Setting</h1>
    </div>
    <div class="row">
        <div class="col-xl-12 col-lg-12">
          <div class="card shadow mb-4">
              <div class="card-header">
                <h5>Change Profile Picture & Password</h5>
              </div>
            <!-- Card Body -->
            <div class="card-body">
                <img src="{{asset('storage/images/'.Auth::user()->avatar)}}" class="profile" alt="profile picture"/>
                <form action="" method="post" enctype="multipart/form-data">
                </form>
            </div>
            <div class="card-footer">
                
            </div>
          </div>
        </div>
    </div>
