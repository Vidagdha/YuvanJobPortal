
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Yuvan Jobs</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('img/favicon/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('css/overrides.css')}}">
</head>
<body>


<!-- Header Area Start -->
@include('layouts.navbar')
<!-- Header Area End -->


<!-- Banner Area Start -->
<section class="jobguru-banner-area">
    <div class="banner-slider owl-carousel">
        <div class="banner-single-slider slider-item-1">
            <div class="slider-offset"></div>
        </div>
        <div class="banner-single-slider slider-item-2">
            <div class="slider-offset"></div>
        </div>
    </div>
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="banner-search">
                        <h2>Hire expert freelancers.</h2>
                        <h4>We have 1542 job offers for you! </h4>
                        <form action="{{route('search')}}" method="POST">
                            @csrf
                            <div class="banner-form-box">
                                <div class="banner-form-input">
                                    <input type="text" name="query" placeholder="Job Title, Keywords, or Phrase">
                                </div>
                                {{--<div class="banner-form-input">--}}
                                    {{--<input type="text" placeholder="City, State or ZIP">--}}
                                {{--</div>--}}
                                {{--<div class="banner-form-input">--}}
                                    {{--<select class="banner-select">--}}
                                        {{--<option selected>Select Sector</option>--}}
                                        {{--<option value="1">Design & multimedia</option>--}}
                                        {{--<option value="2">Programming & tech</option>--}}
                                        {{--<option value="3">Accounting/finance</option>--}}
                                        {{--<option value="4">content writting</option>--}}
                                        {{--<option value="5">Training</option>--}}
                                        {{--<option value="6">Digital Marketing</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                                <div class="banner-form-input">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Area End -->


<section class="jobguru-job-tab-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="site-heading">
                    <h2><span>latest job offers</span></h2>
                    <p></p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-companies" role="tabpanel" aria-labelledby="pills-companies-tab">
                        <div class="top-company-tab">
                            <ul>
                                @foreach($jobs as $job)
                                <li>
                                    <div class="top-company-list">
                                        @php
                                            $company_logoFile;
                                            $resumeFile;
                                            if((!empty($jobs->company['company_logo']))){
                                                $company_logoFile = Storage::url($jobs->company['company_logo']);
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
                                            <h3><a href="#">{{$job->job_title}}</a></h3>
                                            <p class="open-icon"><i class="fa fa-briefcase"></i>{{$job->company['company_name']}}</p>
                                            <p class="company-state"><i class="fa fa-map-marker"></i>
                                                {{$job->job_location}}
                                            </p>
                                            <p class="varify"><i class="fa fa-clock-o"></i>{{$job->job_type->job_type}}</p>
                                            {{--<p class="rating-company">4.9</p>--}}
                                        </div>
                                        <div class="company-list-btn">
                                            <a href="{{route('jobs.show', [$job->id, $job->slug])}}" class="jobguru-btn">View Details</a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="">
                    {{ $jobs->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Job Tab Area End -->


<!-- Video Area Start -->
<section class="jobguru-video-area section_100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="video-container">
                    <h2>Hire experts freelancers today for <br> any job, any time.</h2>
                    <div class="video-btn">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=k-R6AFn9-ek">
                            <i class="fa fa-play"></i>
                            how it works
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Video Area End -->


<!-- How Works Area Start -->
{{--<section class="how-works-area section_70">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="site-heading">--}}
                    {{--<h2>how it <span>works</span></h2>--}}
                    {{--<p>It's easy. Simply post a job you need completed and receive competitive bids from freelancers within minutes</p>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="how-works-box box-1">--}}
                    {{--<img src="{{asset('img/arrow-right-top.png')}}" alt="works" />--}}
                    {{--<div class="works-box-icon">--}}
                        {{--<i class="fa fa-user"></i>--}}
                    {{--</div>--}}
                    {{--<div class="works-box-text">--}}
                        {{--<p>sign up</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="how-works-box box-2">--}}
                    {{--<img src="{{asset('img/arrow-right-bottom.png')}}" alt="works" />--}}
                    {{--<div class="works-box-icon">--}}
                        {{--<i class="fa fa-gavel"></i>--}}
                    {{--</div>--}}
                    {{--<div class="works-box-text">--}}
                        {{--<p>post job</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="how-works-box box-3">--}}
                    {{--<div class="works-box-icon">--}}
                        {{--<i class="fa fa-thumbs-up"></i>--}}
                    {{--</div>--}}
                    {{--<div class="works-box-text">--}}
                        {{--<p>choose expert</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
<!-- How Works Area End -->


<!-- Footer Area Start -->
<footer class="jobguru-footer-area">
    <div class="footer-top section_50">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="single-footer-widget">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{asset('img/logo.png')}}" alt="jobguru logo" />
                            </a>
                        </div>
                        <p>Aliquip exa consequat dui aut repahend vouptate elit cilum fugiat pariatur lorem dolor cit amet consecter adipisic elit sea vena eiusmod nulla</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="single-footer-widget footer-contact">
                        <h3>Contact Info</h3>
                        <p><i class="fa fa-map-marker"></i> 4257 Street, SunnyVale, USA </p>
                        <p><i class="fa fa-phone"></i> 012-3456-789</p>
                        <p><i class="fa fa-envelope-o"></i> support@yuvan.co</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright-left">
                        <p>Copyright &copy; 2019 Yuvan. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Area End -->


<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/jquery-perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('js/select2.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.min.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
</body>
</html>

