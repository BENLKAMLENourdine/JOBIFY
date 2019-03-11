@extends('layout.master')
@section('content')
@include('partials.navbar2')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <h1 class="text-center" style="margin-top: 50px; margin-bottom: 25px;">Sign In</h1>
                @if(count($errors) > 0)
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger">{{$error}}</div>
                            @endforeach
                    @endif
                <form method="post" action="{{ route('company.signin') }}">
                    <div class="form-group">
                        <input placeholder="Emaill Address" type="text" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input placeholder="Password" type="password" name="password" class="form-control">
                    </div>
                    <input type="submit" class="form-control btn btn-primary" value="Sign In">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection