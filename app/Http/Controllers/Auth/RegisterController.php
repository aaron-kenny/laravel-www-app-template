<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserRegistered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Request $request)
    {
        $data = [
            'subscription_name' => $request->input('subscription_name'),
            'plan_id' => $request->input('plan_id'),
        ];

        return view('auth.register', $data);
    }

    protected function validator(array $userData)
    {
        return Validator::make($userData, [
            'first_name' => ['required', 'string', 'max:30'],
            'last_name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    protected function create(array $userData)
    {
        $newUser = [
            'first_name' => $userData['first_name'],
            'last_name' => $userData['last_name'],
            'email' => $userData['email'],
            'password' => $userData['password'],
        ];

        Notification::route('mail', 'support@INSERT_DOMAIN')->notify(new UserRegistered($userData));

        return User::create($newUser);
    }

    public function redirectTo()
    {
        $plan_id = request()->input('plan_id');

        if($plan_id) {
            return route('subscriptions.create', ['plan_id' => $plan_id]);
        } else {
            return route('account.dashboard.index');
        }
    }
}