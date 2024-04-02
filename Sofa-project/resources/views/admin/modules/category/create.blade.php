@extends('admin.master')
@section('module' ,'Category')
@section('action','Create')

@section('content')
    <!-- Default box -->
    <form method="post" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Category Create</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
            </div>
        </div>
        <div class="card-body">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Category Name</label>
                <input type="text" class="form-control" placeholder="Enter category name" name="name" value="{{ old('name') }}">
            </div>

            <div class="form-group">
              <label>Category Parent</label>
              <select class="form-control" name="parent_id">
                <option value="0">----Root----</option>
                @php
                  recursiveCategory($categories, old('parent_id', 0));
                @endphp
              </select>
            </div>

            <div class="form-group">
                <label>Photo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customPhoto" name="photo" accept="photo/jpg,photo/png,photo/bmp,photo/jpeg" value="{{ old('photo') }}"/>
                    <label class="custom-file-label" for="customPhoto">Choose file</label>
                </div>
            </div>

            <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status">
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Show</option>
                <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Hide</option>
              </select>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
    <!-- /.card -->
    </form>

<!-- JavaScript to update custom file label -->
<script>
    document.querySelectorAll('.custom-file-input').forEach(function(input) {
        input.addEventListener('change', function(e) {
            var fileName = e.target.files[0].name;
            var label = e.target.nextElementSibling;
            label.innerText = fileName;
        });
    });
</script>
@endsection
