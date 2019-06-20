<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPostActivity extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;
    protected $fillable=[
        'user_account_id', 'job_post_id', 'apply_date', 'employer_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function job_post(){
        return $this->belongsTo('App\JobPost');
    }
}
