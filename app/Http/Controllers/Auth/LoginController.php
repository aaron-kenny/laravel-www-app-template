<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm(Request $request)
    {
        $data = [
            'subscription_name' => $request->input('subscription_name'),
            'plan_id' => $request->input('plan_id'),
        ];

        return view('auth.login', $data);
    }

    public function redirectTo()
    {
        // Default is go to intended URL unless normal login, then we can use get parameters
        // to customize the user login/register/subscribe flow
        return route('account.dashboard.index');
    }

    protected function loggedOut(Request $request)
    {
        return back();
    }
}