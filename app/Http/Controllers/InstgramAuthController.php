<?php

namespace App\Http\Controllers;

class InstgramAuthController extends Controller
{
    public function show()
    {
        $profile = \Dymantic\InstagramFeed\Profile::where('username', env('INSTAGRAM_USERNAME'))->first();
        return view('instagram-auth-page', ['instagram_auth_url' => $profile->getInstagramAuthUrl()]);
    }
}
