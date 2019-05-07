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
                            @foreach ($category as $item)
                            <tr>
                                
                                <td>
                                    <a href="" data-id="{{ $item->id}}" data-target="#deleteModal"  data-toggle="modal"  >
                                        <i class="material-icons text-danger" >delete</i>
                                    </a>
                                    <a href="" data-toggle="modal" data-name="{{ $item->name }}" data-id="{{ $item->id}}" data-target="#editModal">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    {{$item->id}}
                                </td>
                                <td>{{$item->name}} </td>
                            </tr>
                            @endforeach
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
                        <form action="category" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group row"
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
                        <div class="form-group row">
                            <p> Are you sure that you want to delete this category?</p>
                        </div>
                            <div class="modal-footer">
                                <form action="" id="deleteCate" method="POST">
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
    <div class="modal fade" id="editModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit category</h4>
                </div>
                <!-- Modal body -->
                <div class="modal-body"><br>
                    <form action="" id="editCate" method="POST">
                        @method('PATCH')
                        @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" id="name" value="">
                        </div>
                    </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" >Edit Category</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
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
</div>

<script src="{{asset('js/app.js')}}"></script>
<script>
  $('#editModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id')
      var name = button.data('name')
      var modal = $(this)
      modal.find('#name').attr('value',name);
      modal.find('#editCate').attr('action','category/'+id)
})

  $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget)
      var id = button.data('id') 
      var modal = $(this)
      modal.find('#deleteCate').attr('action','category/'+id)
})

</script>
@endsection