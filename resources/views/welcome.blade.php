@extends('layout.master')
@section('content')
            <header style="background-image: url('{{ asset('header.jpg') }}");'>
                @include('partials.navbar')
    <div class="container">

            <div class="row">
                <div class="col-md-8 jumbo">
                    <h2>@lang('messages.title')</h2>
                    <p>@lang('messages.description')</p>
                    <a href="{{ route('jobs.all') }}" class="join">@lang('messages.searchJobs')</a>
                    @if(!Auth::guard('joobseeker')->check() && !Auth::guard('company')->check())
                      <a href="{{ route('signin') }}" class="post">@lang('messages.join')</a>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">
                <h2 class="text-center latest">@lang('messages.latest')</h2>
            </div>
        </div>
    </div>
    <div class="latest-jobs">
        <div class="container">

@foreach($jobs as $job)
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="job">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <h2>{{$job->title}}</h2>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                <a href="{{ route('jobs.jobPost',['id' => $job->id]) }}" class="pull-right">@lang('messages.view')</a>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <span class="salary">${{$job->min_salary}} - ${{$job->max_salary}}</span>
                                <span class="company">{{$job->company->name}}</span>
                            </div>
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="city">{{$job->city->name}}</span>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <span class="type">{{$job->jobtype->type}}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="pull-right time">{{$job->created_at->format('m/d/Y')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endforeach


            </div>
            </div>
    @endsection
