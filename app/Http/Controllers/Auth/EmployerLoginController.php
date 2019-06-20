<?php

namespace App\Http\Controllers\Auth;

use App\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class EmployerLoginController extends Controller
{
    public function __construct(){
        $this->middleware('guest:employer', ['except' => ['logout']]);
    }

    public function showLoginForm(){
        return view('auth.employer-login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('employer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            $company = new Company();
            $company::create([
                'employer_id' => auth()->guard('employer')->user()->id,
            ]);
            return redirect()->intended(route('employer-panel'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('employer')->logout();

        return redirect('/');
    }
}
