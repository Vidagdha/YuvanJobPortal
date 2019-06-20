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
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="widget_card_page grid_flex widget_bg_blue">
                                    @if($job_post_activities->count() != 0)
                                        <div class="table-responsive" style="margin-top: 20px;">
                                            <table class="table data-table table-bordered table-sm">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Job Title</th>
                                                    <th scope="col">Candidate Name</th>
                                                    <th scope="col">Application Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $paginated_job_post_activities = $job_post_activities->paginate(10) @endphp
                                                @foreach($paginated_job_post_activities as $job_post_activity)
                                                    @php
                                                    $user_id = $job_post_activity->user_account_id;
                                                    $profile = \App\SeekerProfile::where('user_account_id',$user_id)->first();
                                                    @endphp
                                                    <tr>
                                                        <th scope="row">{{$loop->iteration}}</th>
                                                        <td>{{$job_post_activity->job_post['job_title']}}</td>
                                                        <td>{{$profile->first_name}} {{$profile->last_name}}</td>
                                                        <td>{{$job_post_activity->apply_date}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$paginated_job_post_activities->links()}}
                                        </div>

                                    @endif
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
