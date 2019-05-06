@extends('templates.template')
@section('template')
    {{-- Code Here --}}
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Groups</h1>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
            Create New Group
        </button>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <table id="dataTable2" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Managers</th>
                                <th>Viewers</th>
                                <th>Members</th>
                                <th>Last modification date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <a href="#" class="text-danger data-toggle="modal"
                                            data-target="#deletetaskModal"><i class="material-icons text-danger">delete</i></a>
                                    <a href="#" class="text-primary" data-toggle="modal"
                                            data-target="#editmyModal"><i class="material-icons">edit</i></a>1
                                </td>
                                <td>Virtual Company</td>
                                <td>Group A</td>
                                <td>Everybody</td>
                                <td>17 members</td>
                                <td>26/04/2019 3:40pm</td>
                            </tr>
                            <tr>
                                <td>
                                    <a href="#" class="text-danger data-toggle="modal"
                                    data-target="#deletetaskModal"><i class="material-icons text-danger">delete</i></a>
                                    <a href="#" class="text-primary" data-toggle="modal"
                                    data-target="#editmyModal"><i class="material-icons">edit</i></a>2
                                </td>
                                <td>Virtual Company</td>
                                <td>Group Z</td>
                                <td>Everybody</td>
                                <td>17 members</td>
                                <td>30/04/2019 3:40pm</td>
                            </tr>
                        </tbody>
            
                    </table>
                    
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
            
                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Create a new Group</h4>
                                </div>
                                <!-- Modal body -->
                                <div class="modal-body">
                                    <form action="#">
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Group Name(s)</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" placeholder="Enter group name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Manager</label>
                                                <div class="col-sm-9">
                                                    <select name="" class="form-control">
                                                        <option selected>Select Manager</option>
                                                        <option value="1">Sam Oun</option>
                                                        <option value="2">Sokvebol</option>
                                                        <option value="3">Haoch</option>
                                                        <option value="4">Kimsien</option>
                                                        <option value="5">Choam</option>
                                                    </select>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-2"></div>
                                            <div class="col-9">
                                                <textarea name="" class="form-control" id="" cols="15" rows="4"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Viewer(s)</label>
                                                    <div class="col-sm-9">
                                                        <select name="" class="form-control">
                                                            <option selected>Select user...</option>
                                                            <option value="1">Sam Oun</option>
                                                            <option value="2">Sokvebol</option>
                                                            <option value="3">Haoch</option>
                                                            <option value="4">Kimsien</option>
                                                            <option value="5">Choam</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-2"></div>
                                                <div class="col-9">
                                                    <textarea name="" class="form-control" id="" cols="15" rows="4"></textarea>
    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Member(s)</label>
                                                        <div class="col-sm-9">
                                                            <select name="" class="form-control">
                                                                <option selected>Select user</option>
                                                                <option value="1">Sam Oun</option>
                                                                <option value="2">Sokvebol</option>
                                                                <option value="3">Haoch</option>
                                                                <option value="4">Kimsien</option>
                                                                <option value="5">Choam</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-2"></div>
                                                    <div class="col-9">
                                                        <textarea name="" class="form-control" id="" cols="15" rows="4"></textarea>
                                                    </div>
                                                </div>
                                    </form>
                                </div>
                               
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Concel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Delete Modal --}}
                    <div class="modal fade" id="deletetaskModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Confrimation</h4>
                                </div>
            
                                <div class="modal-body">
                                    Are you sure that you want to delete this group?
                                </div>
                                <div class="modal-footer">
                                    <a href="#" class="btn  btn-success" data-dismiss="modal">Yes</a>
                                    <a href="#" class="btn btn-danger" data-dismiss="modal">No</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- model for edit -->
                    <div class="modal fade" id="editmyModal">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content">
                
                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit Group</h4>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form action="#">
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Group Name(s)</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" placeholder="Enter group name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-2 col-form-label">Manager</label>
                                                    <div class="col-sm-9">
                                                        <select name="" class="form-control">
                                                            <option selected>Select Manager</option>
                                                            <option value="1">Sam Oun</option>
                                                            <option value="2">Sokvebol</option>
                                                            <option value="3">Haoch</option>
                                                            <option value="4">Kimsien</option>
                                                            <option value="5">Choam</option>
                                                        </select>
                                                    </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-2"></div>
                                                <div class="col-9">
                                                    <textarea name="" class="form-control" id="" cols="15" rows="4">Sam Oun, Group A</textarea>
    
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                    <label class="col-sm-2 col-form-label">Viewer(s)</label>
                                                        <div class="col-sm-9">
                                                            <select name="" class="form-control">
                                                                <option selected>Select user...</option>
                                                                <option value="1">Sam Oun</option>
                                                                <option value="2">Sokvebol</option>
                                                                <option value="3">Haoch</option>
                                                                <option value="4">Kimsien</option>
                                                                <option value="5">Choam</option>
                                                            </select>
                                                        </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-2"></div>
                                                    <div class="col-9">
                                                        <textarea name="" class="form-control" id="" cols="15" rows="4">VC2</textarea>
        
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Member(s)</label>
                                                            <div class="col-sm-9">
                                                                <select name="" class="form-control">
                                                                    <option selected>Select user</option>
                                                                    <option value="1">Sam Oun</option>
                                                                    <option value="2">Sokvebol</option>
                                                                    <option value="3">Haoch</option>
                                                                    <option value="4">Kimsien</option>
                                                                    <option value="5">Choam</option>
                                                                </select>
                                                            </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-2"></div>
                                                        <div class="col-9">
                                                            <textarea name="" class="form-control" id="" cols="15" rows="4">Kola</textarea>
            
                                                        </div>
                                                    </div>            
                
                                        </form>
                                    </div>
                                   
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Concel</button>
                                    </div>
                
                                </div>
                            </div>
                        </div>
                              </div>
            </div>
            <div class="card-footer">
            </div>
          </div>
        </div>
@endsection