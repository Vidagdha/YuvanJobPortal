@extends('layouts.base')

@section('content')
    <!-- Breadcromb Area Start -->
    <section class="jobguru-breadcromb-area">
        <div class="breadcromb-top section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcromb-box">
                            <h3>Company Profile</h3>
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
                                <li class="active-breadcromb"><a href="#">company profile</a></li>
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
                                  action="{{route('company.profile.submit')}}" enctype="multipart/form-data">
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
                                    <div class="single-resume-feild resume-avatar">
                                        <div class="resume-image">
                                            @php
                                                $company_logoFile;
                                                $resumeFile;
                                                if((!empty($company->company_logo))){
                                                    $company_logoFile = Storage::url($company->company_logo);
                                                }else{
                                                    $company_logoFile = 'img/user-avatar.png';
                                                }
                                            @endphp
                                            <img src="{{asset($company_logoFile)}}" alt="company logo">
                                            <div class="resume-avatar-hover">
                                                <div class="resume-avatar-upload">
                                                    <p>
                                                        <i class="fa fa-pencil"></i>
                                                        Edit
                                                    </p>
                                                    <input type="file" name="company_logo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="candidate-single-profile-info">
                                    <form>
                                        <div class="resume-box">
                                            <h3>Company Profile</h3>
                                            @php
                                                if($company == null){
                                                    $company_name = '';
                                                    $company_slogan = '';
                                                    $establishment_date = '';
                                                    $company_contact = '';
                                                    $business_stream = '';
                                                    $company_website_url = '';
                                                    $profile_description = '';
                                                    $company_address = '';
                                                }else{
                                                    $company_name = $company->company_name;
                                                    $company_slogan = $company->company_slogan;
                                                    $establishment_date = $company->establishment_date;
                                                    $company_contact = $company->company_contact;
                                                    if($company->business_stream == null){
                                                    $business_stream = '';
                                                    }else{
                                                    $business_stream = $company->business_stream->business_stream_name;
                                                    }
                                                    $company_website_url = $company->company_website_url;
                                                    $profile_description = $company->profile_description;
                                                    $company_address = $company->company_address;
                                                }
                                            @endphp
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <label for="company_name">Company Name:</label>
                                                    <input type="text" name="company_name" value="{{$company_name}}">
                                                </div>
                                                <div class="single-input">
                                                    <label for="company_slogan">Slogan:</label>
                                                    <input type="text" name="company_slogan" value="{{$company_slogan}}">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <label for="establishment_date">Established On:</label>
                                                    <input class="dob" type="date" name="establishment_date" id="datepicker" style="padding: 5.7px 10px !important" value="{{$establishment_date}}">
                                                </div>
                                                <div class="single-input">
                                                    <label for="company_contact">Contact No:</label>
                                                    <input type="text" name="company_contact" value="{{$company_contact}}">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <label for="business_stream_id">Business Stream:</label>
                                                    <select class="form-control my-select" name="business_stream_id">

                                                        <option>Select Business Stream</option>

                                                        @foreach ($business_streams as $key => $value)
                                                            <option value="{{ $value }}" {{ ( $key == $business_stream) ? 'selected' : '' }}>
                                                                {{ $key }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="single-input">
                                                    <label for="company_website_url">Website:</label>
                                                    <input type="text" name="company_website_url" value="{{$company_website_url}}">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild ">
                                                <div class="single-input">
                                                    <label for="profile_description">Description:</label>
                                                    <textarea name="profile_description">{{$profile_description}}</textarea>
                                                </div>
                                                <div class="single-input">
                                                    <label for="company_address">Address:</label>
                                                    <textarea name="company_address">{{$company_address}}</textarea>
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
