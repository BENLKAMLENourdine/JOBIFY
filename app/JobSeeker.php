<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Application;
class JobSeeker extends Authenticatable
{
    use Notifiable;

    protected $table = 'joobseekers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

public function jobs()
    {
        //return $this->belongsToMany('App\Job', 'applications', 'user_id', 'job_id')->withPivot('id','company_id', 'status')->withTimestamps();
        return Application::where('user_id',$this->id)->get();
    }

}
