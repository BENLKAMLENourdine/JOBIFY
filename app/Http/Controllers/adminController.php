<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Job;
class adminController extends Controller
{
        public function getSignin()
    {

        return view('admin.signin');

    }

    public function postSignin(Request $request)
    {
        $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required|min:4'
            ]);

            if(Auth::guard('admin')->attempt([
                'email' => $request->input('email'),
                'password' => $request->input('password')
            ])){
                return redirect()->route('admin.dashboard');
            }

            return redirect()->back();
    }

        public function getDashboard()
    {
        $jobs = Job::all();
        return view('admin.dashboard',['jobs' => $jobs]);
    }

    public function getLogout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.signin');
    }
}
