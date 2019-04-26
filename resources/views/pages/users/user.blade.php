@extends('templates.template')
@section('template')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List Users</h1>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-7">
          <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
               <button type="button" class="btn btn-primary" href="#" data-toggle="modal" data-target="#createModal">Add a new user</button>
                <a class="btn btn-success" href="http://localhost/2019-Pritte-Tasks-Management/public/users/export" download>Export
                    to Excel</a> 
                </div>
            <!-- Card Body -->
            <div class="card-body">

    <table id="dataTable"  class="table order-table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <a href="#" data-toggle="modal" class="text-success" data-target="#visibilityModal"><i class="material-icons"
                            data-id="1" title="delete the user">visibility</i></a>
                    <a href="#" data-toggle="modal" class="text-primary" data-target="#editModal" title="edit"><i
                            class="material-icons">edit</i></a>
                    <a href="#" data-toggle="modal" class="text-danger" data-target="#deleteModal" title="view"><i
                            class="material-icons">delete</i></a>
                    <span>1</span>
                </td>
                <td>Haoch Chirata</td>
                <td>f</td>
                <td>litahong@gmail.com</td>
                <td>Admin</td>
            </tr>
            <tr>
                <td>
                    <a href="#" data-toggle="modal" class="text-success" data-target="#visibilityModal"><i class="material-icons"
                            data-id="1" title="delete the user">visibility</i></a>
                    <a href="#" data-toggle="modal" class="text-primary" data-target="#editModal" title="edit"><i
                            class="material-icons">edit</i></a>
                    <a href="#" data-toggle="modal" class="text-danger" data-target="#deleteModal" title="view"><i
                            class="material-icons">delete</i></a>
                    <span>2</span>
                </td>
                <td>Kimsien</td>
                <td>f</td>
                <td>litahong@gmail.com</td>
                <td>Normal</td>
            </tr>
        </tbody>
    </table>
    {{-- create modal --}}
    <div class="modal fade" id="createModal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create new user</h4>
                </div>

                <!-- Modal body -->
                <div class="modal-body"><br>
                    <form action="#">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Firstname</label>
                            <div class="col-sm-9">
                                <input type="text" id="firstname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Lastname</label>
                            <div class="col-sm-9">
                                <input type="text" id="lastname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" id="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" id="password" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-9">
                                <input type="text" id="gender" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Avata</label>
                            <div class="col-sm-9">
                                <input type="file" id="avata" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="">Role</label>
                            <select class="col-sm-9 form-control" name="" id="">
                                <option value="">Select Role</option>
                                <option value="">Admin</option>
                                <option value="">Normal</option>
                            </select>
                        </div>

                    </form><br>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                </div>

            </div>
        </div>
    </div>
</div>
{{-- visibility modal --}}
<div class="modal fade" id="visibilityModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">View user</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body"><br>
                <form action="#">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" id="id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Firstname</label>
                        <div class="col-sm-10">
                            <input type="text" id="firstname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lastname</label>
                        <div class="col-sm-10">
                            <input type="text" id="lastname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">password</label>
                        <div class="col-sm-10">
                            <input type="text" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">gender</label>
                        <div class="col-sm-10">
                            <input type="text" id="gender" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">avata</label>
                        <div class="col-sm-10">
                            <input type="text" id="avata" class="form-control">
                        </div>
                    </div>

                </form><br>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>

        </div>
    </div>
</div>
</div>
{{-- edit modal --}}
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edite user</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body"><br>
                <form action="#">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="number" id="id" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Firstname</label>
                        <div class="col-sm-10">
                            <input type="text" id="firstname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lastname</label>
                        <div class="col-sm-10">
                            <input type="text" id="lastname" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">email</label>
                        <div class="col-sm-10">
                            <input type="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">password</label>
                        <div class="col-sm-10">
                            <input type="text" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">gender</label>
                        <div class="col-sm-10">
                            <input type="text" id="gender" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">avata</label>
                        <div class="col-sm-10">
                            <input type="text" id="avata" class="form-control">
                        </div>
                    </div>

                </form><br>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>

        </div>
    </div>
</div>
</div>
{{-- delete modal --}}
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Delete user</h4>
            </div>

            <!-- Modal body -->
            <div class="modal-body"><br>
                <p>Are you sure that you want to delte this user?</p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Ok</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>
</div>

@endsection