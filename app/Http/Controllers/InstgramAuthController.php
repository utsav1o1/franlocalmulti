<?php

namespace App\Http\Controllers;

class InstgramAuthController extends Controller
{
    public function show()
    {
        $profile = \Dymantic\InstagramFeed\Profile::where('username', 'dibbyakarki')->first();
        return view('instagram-auth-page', ['instagram_auth_url' => $profile->getInstagramAuthUrl()]);
    }
}
