@extends('admin.master')

@section('module', 'Promotion')
@section('action', 'Create')

@section('content')
<form method="post" action="{{ route('admin.promotion.store') }}" enctype="multipart/form-data">
    @csrf
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Promotion Create</h3>

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
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label>Promotion Code</label>
                        <input type="text" class="form-control" placeholder="Enter promotion code" name="code" value="{{old('code')}}">
                    </div>

                    <div class="form-group">
                        <label>Discount</label>
                        <input type="number" class="form-control" placeholder="Enter discount" name="discount" value="{{old('discount')}}">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
    <!-- /.card -->
</form>
@endsection
