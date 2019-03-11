@extends('layout.master')
@section('content')
@include('partials.navbar2')
    <div class="container">
        <div class="row">
            <h1 class="text-center">Create a Job</h1>
                <form style="padding-top: 50px;" method="post" action="{{ route('company.job') }}" class="form-horizontal">
                    <div class="form-group">
                        <label for="title" class="col-md-offset-2 col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                    <input type="text" name="title" class="form-control" id="title"  placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-md-offset-2 col-sm-2 control-label">Description</label>
                        <div class="col-sm-6">
                        <textarea name="description" class="form-control" id="description"  placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="min_salary" class="col-md-offset-2 col-sm-2 control-label">Minimum Salary</label>
                        <div class="col-sm-6">
                        <input type="text" name="min_salary" class="form-control" id="min_salary"  placeholder="Minimum Salary">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="max_salary" class="col-md-offset-2 col-sm-2 control-label">Maximum Salary</label>
                        <div class="col-sm-6">
                        <input type="text" name="max_salary" class="form-control" id="max_salary"  placeholder="Maximum Salary">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="city" class="col-md-offset-2 col-sm-2 control-label">City</label>
                        <div class="col-sm-6">
                            <select name="city" class="form-control"  id="city" required>
                                <option disabled selected value="">Select a City</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="job_type" class="col-md-offset-2 col-sm-2 control-label">Job Type</label>
                        <div class="col-sm-6">
                            <select name="job_type" class="form-control"  id="job_type" required>
                                <option disabled selected value="">Select a Job Type</option>
                                @foreach($job_types as $job_type)
                                    <option value="{{ $job_type->id }}">{{ $job_type->type }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-offset-4 col-sm-6">
                        <input type="submit" class="btn btn-primary form-control" value="Create Job">
                    </div>
                    {{ csrf_field() }}
                </form>
        </div>
    </div>
@endsection




