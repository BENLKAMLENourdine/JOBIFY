<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Company;
use App\Job;
use App\Citi;
use App\Jobtype;
use App\JobSeeker;
use App\Application;
use Auth;

class companyController extends Controller
{
    public function getSignin()
    {
        return view('company.signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required|min:4'
            ]);

            if(Auth::guard('company')->attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])){
                return redirect()->route('company.profile');
            }

            return redirect()->back();
    }

    public function getSignup()
    {
        return view('company.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request,[
                'name' => 'required',
                'email' => 'required|email|unique:company|unique:joobseekers',
                'password' => 'required|min:4'
            ]);

            $company = new Company([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ]);

            $company->save();
            return redirect()->route('company.signin');
    }

    public function getApplications()
    {
        $company = Company::find(Auth::guard('company')->id());
        $jobs = $company->job();

        return view('company.applications',['jobs' => $jobs]);
    }

    public function getProfile()
    {
        $company = Company::find(Auth::guard('company')->id());
        return view('company.profile',['company' => $company]);
    }

    public function updateProfile(Request $request)
    {
        $company = Company::find(Auth::guard('company')->id());
        $company->name = $request->input('name');
        $company->email = $request->input('email');
        $company->save();
        return redirect()->route('company.profile');
    }

        public function getJob()
    {
        $cities = Citi::all();
        $job_types = Jobtype::all();
        return view('company.job',['cities' => $cities,'job_types' => $job_types]);
    }

    public function postJob(Request $request)
    {
        $job = new Job();
        $job->title = $request->input('title');
        $job->description = $request->input('description');
        $job->min_salary = $request->input('min_salary');
        $job->max_salary = $request->input('max_salary');
        $job->company_id = Auth::guard('company')->id();
        $job->jobtype_id = $request->input('job_type');
        $job->city_id = $request->input('city');
        $job->save();
        return redirect()->route('jobs.latest');
    }

    public function getLogout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('jobs.latest');
    }

    public function acceptApplication($id)
    {
        $application = Application::find($id);
        $application->status = 2;
        $application->save();
        session()->flash('success','Application accepted successfly');
        return redirect()->route('company.applications');
    }

        public function rejectApplication($id)
    {
        $application = Application::find($id);
        $application->status = 0;
        $application->save();
        session()->flash('success','Application rejected successfly');
        return redirect()->route('company.applications');
    }

        public function downloadResume($id)
    {
        $user = Jobseeker::find($id);
        if(!$user->resume)
            session()->flash('failure','This user doesn\'t have a resume');
        else{
            return Storage::download($user->resume);
        }
        return redirect()->route('company.applications');
    }
}
