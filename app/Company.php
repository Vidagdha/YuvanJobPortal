<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];
    public function job_posts(){
        return $this->hasMany('App\JobPost');
    }


    public function getRouteKeyName()
    {
        return 'company_slug';
    }

    public function employer(){
        return $this->belongsTo('App\Employer', 'employer_id');
    }

    public function business_stream(){
        return $this->belongsTo('App\BusinessStream');
    }

}
