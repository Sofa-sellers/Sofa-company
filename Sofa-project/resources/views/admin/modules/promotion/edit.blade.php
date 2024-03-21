@extends('admin.master')

@section('module', 'Promotion')
@section('action', 'Edit')

@section('content')
<form method="post" action="{{ route('admin.promotion.update', ['id' => $id]) }}" enctype="multipart/form-data">
    @csrf
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Promotion Edit</h3>

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
                        <input type="text" class="form-control" placeholder="Enter promotion code" name="code" value="{{old('code', $promotion->code)}}">
                    </div>

                    <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" rows="3" placeholder="Enter description" name="description">{{old('description', $promotion->description)}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Discount Percent</label>
                        <input type="number" class="form-control" placeholder="Enter discount percent" name="discount_percent" value="{{old('discount_percent', $promotion->discount_percent)}}">
                    </div>

                    <div class="form-group">
                        <label>Date Start</label>
                        <input type="date" class="form-control" placeholder="Enter date start" name="date_start" value="{{old('date_start', $promotion->date_start)}}">
                    </div>

                    <div class="form-group">
                        <label>Date End</label>
                        <input type="date" class="form-control" placeholder="Enter date end" name="date_end" value="{{old('date_end', $promotion->date_end)}}">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{old('status', $promotion->status)==1?'selected' : ''}}>Active</option>
                            <option value="2" {{old('status', $promotion->status)==2?'selected' : ''}}>Unactive</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
    <!-- /.card -->
</form>
@endsection