<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citi extends Model
{
    protected $table = 'cities';
    protected $fillable = ['name'];

    public function job()
    {
        return $this->hasMany('App\Job');
    }
}
