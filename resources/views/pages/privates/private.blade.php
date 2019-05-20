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
                    <input type="checkbox" name="complete" id="check1">
                    <label for="check1" id="checked">Show completed task</label>
                </form>
                <span id="alls" style="display: none;">

                <table id="dataTable7" class="table table-striped table-bordered" style="width:100%;">
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
                        @foreach ($allPrivates as $tasks)
                            <tr>
                                <td>
                                    <a href="#" data-id=" {!! $tasks->id !!} " data-toggle="modal" class="text-danger" data-target="#deletePrivate"
                                        title="view"><i class="mdi mdi-delete clickable text-danger delete-icon"></i></a>
                                    <a href="#" data-toggle="modal" class="text-primary"
                                        data-id="{!! $tasks->id !!}" data-category="{!! $tasks->category->id !!}"
                                        data-name="{!! $tasks->name !!}" data-due=" {!! $tasks->due_date !!}" 
                                        data-status="{!! $tasks->status !!}" data-target="#editPrivate"
                                        title="edit"><i class="mdi mdi-pencil text-primary clickable"></i></a>
                                        <span>{!! $tasks->id !!}</span>
                                    </td>
                                <td> {!! $tasks->category->name !!} </td>
                                <td> {!! $tasks->name !!} </td>
                                <td> {!! $tasks->due_date !!} </td>
                                <td> {!! $tasks->status !!} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                </span>
                <span id="opens">
                    <table id="dataTable2" class="table table-striped table-bordered" style="width:100%;">
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
                                    <a href="#" data-toggle="modal" class="text-primary"
                                        data-id="{!! $task->id !!}" data-category="{!! $task->category->id !!}"
                                        data-name="{!! $task->name !!}" data-due=" {!! $task->due_date !!}" 
                                        data-status="{!! $task->status !!}" data-target="#editPrivate"
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
            </span>

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
                                            <select class="form-control" name="category">
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
                <div class="modal fade" id="editPrivate">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Task</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="" id="editP" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">ID </label>
                                        <div class="col-sm-10">
                                            <span id="id"></span>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Title</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="name" name="name" class="form-control" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                                <select name="category"  id="category" class="form-control" id="">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{!! $category->name !!}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Due date</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="due" id="flatpickr_datetime" class="due form-control flatpickr" value="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-9">
                                            <span id="status">
                                                <select name="status" class="form-control"id="status">
                                                    <option value="Open">Open</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </span>
                                        </div>
                                    </div>
                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Edit Task</button>
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

    // Edit Private Task
    $('#editPrivate').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var category = button.data('category')
        var name = button.data('name')
        var due = button.data('due')
        var status = button.data('status')
        var modal = $(this)
        modal.find('#id').html(id);
        modal.find('#name').attr('value',name);
        modal.find('#category').val(category);
        modal.find('.due').attr('value',due);
        modal.find('#status').val(status);
        modal.find('#editP').attr('action', 'private/' + id)
    })
</script>

@endsection