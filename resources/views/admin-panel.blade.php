@extends('layouts.base')

@section('content')
    <section class="jobguru-breadcromb-area">
        <div class="breadcromb-top section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcromb-box">
                            <h3>Admin Dashboard</h3>
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
                                <li class="active-breadcromb"><a href="#">Admin Dashboard</a></li>
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
                <div class="col-md-12 col-lg-3 dashboard-left-border">
                    <div class="dashboard-left">
                        <ul class="dashboard-menu">
                            <li class="{{(\Route::current()->getName() == 'admin-panel' ? 'active' : '')}}">
                                <a href="{{route('admin-panel')}}">
                                    <i class="fa fa-tachometer"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li class="{{(\Route::current()->getName() == 'jobs.show.all' ? 'active' : '')}}"><a href="{{route('jobs.show.all')}}"><i class="fa fa-gavel"></i>Job Posts</a></li>
                            <li class="{{(\Route::current()->getName() == 'employers.show.all' ? 'active' : '')}}"><a href="{{route('employers.show.all')}}"><i class="fa fa-user-circle-o"></i>Employers</a></li>
                            <li class="{{(\Route::current()->getName() == 'admin.logout' ? 'active' : '')}}"><a href="{{route('admin.logout')}}"><i class="fa fa-power-off"></i>LogOut</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="dashboard-right">
                        <div class="welcome-dashboard">
                            <h3>Welcome <span>{{auth()->guard('admin')->user()->name}} !</span></h3>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 col-md-12">
                                <div class="widget_card_page grid_flex widget_bg_blue">
                                    <div class="widget-icon">
                                        <i class="fa fa-gavel"></i>
                                    </div>
                                    <div class="widget-page-text">
                                        <h4>{{$job_posts->count()}}</h4>
                                        <h2>job Posts</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="widget_card_page grid_flex  widget_bg_purple">
                                    <div class="widget-icon">
                                        <i class="fa fa-graduation-cap"></i>
                                    </div>
                                    <div class="widget-page-text">
                                        <h4>{{$candidates->count()}}</h4>
                                        <h2> Candidates</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="widget_card_page grid_flex widget_bg_dark_red">
                                    <div class="widget-icon">
                                        <i class="fa fa-user-circle-o"></i>
                                    </div>
                                    <div class="widget-page-text">
                                        <h4>{{$employers->count()}}</h4>
                                        <h2>Employers</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Candidate Dashboard Area End -->
@endsection
