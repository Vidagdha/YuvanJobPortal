<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobType extends Model
{
    public function job_posts(){
        return $this->hasMany('App\JobPost');
    }
}
