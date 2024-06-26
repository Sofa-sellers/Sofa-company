@extends('admin.master')
@section('module' ,'Category')
@section('action','Edit')

@section('content')
    <!-- Default box -->
    <form method="post" action="{{route('admin.category.update',['id'=>$id])}}" enctype="multipart/form-data">
      @csrf
    <div class="card">
        <div class="card-header">
          <h3 class="card-title">Category Update</h3>
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
                <input type="text" class="form-control" placeholder="Enter category name" name="name" value="{{ old('name',$category->name) }}">
            </div>
            <div class="form-group">
                <label>Category Parent</label>
                <select class="form-control" name="parent_id">
                    <option value="0">----Root----</option>
                    @php
                        recursiveCategory($categories, old('parent_id', $category->parent_id));
                    @endphp
                </select>
            </div>

            <div class="form-group">
                <label>Photo</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customPhoto" name="photo" accept="photo/jpg,photo/png,photo/bmp,photo/jpeg"/>
                    <label class="custom-file-label" for="customPhoto">Choose file</label>
                </div>
                @if($category->photo)
                    <img src="{{ asset('uploads/' . $category->photo) }}" alt="Category Photo" width='200px' height='200px'>
                @endif
            </div>

            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="1" {{ old('status',$category->status) == 1 ? 'selected' : '' }}>Show</option>
                    <option value="2" {{ old('status',$category->status) == 2 ? 'selected' : '' }}>Hide</option>
                </select>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
