@extends('layouts.base')

@section('content')
    <!-- Single Candidate Start -->
    <section class="single-candidate-page section_20">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-2">
                    <div class="single-candidate-box">
                        @php
                            $company_logoFile;
                            $resumeFile;
                            if((!empty($jobs->company['company_logo']))){
                                $company_logoFile = Storage::url($jobs->company->company_logo);
                            }else{
                                $company_logoFile = 'img/logo.png';
                            }
                        @endphp
                        <div class="single-candidate-img">
                            <img src="{{asset($company_logoFile)}}" alt="single candidate" />
                        </div>
                        <div class="single-candidate-box-right">
                            <h4>{{$company->company_name}}</h4>
                            <p>{{$company->company_slogan}}</p>
                            @php $established = date('d-m-Y', strtotime($company->establishment_date)); @endphp
                            <p style="font-family: 'Open Sans',sans-serif;">Estd. on {{$established}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                </div>
            </div>
        </div>
    </section>
    <!-- Single Candidate End -->


    <!-- Single Candidate Bottom Start -->
    <div class="single-candidate-bottom-area section_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-8">
                    <div class="single-candidate-bottom-left">
                        <div class="single-candidate-widget">
                            <h3>company description</h3>
                            <p>{{$company->profile_description}}</p>
                        </div>
                        <div class="single-candidate-widget">
                            <h3>({{$company->job_posts->where('is_active','=','1')->count()}}) Open Positions</h3>
                            @foreach($company->job_posts->where('is_active','=','1') as $job)
                                <div class="sidebar-list-single">
                                    <div class="top-company-list">
                                        <div class="company-list-logo">
                                            <a href="#">
                                                <img src="{{asset($company_logoFile)}}" alt="company list 1" height="45"/>
                                            </a>
                                        </div>
                                        <div class="company-list-details">
                                            <h3><a href="#">{{$job->job_title}}</a></h3>
                                            <p class="open-icon"><i class="fa fa-briefcase"></i>{{$job->company->company_name}}</p>
                                            <p class="company-state"><i class="fa fa-map-marker"></i>
                                                {{$job->job_location}}
                                            </p>
                                            <p class="varify"><i class="fa fa-clock-o"></i>{{$job->job_type->job_type}}</p>
                                            {{--<p class="rating-company">4.9</p>--}}
                                        </div>
                                        <div class="company-list-btn">
                                            <a href="{{route('jobs.show', [$job->id, $job->slug])}}" class="jobguru-btn">view details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="single-candidate-bottom-right">
                        <div class="single-candidate-widget-2">
                            <h3>Contact Details</h3>
                            <ul>
                                <li><i class="fa fa-phone"></i> {{$company->company_contact}}</li>
                                <li><i class="fa fa-globe"></i> {{$company->company_website_url}}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Candidate Bottom End -->
@endsection
