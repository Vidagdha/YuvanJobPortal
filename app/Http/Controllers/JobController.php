<?php

namespace App\Http\Controllers;

use App\JobPost;
use App\JobPostActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index(){
        $jobs = JobPost::orderBy('last_date', 'asc')
                ->whereRaw('last_date >= curdate()')
                ->where('is_active', '=', '1')
                ->simplePaginate(10);
        return view('welcome', compact('jobs'));
    }

    public function show($id, JobPost $job){
        return view('jobs.show', compact('job'));
    }

    public function apply($id){
        if (Auth::guard('web')->check()){
            $user_id = auth()->user()->id;
            $job_post_id = $id;
            $job_post = JobPost::where('id',$job_post_id)->first();
            if (JobPostActivity::create([
                'user_account_id' => $user_id,
                'job_post_id' => $job_post_id,
                'apply_date' => date('Y-m-d'),
                'employer_id' => $job_post->posted_by_id,
            ])) {
                return redirect()->back()->with('success', 'Application submitted successfully');
            } else {
                return redirect()->back()->with('failure', 'Sorry! Something went wrong');
            }
        }
        return redirect('login');
    }
}
