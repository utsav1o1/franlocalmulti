<?php

namespace App\Http\Controllers;

use Phpfastcache\Helper\Psr16Adapter;

class InstgramController extends Controller
{
    public function show()
    {
        $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(), 'bhuwan.oza', 'L@mbofgod9848483785', new Psr16Adapter('Files'));
        $instagram->login(); // will use cached session if you want to force login $instagram->login(true)
        $instagram->saveSession();  //DO NOT forget this in order to save the session, otherwise have no sense
        $account = $instagram->getAccount('bhuwan.oza');
        $accountMedias = $account->getMedias();
        $dir = public_path('insta/images/');
        foreach(glob($dir.'*.*') as $v){
            unlink($v);
        }
        foreach ($accountMedias as $key  => $accountMedia) {
            $images[$key] = str_replace("&amp;","&", $accountMedia->getimageHighResolutionUrl());
            $path = $images[$key];
            $imageName = rand($key,999999).'.png';
            $img = public_path('insta/images/') . $imageName;
            file_put_contents($img, file_get_contents($path));
        }

    }
}
