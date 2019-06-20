@extends('layouts.base')

@section('content')
<!-- Single Candidate Start -->
<section class="single-candidate-page section_40">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="single-candidate-box">
                    <div class="single-candidate-box-right">
                        <h4>{{$job->job_title}} required</h4>
                        <p><a href="{{route('company.index', [$job->company->id, $job->company['company_slug']])}}">{{$job->company['company_name']}}</a></p>
                        <div class="job-details-meta">
                            {{--<p><i class="fa fa-file-text"></i> Applications 1</p>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Single Candidate End -->


<!-- Single Candidate Bottom Start -->
<section class="single-candidate-bottom-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-lg-9">
                <div class="candidate-single-profile-info">
                    @if(Session::has('success'))
                        <div class="single-resume-feild feild-flex-2">
                            <div class="single-input">
                                <div class="alert alert-success auto-fade" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{Session::get('success')}}
                                </div>
                            </div>
                        </div>
                    @elseif(Session::has('failure'))
                        <div class="single-resume-feild feild-flex-2">
                            <div class="single-input">
                                <div class="alert alert-danger auto-fade" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{Session::get('failure')}}
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="single-candidate-bottom-left">
                    <div class="single-candidate-widget">
                        <h3>job Description</h3>
                        <p>{{$job->job_description}}</p>
                    </div>
                    <div class="single-candidate-widget job-required">
                        <h3>Skills Required</h3>
                        {{$job->required_skills}}
                    </div>
                    <div class="single-candidate-widget">
                        @php
                            $similar_jobs = $job->similarJobs($job->id, $job->job_title, $job->business_stream_id)
                        @endphp
                        @if($similar_jobs->count() != 0)
                        <h3>Similar Jobs</h3>
                        @foreach($similar_jobs as $similar_job)
                            <div class="sidebar-list-single">
                                <div class="top-company-list">
                                    @php
                                        $company_logoFile;
                                        $resumeFile;
                                        if((!empty($similar_job->company['company_logo']))){
                                            $company_logoFile = Storage::url($similar_job->company['company_logo']);
                                        }else{
                                            $company_logoFile = 'img/logo.png';
                                        }
                                    @endphp
                                    <div class="company-list-logo">
                                        <a href="#">
                                            <img src="{{asset($company_logoFile)}}" alt="company list 1" height="45"/>
                                        </a>
                                    </div>
                                    <div class="company-list-details">
                                        <h3><a href="#">{{$similar_job->job_title}}</a></h3>
                                        <p class="open-icon"><i class="fa fa-briefcase"></i>{{$similar_job->company->company_name}}</p>
                                        <p class="company-state"><i class="fa fa-map-marker"></i>
                                            {{$similar_job->job_location}}
                                        </p>
                                        <p class="varify"><i class="fa fa-clock-o"></i>{{$similar_job->job_type->job_type}}</p>
                                        {{--<p class="rating-company">4.9</p>--}}
                                    </div>
                                    <div class="company-list-btn">
                                        <a href="{{route('jobs.show', [$similar_job->id, $similar_job->slug])}}" class="jobguru-btn">view details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="single-candidate-bottom-right">
                    @if(Auth::guard('admin')->check() || Auth::guard('employer')->check())
                    @else
                        @php
                            $user_id = null;
                            if(auth()->guard('web')->user()){
                                $user_id = auth()->guard('web')->user()->id;
                            }
                            $job_post_id = $job->id;

                            $appliedUser = \App\JobPostActivity::where('user_account_id', $user_id)->where('job_post_id',$job_post_id);
                        @endphp
                        @if($appliedUser->count() > 0)
                            <p style="background-color: #cd201f; padding: 10px 20px; border-radius: 3px; color: #fff; margin-bottom: 25px; text-align: center">Already Applied</p>
                        @else
                        <div class="single-candidate-widget-2">
                            <form action="{{route('job.apply.submit', $job->id)}}" method="post">
                                @csrf
                                <button class="btn btn-primary jobguru-btn my-btn">Apply Now</button>
                            </form>
                        </div>
                        @endif
                    @endif
                    <div class="single-candidate-widget-2">
                        <h3>Job overview</h3>
                        <ul class="job-overview">
                            <li>
                                <h4><i class="fa fa-briefcase"></i> Offerd Salary</h4>
                                <p>Rs.{{$job->salary}}</p>
                            </li>
                            <li>
                                <h4><i class="fa fa-map-marker"></i> Location</h4>
                                <p>{{$job->job_location}}</p>
                            </li>
                            <li>
                                <h4><i class="fa fa-thumb-tack"></i> Job Type</h4>
                                <p>{{$job->job_type->job_type}}</p>
                            </li>
                            <li>
                                <h4><i class="fa fa-clock-o"></i> Date Posted</h4>
                                <p>{{$job->created_at->diffForHumans()}}</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Single Candidate Bottom End -->
@endsection
