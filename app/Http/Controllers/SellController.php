<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Requests\SendPropertyEstimationRequest;

class SellController extends Controller
{
    public function showPropertyEstimationForm()
    {
        return view('frontend.sell.sell-form');
    }

    public function sendPropertyEstimation(SendPropertyEstimationRequest $request)
    {
        $data = $request->all();

        $this->sendPropertyEstimationByEmail($data);

        $request->session()->flash('success', 'Form Successfully Submitted!!');

        return redirect(route('sell-form'));
    }

    public function showRecentlyLeasedProperties()
    {
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

        return view('frontend.sell.recently-sold-properties')->withProperties($properties);
    }

    public function showRecentlySoldProperties()
    {
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

        return view('frontend.sell.recently-sold-properties')->withProperties($properties);
    }

    public function oldShowRecentlySoldProperties()
    {
        $properties = Property::with(['coverImage','agent', 'location', 'contractType', 'propertyType'])
                              ->where('is_active', '1')
                              ->where('contract_type_id', '4')
                              ->orderBy('created_at', 'desc')
                              ->paginate(env('PAGINATE'));

        return view('frontend.sell.recently-sold-properties')->withProperties($properties);
    }

    public function sendPropertyEstimationByEmail($data)
    {
        Mail::send('emails.property-estimation', ['data' => $data], function($message) use ($data) {
            $message->to('sales@multidynamic.com.au', 'Sell - Property Estimation')
                    ->subject('Sell - Property Estimation');
        });
    }
}
