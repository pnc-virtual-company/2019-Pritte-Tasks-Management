@extends('templates.template')
@section('template')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Groups</h1>
</div>
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            @auth
            @if (\Auth::user()->role_id==1)
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
                    Create New Group
                </button>
            </div>
            @endif
            @endauth
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
                        @foreach($groups as $item)
                        <tr>
                            <td>
                                <a href="#" data-id="{{$item->id}}" class="text-danger" data-toggle="modal"
                                    data-target="#deletetaskModal"><i class="material-icons text-danger">delete</i></a>
                                <a href="#" class="text-primary" data-toggle="modal" data-name="{{ $item->name }}" data-id="{{ $item->id}}"
                                    data-target="#editmyModal"><i class="material-icons">edit</i></a>
                                <span>{{$item->id}}</span>
                            </td>
                            <td>{{$item->name}}</td>
                            <td>
                                @foreach ($item->users as $user)
                                    @if ($user->pivot->tag == 0)
                                    {{$user->name . ', '}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($item->users as $user)
                                    @if ($user->pivot->tag == 1)
                                    {{$user->name . ', '}}
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($item->users as $user)
                                {{-- @if ($user->pivot->tag == 2) --}}
                                {{-- {{count($user->name)}} --}}
                                {{-- @endif --}}
                                @endforeach
                            </td>
                            <td>{{$item->created_at}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- The Modal Create-->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Create a new Group</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <form action="{{route('group.store')}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Group Name(s)</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Enter group name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form" id="manager">Manager</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="manager" multiple name="manager[]" size="5">
                                                @foreach ($users as $manager )
                                                <option value="{{ $manager->id }}">{{ $manager->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" id="viewer">Viewer</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="viewer" multiple name="viewer[]" size="5">
                                                @foreach ($users as $viewer)
                                                  <option value="{{ $viewer->id }}">{{ $viewer->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" id="member">Member</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="member" multiple name="member[]" size="5">
                                                @foreach ($users as $member)
                                                <option value="{{ $member->id }}">{{ $member->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Create Group</button>
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal footer -->
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
                            <form action="" method="POST" id="editGroup">
                                    @method('PATCH')
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Group Name(s)</label>
                                        <div class="col-sm-9">
                                          <input type="text" class="form-control" id="name" name="name" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form">Manager</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="manager" name="manager[]" size="5">
                                                @foreach ($users as $manager)
                                                    <option value="">{{$manager->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Viewer</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="viewer" multiple name="viewer[]" size="5">
                                                @foreach ($users as $viewer)
                                                    <option value="">{{$viewer->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Member</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="member" multiple name="member[]" size="5">
                                                @foreach ($users as $member)
                                                    <option value="">{{$member->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success" value="edit group">Edit Group</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Modal footer -->
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
{{-- deleted-modal --}}
<div class="modal fade" id="deletetaskModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group row">
                    <p> Are you sure that you want to delete this group?</p>
                </div>
                <div class="modal-footer">
                    <form action="" id="deleteGroup" method="POST">
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

<script>

    $('#editmyModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var name = button.data('name')
        var manager = button.data('manager')
        var viewer = button.data('viewer')
        var member = button.data('member')
        console.log("name "+name);
        console.log("Manager id " +manager);
        console.log("View is " +viewer);
        console.log("Member is " +member);
        var modal = $(this)
        modal.find('#name').attr('value', name);
        modal.find('#manager').attr('value', manager);
        modal.find('#viewer').attr('value', viewer);
        modal.find('#member').attr('value', member);
        // modal.find('#manager').val(manager);
        // modal.find('#viewer').val(viewer);
        // modal.find('#member').val(member);
        modal.find('#editmyModal').val('editGroup/' + id)
    })
    $('#deletetaskModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var modal = $(this)
        modal.find('#deleteGroup').attr('action', 'group/' + id)
    })
</script>
@endsection