<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        $full_name = request()->user()->full_name;
        $email = request()->user()->email;
        $gravatar = request()->user()->gravatar;

        return view('account.profile.index', compact('full_name', 'email', 'gravatar'));
    }

    public function edit()
    {
        $first_name = request()->user()->first_name;
        $last_name = request()->user()->last_name;
        $email = request()->user()->email;
        $gravatar = request()->user()->gravatar;

        return view('account.profile.edit', compact('first_name', 'last_name', 'email', 'gravatar'));
    }

    public function update()
    {
        request()->validate([
            'first_name' => 'required|string|max:30',
            'last_name' => 'required|string|max:30',
            'email' => ['required', 'string', 'email', 'max:255', 'confirmed', Rule::unique('users')->ignore(request()->user()->id)]
        ]);

        // TEMPORARY NAME FORMATTING UNTIL FIGURE OUT MUTATOR FOR STRIPE
        $first_name = ucfirst(strtolower(request()->input('first_name')));
        $last_name = ucfirst(strtolower(request()->input('last_name')));
        $email = request()->input('email');
        $email_is_changed = request()->user()->email != request()->email;

        // TODO
        // UPDATE EMAIL IN ACTIVECAMPAIGN

        // Update user instance with input
        request()->user()->fill([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
        ]);

        // Email was changed
        if($email_is_changed) {
            request()->user()->email_verified_at = null;
            if(request()->user()->save()) {
                // UPDATE EMAIL AND NAME IN STRIPE
                if(request()->user()->hasStripeId()) {
                    request()->user()->updateStripeCustomer(['name' => $first_name . ' ' . $last_name, 'email' => $email]);
                }
                request()->user()->sendEmailVerificationNotification();
                return redirect()->route('verification.notice');
            } else {
                return redirect()->route('account.profile.index')->with('error', 'Something went wrong while saving. If this problem persists, please contact support.');
            }
        } else { // Normal update
            if(request()->user()->save()) {
                // UPDATE EMAIL AND NAME IN STRIPE
                if(request()->user()->hasStripeId()) {
                    request()->user()->updateStripeCustomer(['name' => $first_name . ' ' . $last_name, 'email' => $email]);
                }
                return redirect()->route('account.profile.index')->with('status', 'Profile was successfully updated!');
            } else {
                return redirect()->route('account.profile.index')->with('error', 'Something went wrong while saving. If this problem persists, please contact support.');
            }
        }
    }
    
    public function destroy()
    {
        auth()->logout();
        // $user_id = auth()->user()->id;
        // Delete all app data

        // Cancel all subscriptions

        // Logout user

        // Delete user data

        // Email notification sorry to see you go

        // Flash confirmation to session

        // Redirect to login
        return redirect()->route('login');
    }
}