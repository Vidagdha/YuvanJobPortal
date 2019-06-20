@extends('layouts.base')

@section('content')
    <!-- Breadcromb Area Start -->
    <section class="jobguru-breadcromb-area">
        <div class="breadcromb-top section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcromb-box">
                            <h3>Employer Dashboard</h3>
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
                                <li class="active-breadcromb"><a href="#">Employer Dashboard</a></li>
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
                        <div class="welcome-dashboard">
                            <h3>Welcome <span>{{auth()->guard('employer')->user()->name}} !</span></h3>
                        </div>
                        {{--<div class="row">--}}
                            {{--<div class="col-lg-4 col-md-12">--}}
                                {{--<div class="widget_card_page grid_flex widget_bg_blue">--}}
                                    {{--<div class="widget-icon">--}}
                                        {{--<i class="fa fa-gavel"></i>--}}
                                    {{--</div>--}}
                                    {{--<div class="widget-page-text">--}}
                                        {{--<h4>{{$job_posts->count()}}</h4>--}}
                                        {{--<h2>job Posts</h2>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Candidate Dashboard Area End -->
@endsection
