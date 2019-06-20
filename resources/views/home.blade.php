@extends('layouts.base')

@section('content')
    <!-- Breadcromb Area Start -->
    <section class="jobguru-breadcromb-area">
        <div class="breadcromb-top section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcromb-box">
                            <h3>Profile</h3>
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
                                <li class="active-breadcromb"><a href="#">My Profile</a></li>
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
                            {{--<li>--}}
                                {{--<a href="candidate-dashboard.html">--}}
                                    {{--<i class="fa fa-tachometer"></i>--}}
                                    {{--Dashboard--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            <li class="active">
                                <a href="candidate-profile.html">
                                    <i class="fa fa-users"></i>
                                    My Profile
                                </a>
                            </li>
                            {{--<li><a href="message.html"><i class="fa fa-envelope-open"></i>messages</a></li>--}}
                            {{--<li><a href="manage-jobs.html"><i class="fa fa-briefcase"></i>manage jobs</a></li>--}}
                            {{--<li><a href="candidate-earnings.html"><i class="fa fa-rocket"></i>earnings</a></li>--}}
                            {{--<li><a href="change-password.html"><i class="fa fa-lock"></i>change password</a></li>--}}
                            <li><a href="{{route('user.logout')}}"><i class="fa fa-power-off"></i>LogOut</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="dashboard-right">
                        <div class="candidate-profile">
                            <form method="POST"
                                  action="{{route('user.profile.update')}}" enctype="multipart/form-data">
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
                                                $avatarFile;
                                                $resumeFile;
                                                if((!empty($profile->avatar))){
                                                    $avatarFile = Storage::url($profile->avatar);
                                                }else{
                                                    $avatarFile = 'img/user-avatar.png';
                                                }
                                                if((!empty($profile->resume))){
                                                    $resumeFile = Storage::url($profile->resume);
                                                }else{
                                                    $resumeFile = null;
                                                }
                                            @endphp
                                            <img src="{{asset($avatarFile)}}" alt="resume avatar">
                                            <div class="resume-avatar-hover">
                                                <div class="resume-avatar-upload">
                                                    <p>
                                                        <i class="fa fa-pencil"></i>
                                                        Edit
                                                    </p>
                                                    <input type="file" name="avatar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="candidate-single-profile-info">
                                    <form>
                                        <div class="resume-box">
                                            <h3>My Profile</h3>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <label for="first_name">First Name:</label>
                                                    <input type="text" name="first_name" value="{{$profile->first_name}}">
                                                </div>
                                                <div class="single-input">
                                                    <label for="last_name">Last Name:</label>
                                                    <input type="text" name="last_name" value="{{$profile->last_name}}">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <label for="last_name" style="display: block;">Gender:</label>
                                                    <input type="radio" id="male" name="gender" value="Male"
                                                           @if($profile->gender == "Male")
                                                           checked
                                                           @endif
                                                    >
                                                    <label for="male" style="margin-right: 20px;">Male</label>
                                                    <input type="radio" id="female" name="gender" value="Female"
                                                           @if($profile->gender == "Female")
                                                           checked
                                                        @endif
                                                    >
                                                    <label for="female" style="margin-right: 20px;">Female</label>
                                                    <input type="radio" id="other" name="gender" value="Other"
                                                           @if($profile->gender == "Other")
                                                           checked
                                                        @endif
                                                    >
                                                    <label for="other" style="margin-right: 20px;">Other</label>
                                                </div>
                                                <div class="single-input">
                                                    @php ($dob = $profile->date_of_birth) @endphp
                                                    <label for="dob">Date of Birth:</label>
                                                    <input class="dob" type="date" name="dob" id="datepicker" style="padding: 5.7px 10px !important" value="{{$dob}}">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild ">
                                                <div class="single-input">
                                                    <label for="bio">Bio:</label>
                                                    <textarea name="bio">{{$profile->bio}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="resume-box">
                                            <h3>Contact Information</h3>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <label for="street_address">Street Address:</label>
                                                    <input type="text" name="street_address" value="{{$profile->street_address}}">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <label for="city">City:</label>
                                                    <input type="text" name="city" value="{{$profile->city}}">
                                                </div>
                                                <div class="single-input">
                                                    <label for="state">State:</label>
                                                    <input type="text" name="state" value="{{$profile->state}}">
                                                </div>
                                                <div class="single-input">
                                                    <label for="country">country:</label>
                                                    <input type="text" name="country" value="{{$profile->country}}">
                                                </div>
                                            </div>
                                            <div class="single-resume-feild feild-flex-2">
                                                <div class="single-input">
                                                    <label for="contact_number">Contact No:</label>
                                                    <input type="text" name="contact_number" value="{{$profile->contact_number}}">
                                                </div>
                                                <div class="single-input">
                                                    <label for="zip">Zip/Pin Code:</label>
                                                    <input type="text" name="zip" value="{{$profile->zip}}">
                                                </div>
                                                <div class="single-input">
                                                    <label style="display: block;" for="resume">Resume:</label>
                                                    <div class="resume-avatar-upload resume">
                                                        <p>
                                                            <i class="fa fa-files-o"></i>
                                                            Choose File
                                                        </p>
                                                        <input type="file" name="resume">
                                                    </div>
                                                    @if((!empty($resumeFile)))
                                                        <p><a href="{{$resumeFile}}" class="download-link"><small class="fa fa-link" style="font-size: 80%; margin-right: 4px"></small>Download Resume</a></p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="submit-resume">
                                            <button type="submit">Update</button>
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
