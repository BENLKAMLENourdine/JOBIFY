@extends('layout.master')
@section('content')
@include('partials.navbar2')
    <div class="container">
        <div class="row">
            <h1 class="text-center">Profile</h1>
                <form style="padding-top: 50px;"  enctype="multipart/form-data" method="post" action="{{ route('user.profile') }}" class="form-horizontal">
                    <div class="form-group">
                        <label for="first_name" class="col-md-offset-2 col-sm-2 control-label">First Name</label>
                        <div class="col-sm-6">
                    <input type="text" name="first_name" class="form-control" id="first_name"  placeholder="First Name"  value="{{ $user->first_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="col-md-offset-2 col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-6">
                    <input type="text" name="last_name" class="form-control" id="last_name"  placeholder="Last Name"  value="{{ $user->last_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-md-offset-2 col-sm-2 control-label">Email Address</label>
                        <div class="col-sm-6">
                    <input type="text" name="email" class="form-control" id="email"  placeholder="Email Address"  value="{{ $user->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cv" class="col-md-offset-2 col-sm-2 control-label">Resume</label>
                        <div class="col-sm-6">
                    <input type="file" name="cv" class="form-control" id="cv">
                        </div>
                    </div>
                    <div class="col-md-6 col-md-offset-4">
                        <input type="submit" class="btn btn-primary form-control" value="Update">
                    </div>
                    {{ csrf_field() }}
                </form>
        </div>
    </div>
@endsection