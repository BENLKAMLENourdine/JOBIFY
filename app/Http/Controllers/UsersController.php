<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JobSeeker;
use App\Job;
use App\Application;
use Auth;
class UsersController extends Controller
{


    public function getSignin()
    {
        return view('user.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required|min:4'
            ]);

            if(Auth::guard('joobseeker')->attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])){
                return redirect()->route('user.profile');
            }

            return redirect()->back();
    }

    public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request,[
                'email' => 'required|email|unique:joobseekers|unique:company',
                'password' => 'required|min:4',
                'first_name' => 'required',
                'last_name' => 'required'
            ]);

            $jobSeeker = new JobSeeker([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);
            $jobSeeker->save();
            return redirect()->route('user.signin');
    }

    public function getApplications()
    {
        $user = JobSeeker::find(Auth::guard('joobseeker')->id());
        $applications = $user->jobs();
        $jobs = array();
        foreach ($applications as $application) {
            $job = Job::find($application->job_id);
            $a = array(
                'job_title' => $job->title,
                'status' => $application->status
            );
            array_push($jobs, $a);
        }

        return view('user.applications',['jobs' => $jobs]);
    }

    public function getProfile()
    {
        $user = JobSeeker::find(Auth::guard('joobseeker')->id());
        return view('user.profile',['user' => $user]);
    }

        public function updateProfile(Request $request)
    {
        $user = JobSeeker::find(Auth::guard('joobseeker')->id());
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        if($request->hasFile('cv'))
            $user->resume = $request->file('cv')->store('resume');
        $user->save();
        return redirect()->route('user.profile');
    }

    public function getLogout()
    {
        Auth::guard('joobseeker')->logout();
        return redirect()->route('jobs.latest');
    }

        public function applyJob($id)
    {
        $job = Job::find($id);
        $application_count = Application::where([
            ['user_id', '=', Auth::guard('joobseeker')->id()],
            ['job_id', '=', $id],
                    ])->count();
        if($application_count != 0){
            session()->flash('failure','You already applied for this job');
        return redirect()->route('jobs.jobPost', ['id' => $id]);
        }
        $application = new Application();
        $application->user_id = Auth::guard('joobseeker')->id();
        $application->job_id = $job->id;
        $application->company_id = $job->company_id;
        $application->save();
        session()->flash('success','You successefly applied for this job');
        return redirect()->route('jobs.jobPost', ['id' => $id]);
    }

}
