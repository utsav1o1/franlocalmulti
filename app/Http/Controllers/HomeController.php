<?php

namespace App\Http\Controllers;

use App\Models\Corporate\Agent;
use App\Models\Corporate\Award;
use App\Models\Corporate\Page;
use App\Models\Corporate\PageDetail;
use App\Models\Corporate\Service;
use App\Models\Corporate\Slider;
use App\Models\Corporate\Testimonial;
use App\Repositories\LocationRepository;
use App\Repositories\PropertyCategoryRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\PropertyTypeRepository;
use Auth;
use DB;
use Dymantic\InstagramFeed\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Phpfastcache\Helper\Psr16Adapter;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param PropertyRepository $properties
     * @param PropertyTypeRepository $propertyTypes
     * @param PropertyCategoryRepository $categories
     * @return void
     */
    public function __construct(
        PropertyRepository $properties,
        PropertyTypeRepository $propertyTypes,
        PropertyCategoryRepository $categories,
        LocationRepository $locations
    ) {
        $this->properties = $properties;
        $this->propertyTypes = $propertyTypes;
        $this->categories = $categories;
        $this->locations = $locations;
    }

    /**
     * Show the home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                $images[$key] = str_replace("&amp;", "&", $accountMedia->getimageHighResolutionUrl());
                $path = $images[$key];
                $imageName = rand($key, 999999) . '.png';
                $insta_posts[] = $imageName;
                $img = public_path('insta/images/') . $imageName;
                file_put_contents($img, file_get_contents($path));
            }
            Cache::put('instagram_post',$insta_posts);
        }


        $defaultPropertyCategories = \App\Models\Corporate\PropertyCategory::getDefaultPropertyCategories();

        $query = \App\Models\Corporate\Property::leftJoin('property_images', 'property_images.id', '=', 'properties.main_image')

            ->leftJoin('property_agents', 'property_agents.property_id', '=', 'properties.id')
            ->leftJoin('price_types', 'price_types.id', '=', 'properties.price_type_id')
            ->leftJoin('locations', 'locations.id', '=', 'properties.location_id')
            ->leftJoin('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('is_active', 'Y')
            ->where('is_leased_sold', 'N')
            ->where('property_category_id', $defaultPropertyCategories['buy'])
            ->where('branch_id', env('BRANCH_ID'));

        $properties = $query->select('properties.*',
            DB::raw("COUNT(property_agents.id) AS agents_count"),
            'property_images.property_image',
            'price_types.name AS price_type_name',
            'property_types.name AS property_type_name',
            DB::raw("CONCAT(locations.suburb) AS location_short_name"),
            DB::raw("CONCAT(locations.suburb, ' ', CONCAT(locations.state, ' ', locations.postal_code)) AS location_name"))
            ->groupBy('properties.id')
            ->orderby('created_at', 'desc')->paginate(env('PAGINATE'));

        // dd($properties);

        $blogs = \App\Models\Corporate\Blog::where('branch_id', env('BRANCH_ID'))
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        // new changes
        $sliders = Slider::where('branch_id', env('BRANCH_ID'))
            ->orderBy('created_at', 'desc')
            ->get();
        $awards = Award::where('branch_id', env('BRANCH_ID'))
            ->orderBy('created_at', 'desc')
            ->get();
        $services = Service::where('branch_id', env('BRANCH_ID'))
            ->orderBy('created_at', 'asc')
            ->limit(6)
            ->get();
        $testimonials = Testimonial::where('branch_id', env('BRANCH_ID'))
            ->orderBy('created_at', 'desc')
            ->get();

        $agents = Agent::where('branch_id', env('BRANCH_ID'))->where('is_active', 'Y')
            ->orderBy('created_at', 'desc')
            ->get();

        // gettting home page extra content
        $home = Page::where('slug', 'home')->first();

        if (isset($home) && $home != null) {
            $home['welcome_message'] = PageDetail::where('page_id', $home->id)->where('slug', 'welcome-message')->first();
            $home['welcome_video'] = PageDetail::where('page_id', $home->id)->where('slug', 'welcome-video')->first();
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
        return view('home')
            ->withProperties($properties)
            ->withBlogs($blogs)
            ->withSliders($sliders)
            ->withServices($services)
            ->withTestimonials($testimonials)
            ->withAgents($agents)
            ->withHome($home)
            ->withPosts($insta_posts)
            ->withAwards($awards);

    }

    public function oldIndex()
    {
        return view('home')
            ->withProperties($this->properties->with(['coverImage', 'agent', 'location', 'contractType', 'propertyType'])
                    ->where('is_active', '1')
                    ->where('is_rent', '0')
                    ->where('project_id', '=', null)
                    ->orderby('created_at', 'desc')
                    ->take(env('PAGINATE'))
                    ->get())
            ->withPropertyTypes($this->propertyTypes->orderby('order_position', 'asc')
                    ->pluck('property_type', 'id'))
            ->withCategories($this->categories->orderby('order_position', 'asc')->pluck('property_category', 'id'))
            ->withLocations($this->locations->pluck('location_name', 'id'));
    }

    /**
     * Handle an authentication logout.
     *
     */
    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->flush();
        return redirect()->back()
            ->withWarningMessage('You are logged out successfully.');
    }
}
