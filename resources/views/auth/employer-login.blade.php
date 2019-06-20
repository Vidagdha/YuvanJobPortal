@extends('layouts.base')

@section('content')
    <!-- Breadcrumb Area Start -->
    <section class="jobguru-breadcromb-area">
        <div class="breadcromb-top section_100">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="breadcromb-box">
                            <h3>Employer Login</h3>
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
                                <li class="active-breadcromb"><a href="#">Employer Login</a></li>
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
                            <h3>Sign in</h3>
                        </div>
                        <form method="POST" action="{{route('employer.login.submit')}}">
                            @csrf
                            <div class="single-login-field">
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="single-login-field">
                                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="remember-row single-login-field clearfix">
                                <p class="checkbox remember">
                                    <input class="checkbox-spin" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember"><span></span>Remember Me</label>
                                </p>
                                <p class="lost-pass">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">forgot password?</a>
                                    @endif
                                </p>
                            </div>
                            <div class="single-login-field">
                                <button type="submit">Sign in</button>
                            </div>
                        </form>
                        <div class="dont_have">
                            <a href="{{route('employer.register')}}">Don't have an account?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Area End -->
@endsection
