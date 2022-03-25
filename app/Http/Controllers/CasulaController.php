<?php

namespace App\Http\Controllers;

use App\Models\Corporate\Agent;
use App\Models\Corporate\Award;
use App\Models\Corporate\Page;
use App\Models\Corporate\PageDetail;
use App\Models\Corporate\Service;
use App\Models\Corporate\Slider;
use App\Models\Corporate\Testimonial;
use DB;
use Dymantic\InstagramFeed\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Phpfastcache\Helper\Psr16Adapter;

class CasulaController extends Controller
{
   public function index($page)
   {
    $insta_posts = [];
    if (Cache::has('instagram_post')){
        $insta_posts = Cache::get('instagram_post');
    }else {
        $instagram = \InstagramScraper\Instagram::withCredentials(new \GuzzleHttp\Client(), 'multidynamic.ingleburn', 'mdingleburn123!', new Psr16Adapter('Files'));
        $instagram->login(); // will use cached session if you want to force login $instagram->login(true)
        $instagram->saveSession();  //DO NOT forget this in order to save the session, otherwise have no sense
        $account = $instagram->getAccount('multidynamic.ingleburn');
        $accountMedias = $account->getMedias();
        $dir = public_path('insta/images/');
        foreach (glob($dir . '*.*') as $v) {
            unlink($v);
        }

        foreach ($accountMedias as $key => $accountMedia) {
            if ($key < 6) {
                $images[$key] = str_replace("&amp;", "&", $accountMedia->getimageHighResolutionUrl());
                $path = $images[$key];
                $imageName = rand($key, 999999) . '.png';
                $insta_posts[] = $imageName;
                $img = public_path('insta/images/') . $imageName;
                file_put_contents($img, file_get_contents($path));
            }
        }
        Cache::put('instagram_post',$insta_posts,86400);
    }

    // new changes
    $testimonials = Testimonial::where('branch_id', env('BRANCH_ID'))
        ->orderBy('created_at', 'desc')
        ->get();

    $agents = Agent::where('branch_id', env('BRANCH_ID'))->where('is_active', 'Y')
        ->orderBy('created_at', 'desc')
        ->get();

    // gettting home page extra content
    $home = Page::where('slug', 'home')->first();
    $pageDetail = Page::where('slug', 'page-detail')->first();
    if (isset($pageDetail) && $pageDetail != null) {
        $home['content'] = PageDetail::where('page_id', $pageDetail->id)->where('slug', $page.'-content')->first();
        $home['banner'] = PageDetail::where('page_id', $pageDetail->id)->where('slug', $page.'-banner')->first();
        $home['read_more_img'] = PageDetail::where('page_id', $pageDetail->id)->where('slug', $page.'-read-more-img')->first();
        $home['hidden_content'] = PageDetail::where('page_id', $pageDetail->id)->where('slug', $page.'-hidden-content')->get();
    }

    if(!$home['content'] && !$home['banner']){
        abort(404);
    }
    // getting selling page content
    $selling = Page::where('slug', 'selling')->first();
    if (isset($selling) && $selling != null) {
        $home['selling'] = PageDetail::where('page_id', $selling->id)->where('slug', 'selling-your-home')->first();
        $home['buying'] = PageDetail::where('page_id', $selling->id)->where('slug', 'buying-a-home')->first();

    }
    // dd($home);
    // return view('home')
    //     ->withProperties($properties)
    //     ->withBlogs($blogs);
    
    return view('frontend.casula.casula')
        ->withTestimonials($testimonials)
        ->withAgents($agents)
        ->withHome($home)
        ->withPosts($insta_posts);
   }
}
