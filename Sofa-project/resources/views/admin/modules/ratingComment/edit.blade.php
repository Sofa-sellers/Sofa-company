@extends('admin.master')
@section('module', 'Comment')
@section('action', 'Detail')

@section('content')
<form method="POST" action="{{route('admin.ratingComment.update',['id'=>$comment->id])}}">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Alert!</h5>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </div>
    @endif
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {{ $message }}
    </div>


    @elseif ($message = Session::get('failed'))
    <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Failed!</h5>
    {{ $message }}
    </div>
    @endif
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Comment Detail</h3>

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
          
            <table style="width: 50%;">
                <tr>
                  <th>Product</th>
                  <td>{{$comment->product->name}}</td>
                </tr>
                <tr>
                  <th>Username</th>
                  <td>{{$comment->user->username}}</td>
                </tr>
                <tr>
                  <th>Comment</th>
                  <td>{{$comment->comment}}</td>
                </tr>
                          @switch($comment->status)
                              @case(1)
                              <tr>
                                <td>
                                  <label>Status</label>
                                </td>
                                <td>
                                    <span class="right badge badge-success">Accepted</span>
                                </td>
                                
                              </tr>
                              @break

                              @case(2)
                              <tr>
                                <td>
                                    <label>Status</label>
                                  </td>
                                  <td>
                                      <span class="right badge badge-dark">Waiting</span>
                                  </td>
                                  <input type="hidden" name="status" value="1">
                                  <td>
                                      <button type="submit" class="btn btn-primary">Accept</button>
                                  </td>
                                </tr>
                            @break
                    @endswitch
                  
              
            </table>
        </div>

       
    </div>
    <!-- /.card -->
</form>
@endsection
