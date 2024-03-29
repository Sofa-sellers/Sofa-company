@extends('admin.master')

@section('module', 'User')
@section('action', 'Edit')

@section('content')
<form method="post" action="{{ route('admin.user.update', ['id' => $id]) }}">
    @csrf
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">User edit</h3>

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
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" placeholder="Enter username" name="username" value="{{old('username', $user->username)}}">
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter email" name="email" value="{{old('email', $user->email)}}" readonly>
            </div>

            <div class="form-group">
                <label>Firstname</label>
                <input type="text" class="form-control" placeholder="Enter firstname" name="firstname" value="{{old('firstname', $user->firstname)}}">
            </div>

            <div class="form-group">
                <label>Lastname</label>
                <input type="text" class="form-control" placeholder="Enter lastname" name="lastname" value="{{old('lastname', $user->lastname)}}">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" placeholder="Enter address" name="address" value="{{old('address', $user->address)}}">
            </div>

            <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" placeholder="Enter phone" name="phone" value="{{old('phone', $user->phone)}}">
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password">
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status">
                            <option value="1" {{old('status', $user->status)==1?'selected':''}}>Show</option>
                            <option value="2" {{old('status', $user->status)==2?'selected':''}}>Hide</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" placeholder="Enter password" name="password_confirmation">
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level">
                            <option value="2" {{old('level', $user->level)==2?'selected':''}}>Admin</option>
                            <option value="1" {{old('level', $user->level)==1?'selected':''}}>Member</option>
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
