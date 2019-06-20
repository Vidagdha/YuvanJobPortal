<?php

namespace App\Http\Controllers;

use App\SeekerProfile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        $user_id = auth()->user()->id;
        if($request->hasFile('avatar')) {
            $avatar = $request->file('avatar')->store('public/uploads/avatar');
        }else{
            $avatar = null;
        }
        if($request->hasFile('resume')) {
            $resume = $request->file('resume')->store('public/uploads/resume');
        }else{
            $resume = null;
        }
        if(SeekerProfile::where('user_account_id', $user_id)->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
            'date_of_birth' => request('dob'),
            'gender' => request('gender'),
            'avatar' => $avatar,
            'bio' => request('bio'),
            'contact_number' => request('contact_number'),
            'street_address' => request('street_address') ,
            'city' => request('city'),
            'state' => request('state'),
            'country' => request('country'),
            'zip' => request('zip'),
            'resume' => $resume,
        ])){
            return redirect()->back()->with('success', 'Profile successfully updated');
        }else{
            return redirect()->back()->with('failure', 'Sorry! Something went wrong');
        }
    }

    public function destroy($id)
    {
        //
    }
}
