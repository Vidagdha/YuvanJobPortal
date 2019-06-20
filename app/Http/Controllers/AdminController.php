<?php

namespace App\Http\Controllers;

use App\Employer;
use App\JobPost;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $candidates = User::all();
        $job_posts = JobPost::all();
        $employers = Employer::all();
        return view('admin-panel', compact(['employers', 'candidates', 'job_posts']));
    }

    public function listEmployers(){
        $employersList = Employer::orderBy('created_at', 'desc');
        return view('employers-list', compact(['employersList']));
    }

    public function listJobs(){
        $job_posts = JobPost::orderBy('is_active', 'asc')->orderBy('last_date', 'asc');
        return view('job-posts-list', compact(['job_posts']));
    }

    public function approveJobPost($id){
        if(JobPost::where('id', '=', $id)->update([
            'is_active' => '1',
        ])){
            return redirect()->back()->with('success', 'Job Post approved successfully');
        }
        else{
            return redirect()->back()->with('failure', 'Sorry! Something went wrong');
        }
    }
}
