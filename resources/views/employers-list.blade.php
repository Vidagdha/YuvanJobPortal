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
                                <li class=""><a href="#">Employers</a></li>
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
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="widget_card_page grid_flex widget_bg_blue">
                                    @if($employersList->count() != 0)
                                        <div class="table-responsive" style="margin-top: 20px;">
                                            <table class="table data-table table-bordered table-sm">
                                                <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Company</th>
                                                    <th scope="col">Email</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php $paginated_employersList = $employersList->paginate(5) @endphp
                                                @foreach($paginated_employersList as $employer)
                                                    <tr>
                                                        <th scope="row">{{$loop->iteration}}</th>
                                                        <td>{{$employer->id}}</td>
                                                        <td>{{$employer->name}}</td>
                                                        <td>{{$employer->company['company_name']}}</td>
                                                        <td>{{$employer->email}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            {{$paginated_employersList->links()}}
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
