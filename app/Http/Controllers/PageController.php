<?php

namespace App\Http\Controllers;

use App\Models\Corporate\Page;
use App\Models\Corporate\PageDetail;
use App\Models\Corporate\PropertyManager;
use App\Repositories\AgentRepository;
use App\Repositories\PageRepository;
use DB;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param PageRepository $pages
     * @param AgentRepository $agents
     * @return void
     */
    public function __construct(
        PageRepository $pages,
        AgentRepository $agents
    ) {
        $this->pages = $pages;
        $this->agents = $agents;
    }

    /**
     * Show the page detail page.
     *
     * @return \Illuminate\Http\Response
     */
    public function aboutus()
    {
        return view('aboutus')
            ->withCoreMembers($this->agents->where('is_active', '=', '1')->where('is_core_member', '1')->orderby('order_position', 'asc')->get());
    }

    /**
     * Show the page detail page.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $page = $this->pages->findByField('slug', $slug);
        if ($page) {
            return view('page-detail')
                ->withPage($page);
        }
        return view('404');
    }

    public function showBlog($slug)
    {
        $blog = \App\Models\Corporate\Blog::where('slug', $slug)->first();

        return view('frontend.blog-details', [
            'blog' => $blog,
        ]);
    }

    public function propertymanagement()
    {
        $property_management_page = Page::where('slug', 'property-management')->first();
        // dd($property_management_page);
        $prooperty_managers = PropertyManager::where('branch_id', env('BRANCH_ID'))
            ->orderBy('created_at', 'desc')
            ->get();

        // recent leased property
        $propertySubCategory = [];

        $defaultCategories = \App\Models\Corporate\PropertyCategory::getDefaultPropertyCategories();

        $query = \App\Models\Corporate\Property::leftJoin('property_images', 'property_images.id', '=', 'properties.main_image')

            ->leftJoin('property_agents', 'property_agents.property_id', '=', 'properties.id')
            ->leftJoin('price_types', 'price_types.id', '=', 'properties.price_type_id')
            ->leftJoin('locations', 'locations.id', '=', 'properties.location_id')
            ->leftJoin('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('is_active', 'Y')
            ->where('is_leased_sold', 'Y')
            ->where('branch_id', env('BRANCH_ID'))
            ->where('property_category_id', $defaultCategories['buy']);

        $properties = $query->select('properties.*',
            DB::raw("COUNT(property_agents.id) AS agents_count"),
            'property_images.property_image',
            'price_types.name AS price_type_name',
            'property_types.name AS property_type_name',
            DB::raw("CONCAT(locations.suburb, ' ', CONCAT(locations.state, ' ', locations.postal_code)) AS location_name"))
            ->groupBy('properties.id')
            ->orderby('created_at', 'desc')->paginate(env('PAGINATE'));
        // dd($property_management_page != null);
        if ($property_management_page != null) {
            // dd('here i am');
            $property_management_page['property_management'] = PageDetail::where('page_id', $property_management_page->id)->where('slug', 'property-management')->first();

        }

        return view('agent.Property.property-management')
            ->withPage($property_management_page)
            ->withManagers($prooperty_managers)
            ->withProperties($properties);
    }
    public function selling()
    {
        $selling = Page::where('slug', 'selling')->first();
        if (isset($selling) && $selling != null) {
            $selling['selling'] = PageDetail::where('page_id', $selling->id)->where('slug', 'selling-your-home')->first();
            $selling['buying'] = PageDetail::where('page_id', $selling->id)->where('slug', 'buying-a-home')->first();

        }

        return view('agent.Property.selling')->withPage($selling);

    }
}
