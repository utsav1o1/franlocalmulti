<?php

namespace App\Http\Controllers;

use DB;
use App\Repositories\LocationRepository;
use App\Repositories\PropertyCategoryRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\PropertyTypeRepository;
use Illuminate\Http\Request;

use Auth;

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
    ){
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
        $defaultPropertyCategories = \App\Models\Corporate\PropertyCategory::getDefaultPropertyCategories();

        $query = \App\Models\Corporate\Property::leftJoin('property_images', 'property_images.id', '=', 'properties.main_image')

        ->leftJoin('property_agents', 'property_agents.property_id', '=', 'properties.id')
        ->leftJoin('price_types', 'price_types.id', '=', 'properties.price_type_id')
        ->leftJoin('locations', 'locations.id', '=', 'properties.location_id')
        ->leftJoin('property_types', 'property_types.id', '=', 'properties.property_type_id')
        ->where('is_active', 'Y')
        ->where('property_category_id', $defaultPropertyCategories['buy'])
        ->where('branch_id', env('BRANCH_ID'));

        $properties = $query->select('properties.*',
                                     DB::raw("COUNT(property_agents.id) AS agents_count"),
                                     'property_images.property_image',
                                     'price_types.name AS price_type_name',
                                     'property_types.name AS property_type_name',
                                     DB::raw("CONCAT(locations.suburb, ' ', CONCAT(locations.state, ' ', locations.postal_code)) AS location_name"))
                            ->groupBy('properties.id')
                            ->orderby('created_at', 'desc')->paginate(env('PAGINATE'));

        $blogs = \App\Models\Corporate\Blog::where('branch_id', env('BRANCH_ID'))
                   ->orderBy('created_at', 'desc')
                   ->limit(5)
                   ->get();

        return view('home')
            ->withProperties($properties)
            ->withBlogs($blogs);
    }

    public function oldIndex()
    {
        return view('home')
            ->withProperties($this->properties->with(['coverImage','agent', 'location', 'contractType', 'propertyType'])
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
