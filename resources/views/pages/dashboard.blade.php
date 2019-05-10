@extends('templates.template')
@section('template')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>        
<div class="row">

    <div class="col-xl-12 col-lg-12">
        <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> 
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#myTask" role="tab" aria-controls="myTask" aria-selected="true">My Tasks</a>
                </li>
            </ul>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="row mt-4">
                <div class="col-3 mb-4 font-weight-bold">
                    <div class="card mt-4">
                        <div class="card-body mt-4">
                            <p>Overall Workload: <span class="lead"> 21 </span>md</p>
                            <p>Open Tasks: <span> 15 </span></p>
                            <p>Late Tasks: <span> 5 </span></p>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div id="canvas-holder" >
                        <canvas id="pie-chart"></canvas>
                    </div>
                </div>
                <div class="col-4 mt-4">
                    <div id="container">
                        <canvas id="bar-chart" height="190px"></canvas>
                    </div>    
                </div>
            </div>
            <hr style="width:50%" class="text-center"> <br>
                <div class="row mt-4">
                        <div class="col-2">
                          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-late-tab" data-toggle="pill" href="#v-pills-late" role="tab" aria-controls="v-pills-home" aria-selected="true">Late Tasks</a>
                            <a class="nav-link" id="v-pills-week-tab" data-toggle="pill" href="#v-pills-week" role="tab" aria-controls="v-pills-week" aria-selected="false">Due this week</a>
                            <a class="nav-link" id="v-pills-month-tab" data-toggle="pill" href="#v-pills-month" role="tab" aria-controls="v-pills-month" aria-selected="false">Due this month</a>
                            <a class="nav-link" id="v-pills-all-tab" data-toggle="pill" href="#v-pills-all" role="tab" aria-controls="v-pills-all" aria-selected="false">All</a>
                          </div>
                        </div>
                        <div class="col-10">
                          <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-late" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <table id="dataTable2" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Created by</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Due date</th>
                                                <th><i class="material-icons">attach_file</i></th>
                                                <th>
                                                    <i class="material-icons text-secondary">alarm</i>                                                    
                                                </th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Sam Oun</td>
                                                <td>Homework</td>
                                                <td>Laravel</td>
                                                <td>26/04/2019 8:00 am</td>
                                                <td><i class="material-icons">attach_file</i></td>
                                                <td>2</td>
                                                <td>Open</td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>KoKoKo</td>
                                                <td>Club</td>
                                                <td>Kick-off Meeting</td>
                                                <td>20/04/2019 10:00 am</td>
                                                <td></td>
                                                <td>0.5</td>
                                                <td>Open</td>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                            <div class="tab-pane fade" id="v-pills-week" role="tabpanel" aria-labelledby="v-pills-week-tab">
                                    <table id="dataTable3" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Created by</th>
                                                    <th>Category</th>
                                                    <th>Title</th>
                                                    <th>Due date</th>
                                                    <th><i class="material-icons">attach_file</i></th>
                                                    <th>
                                                        <i class="material-icons text-secondary">alarm</i>                                                    
                                                    </th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Sam Oun</td>
                                                    <td>Homework</td>
                                                    <td>Laravel Last Homework</td>
                                                    <td>26/04/2019 8:00 am</td>
                                                    <td><i class="material-icons">attach_file</i></td>
                                                    <td>2</td>
                                                    <td>Open</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>KoKoKo</td>
                                                    <td>Club</td>
                                                    <td>Kick-off Meeting</td>
                                                    <td>29/04/2019 10:00 am</td>
                                                    <td><i class="material-icons">attach_file</i></td>
                                                    <td>0.5</td>
                                                    <td>Open</td>
                                                </tr>
                                            </tbody>
                                        </table>
                            </div>
                            <div class="tab-pane fade" id="v-pills-month" role="tabpanel" aria-labelledby="v-pills-month-tab">
                                    <table id="dataTable4" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Created by</th>
                                                    <th>Category</th>
                                                    <th>Title</th>
                                                    <th>Due date</th>
                                                    <th><i class="material-icons">attach_file</i></th>
                                                    <th>
                                                        <i class="material-icons text-secondary">alarm</i>                                                    
                                                    </th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Sam Oun</td>
                                                    <td>Homework</td>
                                                    <td>Laravel Last Homework</td>
                                                    <td>26/04/2019 8:00 am</td>
                                                    <td><i class="material-icons">attach_file</i></td>
                                                    <td>2</td>
                                                    <td>Open</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>KoKoKo</td>
                                                    <td>Club</td>
                                                    <td>Kick-off Meeting</td>
                                                    <td>29/04/2019 10:00 am</td>
                                                    <td><i class="material-icons">attach_file</i></td>
                                                    <td>0.5</td>
                                                    <td>Open</td>
                                                </tr>
                                            </tbody>
                                        </table>
                            </div>
                            <div class="tab-pane fade" id="v-pills-all" role="tabpanel" aria-labelledby="v-pills-all-tab"><table id="dataTable2" class="table table-striped table-bordered" style="width:100%">
                                <table id="dataTable5" class="table table-striped table-bordered" style="width:100%">   
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Created by</th>
                                            <th>Category</th>
                                            <th>Title</th>
                                            <th>Due date</th>
                                            <th><i class="material-icons">attach_file</i></th>
                                            <th>
                                                <i class="material-icons text-secondary">alarm</i>                                                    
                                            </th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Sam Oun</td>
                                            <td>Homework</td>
                                            <td>Laravel Last Homework</td>
                                            <td>26/04/2019 8:00 am</td>
                                            <td><i class="material-icons">attach_file</i></td>
                                            <td>2</td>
                                            <td>Open</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>KoKoKo</td>
                                            <td>Club</td>
                                            <td>Kick-off Meeting</td>
                                            <td>29/04/2019 10:00 am</td>
                                            <td><i class="material-icons">attach_file</i></td>
                                            <td>0.5</td>
                                            <td>Open</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row mt-4">
                          <div class="col-1"></div>
                          <div class="col-10">
                              <canvas id="line-chart"></canvas>

                          </div>
                          <div class="col-1"></div>
                    </div>
        </div>
    </div>
</div>
@endsection
