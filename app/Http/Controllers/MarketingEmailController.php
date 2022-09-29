<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class MarketingEmailController extends Controller
{
    public function __construct()
    {
        //
    }

    public function store()
    {
        request()->validate([
            'email' => 'required|email',
        ]);

        $data = [
            'contact' => [
                'email' => request('email')
            ]
        ];

        $response = Http::withHeaders([
            'Api-Token' => config('services.activeCampaign.key')
        ])->post('https://INSERT_ACTIVE_CAMPAIGN_ENDPOINT/api/3/contact/sync', $data);

        $contactId = $response->json()['contact']['id'];

        $data = [
            'contactList' => [
                'list' => '2',
                'contact' => $contactId,
                'status' => '1' // Subscribed
            ]
        ];

        $response = Http::withHeaders([
            'Api-Token' => config('services.activeCampaign.key')
        ])->post('https://INSERT_ACTIVE_CAMPAIGN_ENDPOINT/api/3/contactLists', $data);

        if($response->successful()) {
            return back()->with('status', 'You\'ve successfully signed up to our email list. We\'ll keep you updated with new product releases.');
        } elseif($response->failed()) {
            return back()->with('status', 'Sorry, something went wrong. Please try again later.');
        }
    }
}
