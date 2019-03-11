@extends('layout.master')
@section('content')
@include('partials.navbar2')
    <div class="container">
        <div class="row">
            <h1 class="text-center">Profile</h1>
                <form style="padding-top: 50px;" method="post" action="{{ route('company.profile') }}" class="form-horizontal">
                    <div class="form-group">
                        <label for="email" class="col-md-offset-2 col-sm-2 control-label">Email Address</label>
                        <div class="col-sm-6">
                    <input type="text" name="email" class="form-control" id="email"  placeholder="Email Address"  value="{{ $company->email }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-md-offset-2 col-sm-2 control-label">Company Name</label>
                        <div class="col-sm-6">
                        <input type="text" name="name" class="form-control" id="name"  placeholder="Company Name"  value="{{ $company->name }}">
                        </div>
                    </div>
                    <div class="col-md-offset-4 col-sm-6">
                        <input type="submit" class="btn btn-primary form-control" value="Update">
                    </div>
                    {{ csrf_field() }}
                </form>
        </div>
    </div>
@endsection