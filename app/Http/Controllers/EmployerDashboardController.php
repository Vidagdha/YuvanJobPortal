<?php

namespace App\Http\Controllers;

use App\BusinessStream;
use App\Company;
use App\Employer;
use App\JobPostActivity;
use App\JobType;
use App\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployerDashboardController extends Controller
{
    public function companyProfile(){
        $employer_id = auth()->guard('employer')->user()->id;
        $company = Company::where('employer_id','=',$employer_id)->first();
        $business_streams = BusinessStream::all()->pluck('id', 'business_stream_name');
        return view('employer.company', compact(['company','employer_id','business_streams']));
    }

    public function companyUpdate(Request $request){
        $employer_id = auth()->guard('employer')->user()->id;
        if($request->hasFile('company_logo')) {
            $company_logo = $request->file('company_logo')->store('public/uploads/company_logo');
        }else{
            $company_logo = null;
        }
        if(Company::where('employer_id', $employer_id)->update([
            'company_name' => request('company_name'),
            'company_slogan' => request('company_slogan'),
            'establishment_date' => request('establishment_date'),
            'company_contact' => request('company_contact'),
            'business_stream_id' => request('business_stream_id'),
            'company_website_url' => request('company_website_url'),
            'profile_description' => request('profile_description'),
            'company_slug' => Str::slug(request('company_name')),
            'company_address' => request('company_address'),
            'company_logo' => $company_logo,
        ])){
            return redirect()->back()->with('success', 'Company Profile successfully updated');
        }else{
            return redirect()->back()->with('failure', 'Sorry! Something went wrong');
        }
    }

    public function postJobIndex(){
        $employer_id = auth()->guard('employer')->user()->id;
        $job_types = JobType::all()->pluck('id', 'job_type');
        return view('employer.post-job', compact(['employer_id','job_types']));
    }

    public function postJob(Request $request){
        $employer_id = auth()->guard('employer')->user()->id;
        $company = Company::where('employer_id','=',$employer_id)->first();
        $lastJobPostId = JobPost::orderBy('id', 'desc')->count();
        $lastJobPostId += 1;
        if(JobPost::create([
            'posted_by_id' => $employer_id,
            'job_type_id' => request('job_type_id'),
            'business_stream_id' => $company->business_stream_id,
            'job_title' => request('job_title'),
            'company_id' => $company->id,
            'created_date' => date('Y-m-d'),
            'last_date' => request('last_date'),
            'salary' => request('salary'),
            'required_skills' => request('required_skills'),
            'job_description' => request('job_description'),
            'slug' => Str::slug(request('job_title')).'-'.$lastJobPostId,
            'job_location' => request('job_location'),
        ])){
            return redirect()->back()->with('success', 'Job posted successfully');
        }else{
            return redirect()->back()->with('failure', 'Sorry! Something went wrong');
        }
    }
    public function jobApplications(){
        $job_post_activities = JobPostActivity::orderBy('apply_date', 'desc');
        return view('employer.application', compact('job_post_activities'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
