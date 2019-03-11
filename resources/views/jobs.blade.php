@extends('layout.master')
@section('content')
                @include('partials.navbar2')
    <div class="container">
        <div class="row" style="margin-bottom: 75px; margin-top: 50px">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <form method="post" action="{{ route('jobs.all') }}">
                        <div class="col-md-4" style="padding-right: 5px;">
                            <input placeholder="Job title or keyword" type="text" name="search" class="form-control" id="search">
                        </div>
                        <div class="col-md-2" style="padding-left: 5px;padding-right: 5px;">
                            <select name="city" class="form-control"  id="city" required style=" height: 40px;">
                                <option disabled selected value="">Select a City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2" style="padding-left: 5px;padding-right: 5px;">
                            <select name="job_type" class="form-control"  id="job_type" required style=" height: 40px;">
                                <option disabled selected value="">Select a Job Type</option>
                                @foreach($job_types as $job_type)
                                    <option value="{{ $job_type->id }}">{{ $job_type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4" style="padding-left: 5px;">
                            <input type="submit" value="@lang('messages.search')" class="btn btn-primary form-control">
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
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
@if(count($jobs) == 0)
    <div class="row">
        <div class="col-md-4 col-xs-offset-4 text-center">
            <h1>No Jobs Available</h1>
        </div>
    </div>
@endif

<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="pull-right">
            {{ $jobs->links() }}
        </div>
    </div>
</div>
            </div>


    @endsection