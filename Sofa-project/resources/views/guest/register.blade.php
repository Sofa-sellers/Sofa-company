@extends('master')
@section('module','Register')
@section('content')
    <!-- main content start -->
    <div class="login-register-area section-padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 mx-auto">
                    <div class="login-register-wrapper">
                        <div class="login-register-tab-list nav nav-tabs" id="nav-tab" role="tablist">
                            <a data-bs-toggle="tab" href="#lg1">
                                <h4>register</h4>
                            </a>
                        </div>
                        <div class="tab-content">
                            <div id="lg1" class="tab-pane show active">
                                <div class="login-form-container">
                                    <div class="login-register-form">
                                        <form action="" method="POST">
                                            @if ($errors->any())
                                                <div class="alert alert-danger alert-dismissible">
                                                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                                </div>
                                            @endif
                                            @csrf
                                            <label>Email<span class="required">*</span></label>
                                            <input type="email" name="email" placeholder="email" value="{{old('email')}}">
                                            <label>Password<span class="required">*</span></label>
                                            <input type="password" name="password" placeholder="Password">
                                            <label>Confirm Passord<span class="required">*</span></label>
                                            <input type="password" class="form-control" placeholder="Enter password" name="password_confirmation">
                                            <label>Username<span class="required">*</span></label>
                                            <input name="username" placeholder="user_name" value="{{old('username')}}">
                                            <div class="button-box">
                                                <button type="submit" class="btn btn-dark">
                                                    <span>Register</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- main content end -->
@endsection