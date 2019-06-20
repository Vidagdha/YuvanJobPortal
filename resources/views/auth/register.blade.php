@extends('layouts.base')

@section('content')
<!-- Breadcrumb Area Start -->
<section class="jobguru-breadcromb-area">
    <div class="breadcromb-top section_100">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcromb-box">
                        <h3>Candidate Registration</h3>
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
                            <li class="active-breadcromb"><a href="#">Candidate Registration</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Area End -->

<!-- Login Area Start -->
<section class="jobguru-login-area section_70">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    <div class="login-title">
                        <h3>Sign up</h3>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="single-login-field">
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <div class="single-login-field">
                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Choose Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="single-login-field">
                            <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                        <div class="single-login-field">
                            <button type="submit">Sign Up</button>
                        </div>
                    </form>
                    <div class="dont_have">
                        <a href="/login">Already have an account?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Login Area End -->
@endsection
