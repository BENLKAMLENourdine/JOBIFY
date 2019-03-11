<?php

namespace App\Http\Controllers;
use App\Job;
use Illuminate\Http\Request;
use App;
use App\Citi;
use App\Jobtype;

class JobsController extends Controller
{
    public function getLatestJobs()
    {
        //dd(App::getLocale());
        $jobs = Job::orderBy('created_at', 'desc')->limit(6)->get();
        return view('welcome',['jobs' => $jobs]);
    }

    public function getJobs()
    {
        $jobs = Job::orderBy('created_at', 'desc')->paginate(3);
        $cities = Citi::all();
        $job_types = Jobtype::all();
        return view('jobs',['jobs' => $jobs,'cities' => $cities,'job_types' => $job_types]);
    }

    public function postJobs(Request $request)
    {
        $jobs = Job::where([
    ['title', 'like', '%' . $request->input('search') . '%'],
    ['city_id', '=', $request->input('city')],
    ['jobtype_id', '=', $request->input('job_type')]
])->paginate(3);
        $cities = Citi::all();
        $job_types = Jobtype::all();
        return view('jobs',['jobs' => $jobs,'cities' => $cities,'job_types' => $job_types]);
    }

    public function getJob($id)
    {
        $job = Job::find($id);
        if(!$job)
            return view('404');
        return view('job_post',['job' => $job]);
    }

    public function deleteJob($id)
    {
        $job = Job::find($id);
        $job->delete();
        session()->flash('success','Job successfly deleted');
        return redirect()->route('admin.dashboard');
    }


}
