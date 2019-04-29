@extends('templates.template')
@section('template')
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-7">
            <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#individual" role="tab" aria-controls="individual" aria-selected="true">Tasks Assigned to me</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#collective" role="tab" aria-controls="collecttive" aria-selected="false">Tasks Assigned to Other</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="individual" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between float-right">
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#myModal">
                                Create New Task
                            </button>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                                <div class="form-check customize">
                                    <input type="checkbox" id="complete" class="form-check-input"><label class="form-check-label" for="complete">Show complete task</label>
                                </div> 

                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Created by</th>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>Due date</th>
                                        <th>Owner</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <a href="#deleteModal" data-toggle="modal" data-target="#deleteModal">
                                                <i class="material-icons text-danger">delete</i>
                                            </a>
                                            <a href="#editModal" data-toggle="modal" data-target="#editModal">
                                                <i class="material-icons">edit</i>
                                            </a> <span> 1</span>
                                        </td>
                                        <td>Sam Oun</td>
                                        <td>Homework</td>
                                        <td>Laravel Last Homework</td>
                                        <td>26/04/2019 8:00 am</td>
                                        <td>me</td>
                                        <td>Open</td>
                                    </tr>
                                </tbody>
                            </table>
                              <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Create a new task</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="#" method="POST">
                                                @csrf
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Title</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" placeholder="Title">
                                                    </div>
                                                </div>
                                
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Category</label>
                                                    <div class="col-sm-9">
                                                        <select name="" class="form-control">
                                                            <option selected>Choose category...</option>
                                                            <option value="">Homework</option>
                                                            <option value="">Dormitory</option>
                                                            <option value="">Club</option>
                                                            <option value="">Workshop</option>
                                                        </select>
                                                    </div>
                                                </div>
                                
                                                <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Due date</label>
                                                        <div class="col-sm-5">   
                                                            <input type="date" class="form-control">
                                                        </div>
                                                        <i class="material-icons col-1 col-form-label text-info">date_range</i>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-5">   
                                                            <select name="" class="form-control">
                                                                <option value="Open">Open</option>
                                                                <option value="Complete">Complete</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Workload</label>
                                                        <div class="col-sm-5">   
                                                            <input type="number" placeholder="0.5" class="form-control">                       
                                                        </div><span class="col-sm-4 col-form-label text-secondary">(in man-days)</span>
                                                </div>
                                                {{-- individule task --}}
                                                <fieldset class="form-group">
                                                    <div class="row">
                                                        <legend class="col-form-label col-sm-3 pt-0">Private</legend>
                                                        <div class="col-sm-9">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Yes">
                                                            <label class="form-check-label" for="gridRadios1">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="No">
                                                            <label class="form-check-label" for="gridRadios2">No</label>
                                                        </div>                  
                                                        </div>
                                                    </div>
                                                </fieldset>
                                       

                                                <div class="form-group row hideShow">
                                                        <label class="col-sm-3 col-form-label">Assigned to</label>
                                                            <div class="col-sm-5">
                                                                <select name="assigned" class="form-control">
                                                                    <option selected>Choose User</option>
                                                                    <option value="">Sam Oun</option>
                                                                    <option value="">Sokvebol</option>
                                                                    <option value="">Kimsien</option>
                                                                    <option value="">Haoch</option>
                                                                    <option value="">Choam</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Attachments</label>
                                                        <div class="col-sm-7">   
                                                                <input type="file" class="form-control-file" name="file">                      
                                                        </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>

                                <!-- model for edit -->
                            <div class="modal fade" id="editModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                        <h4 class="modal-title">Edit Task</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <form action="#" method="POST">
                                                @csrf
                                                @method('PATCH')

                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Title</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control" value="Laravel Last Homework" placeholder="Title">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Created By</label>
                                                            <div class="col-sm-9">
                                                                <select name="created by" class="form-control">
                                                                    <option selected>Choose User</option>
                                                                    <option selected value="">Sam Oun</option>
                                                                    <option value="">Sokvebol</option>
                                                                    <option value="">Kimsien</option>
                                                                    <option value="">Haoch</option>
                                                                    <option value="">Choam</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Category</label>
                                                    <div class="col-sm-9">
                                                        <select name="" class="form-control">
                                                            <option selected>Choose category...</option>
                                                            <option selected value="">Homework</option>
                                                            <option value="">Dormitory</option>
                                                            <option value="">Club</option>
                                                            <option value="">Workshop</option>
                                                        </select>
                                                    </div>
                                                </div>
                                
                                                <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Due date</label>
                                                        <div class="col-sm-5">   
                                                            <input type="text" class="form-control" value="26/04/2019 8:00">
                                                        </div>
                                                        <i class="material-icons col-form-label text-info date_range">date_range</i>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Status</label>
                                                        <div class="col-sm-5">   
                                                            <select name="" class="form-control">
                                                                <option value="Open">Open</option>
                                                                <option value="Complete">Complete</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Workload</label>
                                                        <div class="col-sm-5">   
                                                            <input type="number" placeholder="0.5" class="form-control">                       
                                                        </div><span class="col-sm-4 col-form-label text-secondary">(in man-days)</span>
                                                </div>
                                                <fieldset class="form-group">
                                                    <div class="row">
                                                        <legend class="col-form-label col-sm-3 pt-0">Private</legend>
                                                        <div class="col-sm-9">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Yes" checked>
                                                            <label class="form-check-label" for="gridRadios1">Yes</label>
                                                        </div>
                                                        <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="No">
                                                        <label class="form-check-label" for="gridRadios2">No</label>
                                                    </div>                  
                                                    </div>
                                                    </div>
                                                </fieldset>
                                                <div class="form-group row hideShow">
                                                        <label class="col-sm-3 col-form-label">Assigned to</label>
                                                            <div class="col-sm-5">
                                                                <select name="assigned" class="form-control">
                                                                    <option selected>Choose User</option>
                                                                    <option value="">Sam Oun</option>
                                                                    <option value="">Sokvebol</option>
                                                                    <option value="">Kimsien</option>
                                                                    <option value="">Haoch</option>
                                                                    <option value="">Choam</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Attachments</label>
                                                    <div class="col-sm-7">   
                                                            <input type="file" class="form-control-file" name="file">                      
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                </div>

                                    <!-- model delete -->
                                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal CRUD</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                            Are you sure to delete?
                                            <br>
                                            <small id='text'>Homework</small><br>
                                            <small id='description'></small>
                                            </div>
                                            {{-- <form action="{{url('destroy/'. $item->id)}}" id="delete" method ="POST"> --}}
                                            <form action="">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No </button>
                                            <button type="submit" class="btn btn-danger">OK</button>
                                            </div>
                                            </form>
                                        </div>
                                        </div>
                                </div>
                                <!-- {{-- jquery --}} -->
                                <script src="{{asset('js/app.js')}}"></script>
                                <script>
                                        $('#deleteModal').on('show.bs.modal',function(event){
                                        var button = $(event.relatedTarget)
                                        var id = button.data('id')
                                        var title = button.data('title')
                                        var description = button.data('description')
                                        var modal = $(this)
                                        modal.find('#text').text(title)
                                        modal.find('#description').text(description)
                                        var url= "{{url('posts')}}/"+id 
                                        $('#delete').attr('action',url)
                                        })
                                </script>

                        </div>
                        <div class="card-footer">
                        </div>
                      </div>
                </div>
                <div class="tab-pane fade" id="collective" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <button type="button" class="btn btn-primary btn-sm " data-toggle="modal" data-target="#collectiveModal">
                                        Create New Task
                                    </button>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                        <div class="form-check customize">
                                            <input type="checkbox" id="complete" class="form-check-input"><label class="form-check-label" for="complete">Show complete task</label>
                                        </div> 
                                    <table id="dataTable2" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Created by</th>
                                                <th>Category</th>
                                                <th>Title</th>
                                                <th>Due date</th>
                                                <th>Owner</th>
                                                <th>
                                                    <i class="material-icons text-secondary">alarm</i>                                                    
                                                </th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#deleteModal2" data-toggle="modal" data-target="#deleteModal2">
                                                        <i class="material-icons text-danger">delete</i>
                                                    </a>
                                                    <a href="#editModal2" data-toggle="modal" data-target="#editModal2">
                                                        <i class="material-icons">edit</i>
                                                    </a> <span> 1</span>
                                                </td>
                                                <td>Sam Oun</td>
                                                <td>Homework</td>
                                                <td>Laravel Last Homework</td>
                                                <td>26/04/2019 8:00 am</td>
                                                <td>me</td>
                                                <td>2</td>
                                                <td>Open</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                      <!-- The Modal -->
                                    <div class="modal fade" id="collectiveModal">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Create a new task</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Title</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" placeholder="Title">
                                                            </div>
                                                        </div>
                                        
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Category</label>
                                                            <div class="col-sm-9">
                                                                <select name="" class="form-control">
                                                                    <option selected>Choose category...</option>
                                                                    <option value="">Homework</option>
                                                                    <option value="">Dormitory</option>
                                                                    <option value="">Club</option>
                                                                    <option value="">Workshop</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                        
                                                        <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Due date</label>
                                                                <div class="col-sm-5">   
                                                                    <input type="date" class="form-control">
                                                                </div>
                                                                <i class="material-icons col-1 col-form-label text-info">date_range</i>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Status</label>
                                                                <div class="col-sm-5">   
                                                                    <select name="" class="form-control">
                                                                        <option value="Open">Open</option>
                                                                        <option value="Complete">Complete</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Workload</label>
                                                                <div class="col-sm-5">   
                                                                    <input type="number" placeholder="0.5" class="form-control">                       
                                                                </div><span class="col-sm-4 col-form-label text-secondary">(in man-days)</span>
                                                        </div>
                                                        {{-- individule task --}}
                                                <fieldset class="form-group">
                                                    <div class="row">
                                                        <legend class="col-form-label col-sm-4 pt-0">Private</legend>
                                                        <div class="col-sm-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="action" id="gridRadios3" checked value="Yes">
                                                            <label class="form-check-label" for="gridRadios3">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="action" id="gridRadios4" value="No">
                                                            <label class="form-check-label" for="gridRadios4">No</label>
                                                        </div>                  
                                                        </div>
                                                    </div>
                                                </fieldset>
                                                
                                                {{-- colllective --}}
                                                <div class="form-group">
                                                    <div class="row">
                                                        <legend class="col-form-label col-sm-4 pt-0">Collective Task</legend>
                                                        <div class="col-sm-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gridRadios"id="showGroup" value="Yes">
                                                            <label class="form-check-label">Yes</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="gridRadios"id="hideGroup" value="No">
                                                        <label class="form-check-label">No</label>
                                                        </div>
                                                    </div>  
                                                    </div>
                                                </div>
                                                <div class="form-group row hideShow">
                                                        <label class="col-sm-3 col-form-label">Assigned to</label>
                                                            <div class="col-sm-5">
                                                                <select name="assigned" class="form-control">
                                                                    <option selected>Choose User</option>
                                                                    <option value="">Sam Oun</option>
                                                                    <option value="">Sokvebol</option>
                                                                    <option value="">Kimsien</option>
                                                                    <option value="">Haoch</option>
                                                                    <option value="">Choam</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    {{-- show when collective yes --}}
                                                <div class="form-group row groupHideShow">
                                                        <label class="col-sm-3 col-form-label">Assigned to</label>
                                                            <div class="col-sm-5">
                                                                <select name="assigned" class="form-control">
                                                                    <option selected>Choose Group</option>
                                                                    <option value="">Class Web A</option>
                                                                    <option value="">Class A</option>
                                                                    <option value="">Class SNA</option>
                                                                    <option value="">Class C</option>
                                                                    <option value="">Class Web B</option>
                                                                </select>
                                                        </div>
                                                </div>
                                                         
                                                    <div class="form-group row">
                                                        <label class="col-sm-3 col-form-label">Attachments</label>
                                                        <div class="col-sm-7">   
                                                            <input type="file" class="form-control-file" name="file">                      
                                                        </div>
                                                    </div>
                                                    </form>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                                
                                            </div>
                                            </div>
                                        </div>
        
                                        <!-- model for edit -->
                                    <div class="modal fade" id="editModal2">
                                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Edit Task</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <form action="#" method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">ID</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" value="1" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Created By</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control" value="Sam Oun" disabled>
                                                                </div>
                                                            </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Title</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control" value="Laravel Last Homework" placeholder="Title">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Created By</label>
                                                                    <div class="col-sm-9">
                                                                        <select name="created by" class="form-control">
                                                                            <option selected>Choose User</option>
                                                                            <option selected value="">Sam Oun</option>
                                                                            <option value="#">Sokvebol</option>
                                                                            <option value="#">Kimsien</option>
                                                                            <option value="">Haoch</option>
                                                                            <option value="">Choam</option>
                                                                        </select>
                                                                    </div>
                                                            </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Category</label>
                                                            <div class="col-sm-9">
                                                                <select name="" class="form-control">
                                                                    <option selected>Choose category...</option>
                                                                    <option selected value="">Homework</option>
                                                                    <option value="">Dormitory</option>
                                                                    <option value="">Club</option>
                                                                    <option value="">Workshop</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                        
                                                        <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Due date</label>
                                                                <div class="col-sm-5">   
                                                                    <input type="text" class="form-control" value="26/04/2019 8:00">
                                                                </div>
                                                                <i class="material-icons col-form-label text-info date_range">date_range</i>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Status</label>
                                                                <div class="col-sm-5">   
                                                                    <select name="" class="form-control">
                                                                        <option value="Open">Open</option>
                                                                        <option value="Complete">Complete</option>
                                                                    </select>
                                                                </div>
                                                        </div>
                                                        <div class="form-group row">
                                                                <label class="col-sm-3 col-form-label">Workload</label>
                                                                <div class="col-sm-5">   
                                                                    <input type="number" placeholder="0.5" class="form-control">                       
                                                                </div><span class="col-sm-4 col-form-label text-secondary">(in man-days)</span>
                                                            </div>
                                                        </fieldset>
                                                        <div class="form-group row hideShow">
                                                                <label class="col-sm-3 col-form-label">Assigned to</label>
                                                                    <div class="col-sm-5">
                                                                        <select name="assigned" class="form-control">
                                                                            <option selected>Choose User</option>
                                                                            <option value="">Sam Oun</option>
                                                                            <option value="">Sokvebol</option>
                                                                            <option value="">Kimsien</option>
                                                                            <option value="">Haoch</option>
                                                                            <option value="">Choam</option>
                                                                        </select>
                                                                    </div>
                                                            </div>
                                                        <div class="form-group row">
                                                            <label class="col-sm-3 col-form-label">Attachments</label>
                                                            <div class="col-sm-7">   
                                                                    <input type="file" class="form-control-file" name="file">                      
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                </div>
                                                
                                            </div>
                                            </div>
                                        </div>
               
                                            <!-- model delete -->
                                        <div class="modal fade" id="deleteModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Modal CRUD</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                    Are you sure to delete?
                                                    <br>
                                                    <small id='text'>Homework</small><br>
                                                    <small id='description'></small>
                                                    </div>
                                                    {{-- <form action="{{url('destroy/'. $item->id)}}" id="delete" method ="POST"> --}}
                                                    <form action="#">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No </button>
                                                    <button type="submit" class="btn btn-danger">OK</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- {{-- jquery --}} -->
                                        <script src="{{asset('js/app.js')}}"></script>
                                        <script>
                                                $('#deleteModal2').on('show.bs.modal',function(event){
                                                var button = $(event.relatedTarget)
                                                var id = button.data('id')
                                                var title = button.data('title')
                                                var description = button.data('description')
                                                var modal = $(this)
                                                modal.find('#text').text(title)
                                                modal.find('#description').text(description)
                                                var url= "{{url('posts')}}/"+id 
                                                $('#delete').attr('action',url)
                                                })
                                        </script>
        
                                </div>
                                <div class="card-footer"></div>
                            </div>
                    </div>
              </div>
        </div>
@endsection