@extends('templates.template')
@section('template')

<div class="row">
    <!-- Area Chart -->
    <div class="col-xl-12 col-lg-12">
        <button type="button" class="mr-4 btn btn-primary btn-sm float-right" data-toggle="modal"
            data-target="#collectiveModal">
            Create New Task
        </button>
        <br>
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#collective" role="tab"
                    aria-controls="collective" aria-selected="true">Tasks Assigned to me</a>
                <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#collective" role="tab"
                    aria-controls="collective" aria-selected="false">Tasks Assigned to Other</a>
            </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="collective" role="tabpanel" aria-labelledby="nav-home-tab">

                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class=" py-3 d-flex flex-row align-items-center justify-content-between float-right"></div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="form-check customize">
                            <input type="checkbox" id="Completed" class="form-check-input"><label
                                class="form-check-label" for="Completed">Show Completed task</label>
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
                                @foreach ($individuals as $individual)
                                <tr>
                                    <td>
                                        <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                            data-id="{!!$individual->id!!}">
                                            <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                        </a>
                                        <a href="#" id="editTask" data-toggle="modal" data-target="#editIndividual"
                                            data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                            data-due="{!!$individual->due_date!!}" data-category="{!!$individual->category->id!!}"
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
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="Title">
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
                                                    <input type="text" name="due_date" id="flatpickr_datetime"
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
                                            {{-- <div class="form-group row">
                                                    <label class="col-sm-3 col-form-label">Workload</label>
                                                    <div class="col-sm-5">
                                                        <input type="number" placeholder="0.5" class="form-control">
                                                    </div><span class="col-sm-4 col-form-label text-secondary">(in man-days)</span>
                                            </div> --}}
                                            {{-- individule task --}}
                                            <fieldset class="form-group">
                                                <div class="row">
                                                    <legend class="col-form-label col-sm-3 pt-0">Private</legend>
                                                    <div class="col-sm-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="type"
                                                                id="gridRadios3" checked value="p">
                                                            <label class="form-check-label"
                                                                for="gridRadios3">Yes</label>
                                                        </div>

                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="type"
                                                                id="gridRadios4" value="i">
                                                            <label class="form-check-label" for="gridRadios4">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>

                                            {{-- colllective --}}
                                            {{-- <div class="form-group">
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
                                        </div> --}}
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
                                                            <option value="{!!$category->id!!}">{!!$category->name!!}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Due date</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="due_date" id="flatpickr_datetime"
                                                        class="due form-control flatpickr"value="">
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
                                            {{-- <div class="form-group row">
                                                <label class="col-sm-3 col-form-label">Workload</label>
                                                <div class="col-sm-5">
                                                    <input type="number" placeholder="0.5" class="form-control">
                                                </div><span class="col-sm-4 col-form-label text-secondary">(in
                                                    man-days)</span>
                                            </div> --}}
                                            <fieldset class="form-group">
                                                <div class="row">
                                                    <legend class="col-form-label col-sm-3 pt-0">Private</legend>
                                                    <div class="col-sm-9">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="gridRadios" id="gridRadios1" value="p" >
                                                            <label class="form-check-label"
                                                                for="gridRadios1">Yes</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio"
                                                                name="gridRadios" id="gridRadios2" checked value="i">
                                                            <label class="form-check-label" for="gridRadios2">No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row hideShow">
                                                <label class="col-sm-3 col-form-label">Assigned to</label>
                                                <div class="col-sm-9">
                                                    <select name="assign" id="assign" class="form-control">
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
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">No</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>
        </div>
        {{-- card collective  --}}
        <div class="tab-pane fade" id="collective" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class=" py-3 d-flex flex-row align-items-center justify-content-between"></div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="form-check customize">
                        <input type="checkbox" id="Completed" class="form-check-input"><label class="form-check-label"
                            for="Completed">Show Completed task</label>
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

                        </tbody>
                    </table>

                    {{-- Task assign to Other      --}}
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
                                                <input type="text" class="form-control" value="Laravel Last Homework"
                                                    placeholder="Title">
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
                                                <input type="text" id="flatpickr_datetime"
                                                    class="form-control flatpickr" placeholder="Select Date Time..">
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-5">
                                                <select name="" class="form-control">
                                                    <option value="Open">Open</option>
                                                    <option value="Completed">Completed</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Workload</label>
                                            <div class="col-sm-5">
                                                <input type="number" placeholder="0.5" class="form-control">
                                            </div><span class="col-sm-4 col-form-label text-secondary">(in
                                                man-days)</span>
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
                                                    <option value="">Hoach</option>
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
                    <div class="modal fade" id="deleteModal2" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No
                                        </button>
                                        <button type="submit" class="btn btn-danger">OK</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- {{-- jquery --}} -->
                    <script>
                        $('#deleteModal2').on('show.bs.modal', function (event) {
                            var button = $(event.relatedTarget)
                            var id = button.data('id')
                            var title = button.data('title')
                            var description = button.data('description')
                            var modal = $(this)
                            modal.find('#text').text(title)
                            modal.find('#description').text(description)
                            var url = "{{url('posts')}}/" + id
                            $('#delete').attr('action', url)
                        })
                    </script>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
</div>
<script>
    // Individual Task Only
    $('#deleteIndividual').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('#deleteIn').attr('action', 'task/' + id)
    })

    // Edit Individual Task
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
        modal.find('#name').attr('value',name);
        modal.find('#category').val(category);
        modal.find('.due').attr('value',due);
        modal.find('#status').val(status);
        modal.find('#editP').attr('action', 'private/' + id)
    })
</script>
@endsection