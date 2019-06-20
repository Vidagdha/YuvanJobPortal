<?php

namespace App\Http\Controllers;

use App\SeekerProfile;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::all()->where('id', $user_id)->first();
        $profile = SeekerProfile::all()->where('user_account_id', $user_id)->first();
        return view('home', compact(['user','profile']));
    }
}
