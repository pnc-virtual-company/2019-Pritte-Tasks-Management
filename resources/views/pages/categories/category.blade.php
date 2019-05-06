@extends('templates.template')
@section('template')
    {{-- Code Here --}}
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">List of category</h1>
    </div>

    <div class="row">

        <div class="col-xl-12 col-lg-12">
          <div class="card shadow mb-4">
            <div class="card-body">
                <table id="dataTable" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                            </tr>
                        </thead>
                        <tbody>
<<<<<<< HEAD
<<<<<<< HEAD
                            @foreach ($category as $item)
                            <tr>
                                
=======
                            <tr>
>>>>>>> facbfeee901dde6456e05e96d6dbe483faffc969
=======
                            @foreach ($category as $item)
                            <tr>
                                
>>>>>>> d6ade5ed2fcc77b6b215248631747309d5662f52
                                <td>
                                    <a href="#deleteModal" data-toggle="modal" >
                                        <i class="material-icons text-danger">delete</i>
                                    </a>
                                    <a href="#" data-toggle="modal" data-target="#editModal">
                                        <i class="material-icons">edit</i>
                                    </a>
<<<<<<< HEAD
<<<<<<< HEAD
                                    {{$item->id}}
                                </td>
                                <td>{{$item->name}} </td>
                            </tr>
                            @endforeach
=======
                                    1
=======
                                    {{$item->id}}
>>>>>>> d6ade5ed2fcc77b6b215248631747309d5662f52
                                </td>
                                <td>{{$item->name}} </td>
                            </tr>
<<<<<<< HEAD
>>>>>>> facbfeee901dde6456e05e96d6dbe483faffc969
=======
                            @endforeach
>>>>>>> d6ade5ed2fcc77b6b215248631747309d5662f52
                        </tbody>
                    </table>
                <!-- The create Modal -->
        <div class="modal fade" id="createModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Create new category</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body"><br>
<<<<<<< HEAD
<<<<<<< HEAD
                        <form action="category" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <input type="text" name="category" required class="form-control">
                                </div>
                            </div>
                            
                        <br>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Category</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal delete -->
    <div class="modal fade" id="deleteModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="#">
                            <div class="form-group row">
                               <p>   Are you sure that you want to delete this category</p>
                            </div>
                        </form>
                        <form action="#" id="delete" method="POST">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Yes </button>
                                <button type="submit" class="btn btn-danger">No</button>
                            </div>
                        </form>
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
                    <h4 class="modal-title">Edit category</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body"><br>
                    <form action="#">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </form><br>
                    <form action="#" id="delete" method="POST">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok </button>
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="card-footer">
         <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                <i class="material-icons bg-whitez">add_circle</i>
                Create category
            </button>
        </div>
=======
                        <form action="#">
=======
                        <form action="category" method="POST">
                            @csrf
                            @method('POST')
>>>>>>> d6ade5ed2fcc77b6b215248631747309d5662f52
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <input type="text" name="category" required class="form-control">
                                </div>
                            </div>
                            
                        <br>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Category</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    <!-- modal delete -->
    <div class="modal fade" id="deleteModal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="#">
                            <div class="form-group row">
                               <p>   Are you sure that you want to delete this category</p>
                            </div>
                        </form>
                        <form action="#" id="delete" method="POST">
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Yes </button>
                                <button type="submit" class="btn btn-danger">No</button>
                            </div>
                        </form>
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
                    <h4 class="modal-title">Edit category</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body"><br>
                    <form action="#">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </form><br>
                    <form action="#" id="delete" method="POST">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Ok </button>
                            <button type="submit" class="btn btn-danger">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
        <div class="card-footer">
         <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                <i class="material-icons bg-whitez">add_circle</i>
                Create category
            </button>
        </div>
>>>>>>> facbfeee901dde6456e05e96d6dbe483faffc969
</div>
@endsection