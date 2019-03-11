@extends('layout.master')
@section('content')
@include('partials.navbar2')
    <div class="container">
            <h1 class="text-center" style="margin-bottom: 50px;">Jobs Applications</h1>
            <div class="col-md-10 col-md-offset-1">
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

               @foreach($jobs as $job)
               @foreach($job->users as $user)
               <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="job">
                        <div class="row">
                            <div class="col-md-5">
                                <h2>{{$job->title}}</h2>
                            </div>
                            <div class="col-md-3">
                                <a style="margin-top: 20px;" href="{{ route('company.downloadResume',['id' => $user->id]) }}" class="pull-right"><i class="fa fa-download" aria-hidden="true"></i> DOWNLOAD RESUME</a>
                            </div>
                            <div class="col-md-2">
                                <a style="margin-top: 20px; color: #2ebbef;" href="{{ route('company.accept',['id' => $user->pivot->id]) }}" class="pull-right"><i class="fa fa-check-square-o" aria-hidden="true"></i> ACCEPT</a>
                            </div>
                            <div class="col-md-2">
                                <a style="margin-top: 20px; color: #1a4bda;" href="{{ route('company.reject',['id' => $user->pivot->id]) }}" class="pull-right"><i class="fa fa-ban" aria-hidden="true"></i> REJECT</a>
                            </div>
                        </div>
                        </div>
                        </div>
                        </div>
                @endforeach
               @endforeach
        </div>
    </div>
@endsection