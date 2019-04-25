@extends('templates.template')
@section('template')
    {{-- Code Here --}}
    
    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
          
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#individual" role="tab" aria-controls="individual" aria-selected="true">Tasks Assigned to me</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#collecttive" role="tab" aria-controls="collecttive" aria-selected="false">Tasks ASsigned to Other</a>
                </div>
              </nav>
              <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="individual" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">(You can change here)</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Managers</th>
                                        <th>Viewers</th>
                                        <th>Member</th>
                                        <th>Last Modification date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#deleteModal" data-toggle="modal">
                                                <i class="material-icons text-danger">delete</i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#myModal">
                                                <i class="material-icons">edit</i>
                                            </a>       
                                        </td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <h6 class="font-weight-bold">Customer yourself. (delete it here)</h6>
                        </div>
                      </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                          <h6 class="m-0 font-weight-bold text-primary">(You can change here)</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Managers</th>
                                        <th>Viewers</th>
                                        <th>Member</th>
                                        <th>Last Modification date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#deleteModal" data-toggle="modal">
                                                <i class="material-icons text-danger">delete</i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#myModal">
                                                <i class="material-icons">edit</i>
                                            </a>       
                                        </td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <td>2011/04/25</td>
                                        <td>$320,800</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <h6 class="font-weight-bold">Customer yourself. (delete it here)</h6>
                        </div>
                      </div>
                </div>
              </div>
        </div>
@endsection