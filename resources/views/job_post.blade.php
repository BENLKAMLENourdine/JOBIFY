@extends('layout.master')
@section('content')
                @include('partials.navbar2')
        <div class="container">
            <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
                @if(session()->has('failure'))
                    <div class="alert alert-danger">
                        {{session()->get('failure')}}
                    </div>
                @endif
                </div>
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="job" style="margin-top: 60px;">
                        <div class="row">
                            <div class="col-xs-12 col-md-6">
                                <h2>{{$job->title}}</h2>
                            </div>
                            <div class="col-xs-12 col-md-6">
                                @if(Auth::guard('joobseeker')->check())
                                <a href="{{ route('user.jobApply',['id' => $job->id]) }}" class="pull-right">APPLY</a>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <span class="salary"><i class="fa fa-credit-card-alt" aria-hidden="true"></i> ${{$job->min_salary}} - ${{$job->max_salary}}</span>
                                <span class="company"><i class="fa fa-building" aria-hidden="true"></i>
{{$job->company->name}}</span>
                            </div>
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="col-md-4">
                                        <span class="city"><i class="fa fa-location-arrow" aria-hidden="true"></i>


 {{$job->city->name}}</span>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <span class="type"><i class="fa fa-clock-o" aria-hidden="true"></i>
{{$job->jobtype->type}}</span>
                                    </div>
                                    <div class="col-md-4">
                                        <span class="pull-right time"><i class="fa fa-calendar" aria-hidden="true"></i>

 {{$job->created_at->format('m/d/Y')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12 description">
                                <h3 style="color: black;">Description</h3>
                                <p>{{$job->description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>


    @endsection