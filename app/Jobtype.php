<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jobtype extends Model
{
    protected $fillable = ['type'];

    public function job()
    {
        return $this->hasMany('App\Job');
    }
}
