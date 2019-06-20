@extends('layouts.base')

@section('content')
    <!-- Breadcromb Area Start -->
    <section class="jobguru-breadcromb-area">
        <div class="breadcromb-top section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcromb-box">
                            <h3>Create Job Post</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcromb-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcromb-box-pagin">
                            <ul>
                                <li><a href="#">home</a></li>
                                <li><a href="#">employer</a></li>
                                <li class="active-breadcromb"><a href="#">create job post</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcromb Area End -->


    <!-- Candidate Dashboard Area Start -->
    <section class="candidate-dashboard-area section_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 dashboard-left-border">
                    <div class="dashboard-left">
                        <ul class="dashboard-menu">
                            <li class="{{(\Route::current()->getName() == 'employer-panel' ? 'active' : '')}}">
                                <a href="{{route('employer-panel')}}">
                                    <i class="fa fa-tachometer"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="{{(\Route::current()->getName() == 'company.profile' ? 'active' : '')}}"><a href="{{route('company.profile')}}"><i class="fa fa-gavel"></i>Company Profile</a></li>
                            <li class="{{(\Route::current()->getName() == 'post.job' ? 'active' : '')}}"><a href="{{route('post.job')}}"><i class="fa fa-user-circle-o"></i>Post Job</a></li>
                            <li class="{{(\Route::current()->getName() == 'job.application.show' ? 'active' : '')}}"><a href="{{route('job.application.show')}}"><i class="fa fa-user-circle-o"></i>Job Applications</a></li>
                            {{--<li class="{{(\Route::current()->getName() == 'view.jobs' ? 'active' : '')}}"><a href="{{route('view.jobs')}}"><i class="fa fa-user-circle-o"></i>View Jobs</a></li>--}}
                            <li class="{{(\Route::current()->getName() == 'employer.logout' ? 'active' : '')}}"><a href="{{route('employer.logout')}}"><i class="fa fa-power-off"></i>LogOut</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="dashboard-right">
                        <div class="candidate-profile">
                            <form method="POST"
                                  action="{{route('post.job.submit')}}" enctype="multipart/form-data">
                                @csrf
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
                                <div class="candidate-single-profile-info">
                                    <form>
                                        <div class="resume-box">
                                            <h3>Job Post</h3>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <label for="job_title">Job Title:</label>
                                                    <input type="text" name="job_title" value="">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <label for="job_type_id">Job Type:</label>
                                                    <select class="form-control my-select" name="job_type_id">

                                                        <option>Select Job Type</option>

                                                        @foreach ($job_types as $key => $value)
                                                            <option value="{{ $value }}">
                                                                {{ $key }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="single-input">
                                                    <label for="salary">Salary:</label>
                                                    <input type="text" name="salary" value="" placeholder="in Rupees">
                                                </div>
                                                <div class="single-input">
                                                    <label for="last_date">Last Date:</label>
                                                    <input class="dob" type="date" name="last_date" id="datepicker" style="padding: 5.7px 10px !important" value="">
                                                </div>
                                                <div class="single-input">
                                                    <label for="job_location">Job Location:</label>
                                                    <input type="text" name="job_location" value="">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild ">
                                                <div class="single-input">
                                                    <label for="job_description">Job Description:</label>
                                                    <textarea name="job_description"></textarea>
                                                </div>
                                                <div class="single-input">
                                                    <label for="required_skills">Required Skills:</label>
                                                    <textarea name="required_skills"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="submit-resume">
                                            <button type="submit">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Candidate Dashboard Area End -->
@endsection
