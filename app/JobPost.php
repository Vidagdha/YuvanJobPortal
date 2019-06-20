<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $guarded = [];
    protected $fillable = [
        'posted_by_id','job_type_id','business_stream_id','job_title','company_id', 'created_date','last_date','salary','required_skills','job_description','slug','job_location',
    ];
    public function employer(){
        return $this->belongsTo('App\Employer');
    }

    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function job_location(){
        return $this->belongsTo('App\JobLocation');
    }

    public function job_type(){
        return $this->belongsTo('App\JobType');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function similarJobs($jobId, $jobTitle, $businessStream){
        $currentDate = date('Y-m-d');
        $similar_jobs = JobPost::all()->where('job_title', $jobTitle)
        ->where('business_stream_id', $businessStream)
        ->where('is_active', '=', '1')
        ->where('id','<>', $jobId);

        return $similar_jobs;
    }

    public function job_post_activities(){
        return $this->hasMany('App\JobPostActivity');
    }
}
