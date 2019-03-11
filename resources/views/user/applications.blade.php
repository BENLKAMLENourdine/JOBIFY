@extends('layout.master')
@section('content')
@include('partials.navbar2')
    <div class="container">
            <h1 class="text-center" style="margin-bottom: 50px;">Jobs Applications</h1>

               @foreach($jobs as $job)
               <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="job">
                        <div class="row">
                            <div class="col-md-6">
                                <h2>{{$job['job_title']}}</h2>
                            </div>
                            <div class="col-md-6">
                                    @if($job['status']==0)
                                    <a style="margin-top: 20px; color: red;" href="" class="pull-right"><i class="fa fa-flag" aria-hidden="true"></i>
                                    REJECTED
                                    @elseif($job['status']==1)
                                    <a style="margin-top: 20px; color: #1d67e2;" href="" class="pull-right"><i class="fa fa-flag" aria-hidden="true"></i>
                                    PENDING
                                    @else
                                    <a style="margin-top: 20px;" href="" class="pull-right"><i class="fa fa-flag" aria-hidden="true"></i>
                                    ACCEPTED
                                    @endif
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