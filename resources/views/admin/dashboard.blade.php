@extends('layout.master')
@section('content')
@include('partials.navbar2')
    <div class="container">
            <h1 class="text-center" style="margin-bottom: 50px;">All Jobs</h1>
            <div class="col-md-10 col-md-offset-1">
                @if(session()->has('success'))
                    <div class="alert alert-success">
                        {{session()->get('success')}}
                    </div>
                @endif
            </div>
               @foreach($jobs as $job)
               <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="job">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>{{$job->title}}</h2>
                            </div>
                            <div class="col-md-3">
                                <h4 class="pull-right" style="margin-top: 20px;"><i class="fa fa-building" aria-hidden="true"></i> {{$job->company->name}}</h4>
                            </div>
                            <div class="col-md-3">
                                <a style="margin-top: 20px;" href="{{ route('job.delete',['id' => $job->id]) }}" class="pull-right">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i> DELETE
                                </a>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
               @endforeach
        </div>
    </div>
@endsection