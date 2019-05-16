@extends('templates.template')
@section('template')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Private Task</h1>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                    Create New Tasks
                </button>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <form action="" class="text-center">
                    <input type="checkbox" name="complete" value="1" id="check1"> <label for="check1"> Show completed task</label>
                </form>
                <table id="dataTable2" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Title</th>
                            <th>Due date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($privates as $task)
                            <tr>
                                <td>
                                    <a href="#" data-id=" {!! $task->id !!} " data-toggle="modal" class="text-danger" data-target="#deletePrivate"
                                        title="view"><i class="mdi mdi-delete clickable text-danger delete-icon"></i></a>
                                    <a href="#" data-toggle="modal" class="text-primary" data-target="#editmyModal"
                                        title="edit"><i class="mdi mdi-pencil text-primary clickable"></i></a>
                                        <span>{!! $task->id !!}</span>
                                    </td>
                                <td> {!! $task->category->name !!} </td>
                                <td> {!! $task->name !!} </td>
                                <td> {!! $task->due_date !!} </td>
                                <td> {!! $task->status !!} </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                <!-- The Create Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Create a new task</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" method="POST">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" class="form-control" placeholder="Title">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="category">Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="category" name="category">
                                                @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" @if (!empty(old('categories'))) @if(in_array($category->id,
                                                    old('categories'))) selected @endif @endif>{!! $category->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Due date</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="due" id="flatpickr_datetime" class="form-control flatpickr" placeholder="Select Due Date">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Create Private Task</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Concel</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Delete Private Modal --}}
                <div class="modal fade" id="deletePrivate">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Confirmation!</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="form-group row">
                                    <p> Are you sure that you want to delete this task?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="" id="deleteTask" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                                    </form>
                                </div>
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
                                <h4 class="modal-title">Edit Task</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="#">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">ID </label>
                                        <div class="col-sm-10">
                                            21
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" placeholder="Cooking">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select name="" class="form-control">
                                                <option>Choose category...</option>
                                                <option selected value="1">Club</option>
                                                <option value="2">Football Club</option>
                                                <option value="3">read the book</option>
                                                <option value="4">cleaning</option>
                                                <option value="5">teach</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Due date</label>
                                        <div class="col-sm-8">
                                            <input type="text" value="04/26/2019 3:30pm" class="form-control">
                                        </div>
                                        <i class="material-icons inline col-form-label text-info">
                                            <i class='fas fa-calendar-alt'></i>
                                        </i>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <select name="" class="form-control">
                                                <option selected>Open</option>
                                                <option value="1">Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button>
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Concel</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="card-footer">
            </div>
        </div>
    </div>
</div>
<script>
    $('#deletePrivate').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('#deleteTask').attr('action', 'private/' + id)
    })
</script>
@endsection