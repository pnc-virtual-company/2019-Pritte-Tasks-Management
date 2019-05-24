@extends('templates.template')
@section('template')

<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <button type="button" class="mr-4 btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#collectiveModal">
            Create New Task
        </button>
        <br>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-assign-tab" data-toggle="tab" href="#nav-assign" role="tab"
                    aria-controls="nav-assign" aria-selected="true">Tasks assigned to me</a>
                <a class="nav-item nav-link" id="nav-creator-tab" data-toggle="tab" href="#nav-creator" role="tab"
                    aria-controls="nav-creator" aria-selected="false">Tasks assigned to other</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-assign" role="tabpanel" aria-labelledby="nav-assign-tab">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class=" py-3 d-flex flex-row align-items-center justify-content-between float-right"></div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="form-check customize">
                            <input type="checkbox" id="check1" class="form-check-input">
                            <label for="check1" id="checked">Show Completed task</label>
                        </div>
                        <span id="alls" style="display:none;">
                            <table id="dataTable" class="table table-striped table-bordered" style="width:100%;">
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
                                    @foreach ($allIndividuals as $individual)
                                    <tr>
                                        <td>
                                            <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                                data-id="{!!$individual->id!!}">
                                                <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                            </a>
                                            <a href="#" id="editTask" data-toggle="modal" data-target="#editAssign"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-assign="@foreach ($individual->users as $user) {{$user->id}} @endforeach">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                            </a> <span>{!!$individual->id!!}</span>
                                        </td>
                                        <td>{!!$individual->user->name!!}</td>
                                        <td>{!!$individual->category->name!!}</td>
                                        <td>{!!$individual->name!!}</td>
                                        <td>{!!$individual->due_date!!}</td>
                                        <td>
                                            @foreach ($individual->users as $user)
                                            {{$user->name}}
                                            @endforeach
                                        </td>
                                        <td>{!!$individual->status!!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </span>
                        <span id="opens">
                            <table id="dataTable6" class="table table-striped table-bordered" style="width:100%">
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
                                    @foreach ($individuals as $individual)
                                    <tr>
                                        <td>
                                            <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                                data-id="{!!$individual->id!!}">
                                                <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                            </a>
                                            <a href="#editAssign" id="editTask" data-toggle="modal" data-target="#editAssign"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-assign="@foreach ($individual->users as $user) {{$user->id}} @endforeach">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                            </a> <span>{!!$individual->id!!}</span>
                                        </td>
                                        <td>{!!$individual->user->name!!}</td>
                                        <td>{!!$individual->category->name!!}</td>
                                        <td>{!!$individual->name!!}</td>
                                        <td>{!!$individual->due_date!!}</td>
                                        <td>
                                            @foreach ($individual->users as $user)
                                            {{$user->name}}
                                            @endforeach
                                        </td>
                                        <td>{!!$individual->status!!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </span>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="nav-creator" role="tabpanel" aria-labelledby="nav-creator-tab">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <br>
                        <div class="form-check customize">
                            <input type="checkbox" id="check2" class="form-check-input">
                            <label for="check2" id="checkeds">Show Completed task</label>
                        </div>
                        <span id="allsC" style="display:none;">
                            <table id="dataTable10" class="table table-striped table-bordered" style="width:100%;">
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
                                    @foreach ($allCreators as $individual)
                                    <tr>
                                        <td>
                                            <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                                data-id="{!!$individual->id!!}">
                                                <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                            </a>
                                            <a href="#" id="editTask" data-toggle="modal" data-target="#editIndividual"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-assign="@foreach ($individual->users as $user) {{$user->id}} @endforeach">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                            </a> <span>{!!$individual->id!!}</span>
                                        </td>
                                        <td>{!!$individual->user->name!!}</td>
                                        <td>{!!$individual->category->name!!}</td>
                                        <td>{!!$individual->name!!}</td>
                                        <td>{!!$individual->due_date!!}</td>
                                        <td>
                                            @foreach ($individual->users as $user)
                                            {{$user->name}}
                                            @endforeach
                                        </td>
                                        <td>{!!$individual->status!!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </span>
                        <span id="opensC">
                            <table id="dataTable11" class="table table-striped table-bordered" style="width:100%">
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
                                    @foreach ($creators as $individual)
                                    <tr>
                                        <td>
                                            <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                                data-id="{!!$individual->id!!}">
                                                <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                            </a>
                                            <a href="#" id="editTask" data-toggle="modal" data-target="#editIndividual"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-assign="@foreach ($individual->users as $user) {{$user->id}} @endforeach">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                            </a> <span>{!!$individual->id!!}</span>
                                        </td>
                                        <td>{!!$individual->user->name!!}</td>
                                        <td>{!!$individual->category->name!!}</td>
                                        <td>{!!$individual->name!!}</td>
                                        <td>{!!$individual->due_date!!}</td>
                                        <td>
                                            @foreach ($individual->users as $user)
                                            {{$user->name}}
                                            @endforeach
                                        </td>
                                        <td>{!!$individual->status!!}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        {{-- create modal in Task assign to me --}}

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
                        <form action="{{url('task')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" required class="form-control" name="name" placeholder="Title">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="category" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{!!$category->id!!} ">{!!$category->name!!}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Due date</label>
                                <div class="col-sm-9">
                                    <input type="text" required name="due_date" id="flatpickr_datetime"
                                        class="form-control flatpickr" placeholder="Select Date Time..">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" class="form-control">
                                        <option value="Open" selected>Open</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Private</legend>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios3"
                                                checked value="p">
                                            <label class="form-check-label" for="gridRadios3">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios4"
                                                value="i">
                                            <label class="form-check-label" for="gridRadios4">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row hideShow">
                                <label class="col-sm-3 col-form-label">Assigned to</label>
                                <div class="col-sm-9">
                                    <select name="assign" class="form-control">
                                        @foreach ($users as $user)
                                        <option value="{!!$user->id!!} ">{!!$user->name!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Attachments</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control-file" name="file">
                                </div>
                            </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Create Task</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>

        <!-- modal for edit -->

        <div class="modal fade" id="editAssign">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Tasks</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="editInA" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ID </label>
                                <div class="col-sm-9">
                                    <span id="idA"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Created By</label>
                                <div class="col-sm-9">
                                    <span id="createdA"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" id="nameA" class="form-control" name="name" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="category" id="category" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{!!$category->id!!}">{!!$category->name!!}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Due date</label>
                                <div class="col-sm-9">
                                    <input type="text" name="due" id="flatpickr_datetime"
                                        class="dueA form-control flatpickr" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" id="statusA" class="form-control">
                                        <option value="Open">Open</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Private</legend>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios1"
                                                value="p">
                                            <label class="form-check-label" id="yes" for="gridRadios1">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios2"
                                                checked value="i">
                                            <label class="form-check-label" id="no" for="gridRadios2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row hideShows">
                                <label class="col-sm-3 col-form-label">Assigned to</label>
                                <div class="col-sm-9">
                                    <select name="assigned" id="assignA" class="form-control">
                                        @foreach ($users as $user)
                                        <option value="{!!$user->id!!} ">{!!$user->name!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Attachments</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control-file" name="file">
                                </div>
                            </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit Task</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Assign --}}
        <div class="modal fade" id="editIndividual">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Task</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="editIn" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">ID </label>
                                <div class="col-sm-9">
                                    <span id="id"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Created By</label>
                                <div class="col-sm-9">
                                    <span id="created"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" id="name" class="form-control" name="name" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="category" id="category" class="form-control">
                                        @foreach ($categories as $category)
                                        <option value="{!!$category->id!!}">{!!$category->name!!}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Due date</label>
                                <div class="col-sm-9">
                                    <input type="text" name="due" id="flatpickr_datetime"
                                        class="due form-control flatpickr" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="status" id="status" class="form-control">
                                        <option value="Open">Open</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Private</legend>
                                    <div class="col-sm-9">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios1"
                                                value="p">
                                            <label class="form-check-label" id="yes" for="gridRadios1">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="type" id="gridRadios2"
                                                checked value="i">
                                            <label class="form-check-label" id="no" for="gridRadios2">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row hideShows">
                                <label class="col-sm-3 col-form-label">Assigned to</label>
                                <div class="col-sm-9">
                                    <select name="assigned" id="assign" class="form-control">
                                        @foreach ($users as $user)
                                        <option value="{!!$user->id!!} ">{!!$user->name!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Attachments</label>
                                <div class="col-sm-7">
                                    <input type="file" class="form-control-file" name="file">
                                </div>
                            </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit Task</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!---------------------------- model delete -------------------------------------->
        <div class="modal fade" id="deleteIndividual">
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
                            <form action="" id="deleteIn" method="POST">
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
        <div class="card-footer">
            {{-- Card Footer --}}
        </div>
    </div>
</div>
<script>
  $(function() {
    $('#dataTable10').DataTable();
    $('#dataTable11 ').DataTable();
  })
    // Individual Task Only
    $('#deleteIndividual').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('#deleteIn').attr('action', 'task/' + id)
    })

    // Edit Individual Task
    $('#editAssign').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var category = button.data('category')
        var name = button.data('name')
        var creator = button.data('creator')
        var due = button.data('due')
        var assign = button.data('assign')
        var status = button.data('status')
        var modal = $(this)
        modal.find('#idA').html(id);
        modal.find('#createdA').html(creator);
        modal.find('#nameA').attr('value', name);
        modal.find('#categoryA').val(category);
        modal.find('.dueA').attr('value', due);
        modal.find('#statusA').val(status);
        modal.find('#editInA').attr('action', 'task/' + id);
    })
    $('#editIndividual').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var category = button.data('category')
        var name = button.data('name')
        var creator = button.data('creator')
        var due = button.data('due')
        var assign = button.data('assign')
        var status = button.data('status')
        var modal = $(this)
        modal.find('#id').html(id);
        modal.find('#created').html(creator);
        modal.find('#name').attr('value', name);
        modal.find('.due').attr('value',due);
        modal.find('#category').val(category);
        modal.find('#status').val(status);
        modal.find('#editIn').attr('action', 'task/' + id);
    })
</script>
@endsection