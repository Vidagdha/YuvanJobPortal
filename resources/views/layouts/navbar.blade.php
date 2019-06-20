<header>
    <div class="logo">
        <img src="{{asset('img/logo.png')}}" alt="Yuvan">
    </div>
    <nav>
        {{--<ul>--}}
            {{--<li class="active"><a href="" class="menu-link">Home</a></li>--}}
            {{--<li><a href="" class="menu-link">For Employers</a></li>--}}
            {{--<li><a href="" class="post-job-btn">Post Job</a></li>--}}
            {{--<li><a href="" class="menu-link"><i class="fa fa-user"></i>Register</a></li>--}}
            {{--<li><a href="" class="menu-link"><i class="fa fa-sign-in"></i>Login</a></li>--}}
        {{--</ul>--}}
        @if(Auth::guard('web')->check())
            <ul>
                <li class="{{(\Route::current()->getName() == 'welcome' ? 'active' : '')}}"><a class="menu-link" href="{{route('welcome')}}"><i class="fa fa-home"></i>Home</a></li>
                <li class="{{(\Route::current()->getName() == 'home' ? 'active' : '')}}"><a class="menu-link" href="{{route('home')}}"><i class="fa fa-user"></i>My Profile</a></li>
                <li class="{{(\Route::current()->getName() == 'user.logout' ? 'active' : '')}}"><a class="menu-link" href="{{route('user.logout')}}"><i class="fa fa-sign-out"></i>Logout</a></li>
            </ul>
        @elseif(Auth::guard('admin')->check())
            <ul>
                <li class="{{(\Route::current()->getName() == 'welcome' ? 'active' : '')}}"><a class="menu-link" href="{{route('welcome')}}"><i class="fa fa-home"></i>Home</a></li>
                <li class="{{(\Route::current()->getName() == 'admin-panel' ? 'active' : '')}}"><a class="menu-link" href="{{route('admin-panel')}}"><i class="fa fa-user"></i>Dashboard</a></li>
                <li class="{{(\Route::current()->getName() == 'admin.logout' ? 'active' : '')}}"><a class="menu-link" href="{{route('admin.logout')}}"><i class="fa fa-sign-out"></i>Logout</a></li>
            </ul>
        @elseif(Auth::guard('employer')->check())
            <ul>
                <li class="{{(\Route::current()->getName() == 'welcome' ? 'active' : '')}}"><a class="menu-link" href="{{route('welcome')}}"><i class="fa fa-home"></i>Home</a></li>
                <li class="{{(\Route::current()->getName() == 'employer-panel' ? 'active' : '')}}"><a class="menu-link" href="{{route('employer-panel')}}"><i class="fa fa-user"></i>Dashboard</a></li>
                <li class="{{(\Route::current()->getName() == 'employer.logout' ? 'active' : '')}}"><a class="menu-link" href="{{route('employer.logout')}}"><i class="fa fa-sign-out"></i>Logout</a></li>
            </ul>
        @else
            <ul>
                <li class="{{(\Route::current()->getName() == 'welcome' ? 'active' : '')}}"><a class="post-job-btn" href="{{route('employer-panel')}}" class="post-jobs">Post Jobs</a></li>
                <li class="{{(\Route::current()->getName() == 'register' ? 'active' : '')}}"><a class="menu-link" href="/register"><i class="fa fa-user"></i>sign up</a></li>
                <li class="{{(\Route::current()->getName() == 'login' ? 'active' : '')}}"><a class="menu-link" href="/login"><i class="fa fa-lock"></i>login</a></li>
            </ul>
        @endif
    </nav>
    <div class="menu-toggle">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </div>
</header>
