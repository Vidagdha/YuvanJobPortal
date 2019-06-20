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
                                <li class=""><a href="#">Job Posts</a></li>
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
                            <h3>job Posts List</span></h3>
                            @if(Session::has('success'))
                                <div class="alert alert-success auto-fade" role="alert" style="margin-top: 15px;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{Session::get('success')}}
                                </div>
                            @elseif(Session::has('failure'))
                                <div class="alert alert-danger auto-fade" role="alert" style="margin-top: 15px;">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    {{Session::get('failure')}}
                                </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="widget_card_page grid_flex widget_bg_blue">
                                    @if($job_posts->count() != 0)
                                        <div class="table-responsive" style="margin-top: 20px;">
                                            <table class="table data-table table-bordered table-sm">
                                                <thead>
                                                <tr>
                                                    <th scope="col" style="max-width: 200px">Job Title</th>
                                                    <th scope="col" style="max-width: 200px">Company</th>
                                                    <th scope="col" style="max-width: 200px">Last Date</th>
                                                    <th scope="col" style="max-width: 200px">Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $paginated_job_posts = $job_posts->paginate(10) @endphp
                                                @foreach($paginated_job_posts as $job_post)
                                                    <tr>
                                                        <td style="max-width: 200px">{{$job_post->job_title}}</td>
                                                        <td style="max-width: 200px">{{$job_post->company['company_name']}}</td>
                                                        <td style="max-width: 200px">{{$job_post->last_date}}</td>
                                                        <td style="max-width: 200px; text-align: center;">
                                                            @if($job_post->is_active == 0)
                                                            <form action="{{route('approve.job', $job_post->id)}}" method="post">
                                                                @csrf
                                                                <button type="submit" class="btn btn-primary jobguru-btn my-btn">Approve</button>
                                                            </form>
                                                            @else
                                                            <span class="text-success font-italic">Approved</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$paginated_job_posts->links()}}
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
