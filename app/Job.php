<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'min_salary',
        'max_salary',
        'company_id',
        'jobtype_id',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo('App\Citi');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function jobtype()
    {
        return $this->belongsTo('App\Jobtype');
    }
    public function users()
    {
        return $this->belongsToMany('App\Jobseeker', 'applications', 'job_id', 'user_id')->withPivot('id','company_id', 'status')->wherePivot('status', 1)->withTimestamps();
    }
}
