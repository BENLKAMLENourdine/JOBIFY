<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Company extends Authenticatable
{
    use Notifiable;

    protected $table = 'company';
    protected $fillable = ['name','email', 'password'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function job()
    {
        return Job::where('company_id',$this->id)->get();
              //return $this->hasMany('App\Job');
    }
}
