@extends('layout.master')
@section('content')
@include('partials.navbar2')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1"  style="margin-top: 100px;">
                <div class="row">
                    <h1 class="text-center"  style="margin-bottom: 50px;">@lang('messages.choice')</h1>
                    <div class="col-md-6">
                        <a href="{{ route('user.signup') }}">
                            <h1 class="job text-center">@lang('messages.seeker')</h1>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('company.signup') }}">
                            <h1 class="job text-center">@lang('messages.company')</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection