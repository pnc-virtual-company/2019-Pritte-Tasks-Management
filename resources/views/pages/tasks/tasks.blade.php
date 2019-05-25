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
                                        <th><i class="mdi mdi-clock clickable text-primary"></i></th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allIndividuals as $individual)
                                    <tr>
                                        <td>
                                            @if ($individual->type == 'p')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#deletePrivate"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            @if ($individual->type == 'c')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            @if ($individual->type == 'i')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            
                                            @if ($individual->type == 'p')
                                            <a href="#" id="editTask" data-toggle="modal" data-target="#editPrivate"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                            </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                                @if ($individual->type == 'c')
                                                <a href="#" id="editTask" data-toggle="modal" data-target="#editAssign"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                                </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                            @if ($individual->type == 'i')
                                                <a href="#" id="editTask" data-toggle="modal" data-target="#editAssign"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                                </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                        </td>
                                        <td>{!!$individual->user->name!!}</td>
                                        <td>{!!$individual->category->name!!} </td>
                                        <td>
                                            @if ($individual->type == 'p')
                                                {!!$individual->name!!}<i class="mdi mdi-lock float-right"></i>
                                            @endif
                                            @if ($individual->type == 'c')
                                                {!!$individual->name!!}<i class="mdi mdi-link-variant float-right"></i>
                                            @endif
                                            @if ($individual->type == 'i')
                                                {!!$individual->name!!}
                                            @endif
                                        </td>
                                        <td>{!!$individual->due_date!!}</td>
                                        <td>
                                            {{$individual->users()->get()->pluck('name')->implode('')}}
                                        </td>
                                        <td>{!!$individual->md!!}</td>
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
                                        <th><i class="mdi mdi-clock clickable text-primary"></i></th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($individuals as $individual)
                                    <tr>
                                        <td>
                                                @if ($individual->type == 'p')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#deletePrivate"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            @if ($individual->type == 'c')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            @if ($individual->type == 'i')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            
                                            @if ($individual->type == 'p')
                                            <a href="#" id="editTask" data-toggle="modal" data-target="#editPrivate"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                            </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                                @if ($individual->type == 'c')
                                                <a href="#" id="editTask" data-toggle="modal" data-target="#editAssign"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                                </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                            @if ($individual->type == 'i')
                                                <a href="#" id="EditForHideGroup" data-toggle="modal" data-target="#editGetIndividual"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                                </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                        </td>
                                        <td>{!!$individual->user->name!!}</td>
                                        <td>{!!$individual->category->name!!} </td>
                                        <td>
                                            @if ($individual->type == 'p')
                                                {!!$individual->name!!}<i class="mdi mdi-lock float-right"></i>
                                            @endif
                                            @if ($individual->type == 'c')
                                                {!!$individual->name!!}<i class="mdi mdi-link-variant float-right"></i>
                                            @endif
                                            @if ($individual->type == 'i')
                                                {!!$individual->name!!}
                                            @endif
                                        </td>
                                        <td>{!!$individual->due_date!!}</td>
                                        <td>
                                            {{$individual->users()->get()->pluck('name')->implode(', ')}}
                                        </td>
                                        <td>{!!$individual->md!!}</td>
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
                                        <th><i class="mdi mdi-clock clickable text-primary"></i></th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($allCreators as $individual)
                                    <tr>
                                        <td>
                                                @if ($individual->type == 'p')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#deletePrivate"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            @if ($individual->type == 'c')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            @if ($individual->type == 'i')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            
                                            @if ($individual->type == 'p')
                                            <a href="#" id="editTask" data-toggle="modal" data-target="#editPrivate"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                            </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                                @if ($individual->type == 'c')
                                                <a href="#" id="EditForHideGroup" data-toggle="modal" data-target="#editAssignIndividual"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                                </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                            @if ($individual->type == 'i')
                                                <a href="#" id="EditForHideGroup" data-toggle="modal" data-target="#editAssignIndividual"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                                </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                        </td>
                                        <td>{!!$individual->user->name!!}</td>
                                        <td>{!!$individual->category->name!!}</td>
                                        <td>
                                                @if ($individual->type == 'p')
                                                    {!!$individual->name!!}<i class="mdi mdi-lock float-right"></i>
                                                @endif
                                                @if ($individual->type == 'c')
                                                    {!!$individual->name!!}<i class="mdi mdi-account-switch float-right"></i>
                                                @endif
                                                @if ($individual->type == 'i')
                                                    {!!$individual->name!!}
                                                @endif
                                            </td>
                                        <td>{!!$individual->due_date!!}</td>
                                        <td>
                                            {{$individual->users()->get()->pluck('name')->implode('')}}
                                        </td>
                                        <td>{!!$individual->md!!}</td>
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
                                        <th><i class="mdi mdi-clock clickable text-primary"></i></th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($creators as $individual)
                                    <tr>
                                        <td>
                                                @if ($individual->type == 'p')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#deletePrivate"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            @if ($individual->type == 'c')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#deleteIndividual"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            @if ($individual->type == 'i')
                                                <a href="#deleteModal" data-toggle="modal" data-target="#"
                                                    data-id="{!!$individual->id!!}">
                                                    <i class="mdi mdi-delete clickable text-danger delete-icon"></i>
                                                </a>
                                            @endif
                                            
                                            @if ($individual->type == 'p')
                                            <a href="#" id="editTask" data-toggle="modal" data-target="#editPrivate"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                            </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                                @if ($individual->type == 'c')
                                                <a href="#" id="EditForAssignGroup" data-toggle="modal" data-target="#editAssignIndividual"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                                </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                            @if ($individual->type == 'i')
                                                <a href="#" id="EditForAssignGroup" data-toggle="modal" data-target="#editAssignIndividual"
                                                data-id="{!!$individual->id!!}" data-name="{!!$individual->name!!}"
                                                data-due="{!!$individual->due_date!!}"
                                                data-category="{!!$individual->category->id!!}"
                                                data-creator="{!!$individual->user->name!!}"
                                                data-status="{!!$individual->status!!}"
                                                data-workload="{!!$individual->md!!}"
                                                data-assign="{{$individual->users()->get()->pluck('id')->implode('')}}">
                                                <i class="mdi mdi-pencil clickable text-primary delete-icon"></i>
                                                </a> <span>{!!$individual->id!!}</span>
                                            @endif
                                        </td>
                                        <td>{!!$individual->user->name!!}</td>
                                        <td>{!!$individual->category->name!!}</td>
                                        <td>
                                            @if ($individual->type == 'p')
                                                {!!$individual->name!!}<i class="mdi mdi-lock float-right"></i>
                                            @endif
                                            @if ($individual->type == 'c')
                                                {!!$individual->name!!}<i class="mdi mdi-account-switch float-right"></i>
                                            @endif
                                            @if ($individual->type == 'i')
                                                {!!$individual->name!!}
                                            @endif
                                        </td>
                                        <td>{!!$individual->due_date!!}</td>
                                        <td>
                                            @if ($individual->type == 'c')
                                                {{$individual->groups()->get()->pluck('name')->implode(', ')}}
                                            @else
                                                {{$individual->users()->get()->pluck('name')->implode(', ')}}
                                            @endif
                                        </td>
                                        <td>{!!$individual->md!!}</td>
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

        {{-- Create Task --}}

        <div class="modal fade" id="collectiveModal">
            <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                            <option value="{!!$category->id!!} ">{!!$category->name!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Due date</label>
                                <div class="col-sm-9">
                                    <input type="text" required name="due_date" id="flatpickr_datetime" class="form-control flatpickr" placeholder="Select Date Time..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Workload</label>
                                <div class="col-sm-7">
                                    <input type="text" required class="form-control" name="manday" placeholder="0.5 or 1">
                                </div>
                                <span>(in man day)</span>
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
                                            <input class="form-check-input" type="radio" name="type" id="privateYes"
                                                checked value="p">
                                            <label class="form-check-label" id="privateYes" for="privateYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="privateNo"
                                                value="i">
                                            <label class="form-check-label" id="privateNo" for="privateNo">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group showCollective">
                                <div class="row">
                                    <label for="" class="col-form-label col-sm-3 pt-0">Collective Task</label>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="collectives" class="form-check-input" id="collectiveYes" value="Yes">
                                            <label for="collectiveYes" id="collectiveYes" class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="collectives" class="form-check-input" id="collectiveNo" value="No">
                                            <label for="collectiveNo" id="collectiveNo" class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row showAssignUser">
                                <label class="col-sm-3 col-form-label">Assigned to</label>
                                <div class="col-sm-9">
                                    <select name="assign" class="form-control">
                                        @foreach ($users as $user)
                                        <option value="{!!$user->id!!}">{!!$user->name!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row showAssignGroup">
                                <label class="col-sm-3 col-form-label">Assigned to</label>
                                <div class="col-sm-9">
                                    <select name="collective" class="form-control">
                                        @foreach ($groups as $group)
                                        <option value="{!!$group->id!!}">{!!$group->name!!}</option>
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
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
        {{-- Edit Private Task --}}
        <div class="modal fade" id="editPrivate">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Task</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="editPri" method="POST">
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
                                        <select name="category" id="category" class="form-control" id="">
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
                                <label class="col-sm-2 col-form-label">Workload</label>
                                <div class="col-sm-7">
                                    <input type="text" id="md" class="form-control" name="manday" value="">
                                </div>
                                <span>(in man day)</span>
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
                                <button type="button" class="btn btn-danger"data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        {{-- End Edit Private --}}

        {{-- Delete Private --}}
         <div class="modal fade" id="deletePrivate">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation!</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p> Are you sure that you want to delete this task?</p>
                        <div class="modal-footer">
                            <form action="" id="deletePri" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit the Individual Task -->
        <div class="modal fade" id="editIndividual">
            <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                    <input type="text" id="nameA" class="form-control" disabled name="names" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="categorys" id="categoryA" disabled class="form-control">
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
                                    <input type="text" name="dues" id="flatpickr_datetime"
                                        class="dueA form-control flatpickr" value="" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select name="statuss" id="statusA" class="form-control">
                                        <option value="Open">Open</option>
                                        <option value="Completed">Completed</option>
                                    </select>
                                </div>
                            </div>
                            <fieldset class="form-group">
                                <div class="row">
                                    <legend class="col-form-label col-sm-3 pt-0">Private</legend>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" disabled type="radio" name="type" id="privateYes"
                                                checked value="p">
                                            <label class="form-check-label" id="privateYes" for="privateYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" disabled type="radio" name="type" id="privateNo"
                                                value="i">
                                            <label class="form-check-label" id="privateNo" for="privateNo">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group showEditCollective">
                                    <div class="row">
                                        <label for="" class="col-form-label col-sm-3 pt-0">Collective Task</label>
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="collectives" class="form-check-input" id="collectiveYes" value="Yes">
                                                <label for="collectiveYes" id="collectiveYes" class="form-check-label">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="collectives" class="form-check-input" id="collectiveNo" value="No">
                                                <label for="collectiveNo" id="collectiveNo" class="form-check-label">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row EditAssignUser">
                                    <label class="col-sm-3 col-form-label">Assigned to</label>
                                    <div class="col-sm-9">
                                        <select name="assign" class="form-control">
                                            @foreach ($users as $user)
                                                <option value="{!!$user->id!!}">{!!$user->name!!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row EditAssignGroup">
                                    <label class="col-sm-3 col-form-label">Assigned to</label>
                                    <div class="col-sm-9">
                                        <select name="collective" class="form-control">
                                            @foreach ($groups as $group)
                                            <option value="{!!$group->id!!}">{!!$group->name!!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Attachments</label>
                                <div class="col-sm-7">
                                    <input type="file" disabled class="form-control-file" name="file">
                                </div>
                            </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Edit Task</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Individual Assign --}}
        <div class="modal fade" id="editAssignIndividual">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Task</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="" id="editIndiv" method="POST">
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
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="type" id="privateEditYes"
                                                checked value="p">
                                            <label class="form-check-label" id="privateEditYes" for="privateEditYes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" checked type="radio" name="type" id="privateEditNo"
                                                value="i">
                                            <label class="form-check-label" id="privateEditNo" for="privateEditNo">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="form-group showEditCollective">
                                <div class="row">
                                    <label for="" class="col-form-label col-sm-3 pt-0">Collective Task</label>
                                    <div class="col-sm-8">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="collectives" class="form-check-input" id="EditCollectiveYes" value="Yes">
                                            <label for="EditCollectiveYes" id="EditCollectiveYes" class="form-check-label">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="collectives" checked class="form-check-input" id="EditCollectiveNo" value="No">
                                            <label for="EditCollectiveNo" id="EditCollectiveNo"​  class="form-check-label">No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row showEditAssignUser">
                                <label class="col-sm-3 col-form-label">Assigned to</label>
                                <div class="col-sm-9">
                                    <select name="assign" id="user" class="form-control">
                                        @foreach ($users as $user)
                                        <option value="{!!$user->id!!}">{!!$user->name!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row showEditAssignGroup">
                                <label class="col-sm-3 col-form-label">Assigned to</label>
                                <div class="col-sm-9">
                                    <select name="collective" id="group" class="form-control">
                                        @foreach ($groups as $group)
                                        <option value="{!!$group->name!!}">{!!$group->name!!}</option>
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
                        <button type="submit" class="btn btn-primary">Edit Now</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Edit Individual Assign --}}
        <div class="modal fade" id="editGetIndividual">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Edit Task</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form action="" id="editIndiv" method="POST">
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
                                        <input type="text" disabled id="name" class="form-control" name="name" value="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Category</label>
                                    <div class="col-sm-9">
                                        <select name="category" disabled id="category" class="form-control">
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
                                        <input type="text" disabled name="due" id="flatpickr_datetime"
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
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled type="radio" name="type" id="privateEditYes"
                                                    checked value="p">
                                                <label class="form-check-label" id="privateEditYes" for="privateEditYes">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" disabled checked type="radio" name="type" id="privateEditNo"
                                                    value="i">
                                                <label class="form-check-label" id="privateEditNo" for="privateEditNo">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset class="form-group showEditCollective">
                                    <div class="row">
                                        <label for="" class="col-form-label col-sm-3 pt-0">Collective Task</label>
                                        <div class="col-sm-8">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="collectives" disabled class="form-check-input" id="EditCollectiveYes" value="Yes">
                                                <label for="EditCollectiveYes" id="EditCollectiveYes" class="form-check-label">Yes</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="collectives" disabled checked class="form-check-input" id="EditCollectiveNo" value="No">
                                                <label for="EditCollectiveNo" id="EditCollectiveNo"​  class="form-check-label">No</label>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                                <div class="form-group row showEditAssignUser">
                                    <label class="col-sm-3 col-form-label">Assigned to</label>
                                    <div class="col-sm-9">
                                        <select name="assign" id="user" disabled class="form-control">
                                            @foreach ($users as $user)
                                            <option value="{!!$user->id!!}">{!!$user->name!!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row showEditAssignGroup">
                                    <label class="col-sm-3 col-form-label">Assigned to</label>
                                    <div class="col-sm-9">
                                        <select name="collective" id="group" disabled class="form-control">
                                            @foreach ($groups as $group)
                                            <option value="{!!$group->name!!}">{!!$group->name!!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Attachments</label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control-file" disabled name="file">
                                    </div>
                                </div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Edit Now</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        <!---------------------------- model delete -------------------------------------->
        <div class="modal fade" id="deleteIndividual">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation!</h4>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <p> Are you sure that you want to delete this task?</p>
                        <div class="modal-footer">
                            <form action="" id="deleteIn" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-primary">Delete</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
    $('#dataTable11').DataTable();

  })

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
        modal.find('#editInA').attr('action', 'editIndAssign/' + id);
    })
    // Edit Individual Task
    $('#editAssignIndividual').on('show.bs.modal', function (event) {
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
        modal.find('#user').val(assign);
        modal.find('#editIndiv').attr('action', 'editIndAssign/' + id);
    })

    $('#editGetIndividual').on('show.bs.modal', function (event) {
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
        modal.find('#user').val(assign);
        modal.find('#editIndiv').attr('action', 'editIndAssign/' + id);
    })

    // Edit Private Task
    $('#editPrivate').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var category = button.data('category')
        var name = button.data('name')
        var due = button.data('due')
        var status = button.data('status')
        var workload = button.data('workload')
        var modal = $(this)
        modal.find('#id').html(id);
        modal.find('#name').attr('value',name);
        modal.find('#category').val(category);
        modal.find('.due').attr('value',due);
        modal.find('#status').val(status);
        modal.find('#md').attr('value',workload);
        modal.find('#editPri').attr('action', 'updatePrivate/' + id);
    })
    //Delete Private Task
    $('#deletePrivate').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('#deletePri').attr('action', 'deletePrivate/' + id)
    })

    $(function() {
        $('#EditForAssignGroup').click(function() {
            $('.showEditAssignGroup').hide();
        });
        $('#EditCollectiveYes').click(function() {
            $('.showEditAssignGroup').show();
            $('.showEditAssignUser').hide();
        });
        $('#EditCollectiveNo').click(function() {
            $('.showEditAssignGroup').hide();
            $('.showEditAssignUser').show();
        });
        $('#privateEditYes').click(function() {
            $('.showEditCollective').hide();
            $('.showEditAssignGroup').hide();
            $('.showEditAssignUser').hide();
        })
        $('#privateEditNo').click(function() {
            $('.showEditCollective').show();
            $('.showEditAssignUser').show();
        })
    })
</script>
@endsection