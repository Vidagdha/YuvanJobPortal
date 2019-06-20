@if(Auth::guard('web')->check())
    <p class="text-success">
        Your are Logged in as <strong>USER</strong>
    </p>
@else
    <p class="text-danger">
        Your are Logged Out as <strong>USER</strong>
    </p>
@endif

@if(Auth::guard('admin')->check())
    <p class="text-success">
        Your are Logged in as <strong>ADMIN</strong>
    </p>
@else
    <p class="text-danger">
        Your are Logged Out as <strong>ADMIN</strong>
    </p>
@endif

@if(Auth::guard('employer')->check())
    <p class="text-success">
        Your are Logged in as <strong>EMPLOYER</strong>
    </p>
@else
    <p class="text-danger">
        Your are Logged Out as <strong>EMPLOYER</strong>
    </p>
@endif
