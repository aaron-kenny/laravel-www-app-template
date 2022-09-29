<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function edit()
    {
        return view('account.password.edit');
    }
    
    public function update()
    {
        request()->validate([
            'password' => 'required|string|min:8|confirmed'
        ]);

        request()->user()->fill([
            'password' => Hash::make(request('password')),
        ]);

        if(request()->user()->save()) {
            return redirect()->route('account.profile.index')->with('status', 'Password was successfully updated!');
        } else {
            return back()->with('error', 'Something went wrong. If the problem persists please contact support.');
        }
    }
}