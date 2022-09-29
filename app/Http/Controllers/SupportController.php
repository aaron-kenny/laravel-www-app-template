<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Notification;
use App\Notifications\UserRequestedSupport;

class SupportController extends Controller
{
    public function index()
    {
        return view('support.index');
    }
    
    public function create()
    {
        return view('support.create');
    }
    
    public function store()
    {
        $validatedRequestData = request()->validate([
            'name' => 'required|max:30',
            'email' => 'required|email',
            'message' => 'required|max:600',
        ]);

        Notification::route('mail', 'INSERT_NOTIFICATION_EMAIL_ADDRESS')->notify(new UserRequestedSupport($validatedRequestData));

        return redirect()->route('support.create')->with('status', 'Support request recieved, we will get back to you shortly!');
    }
}