<?php

namespace App\Http\Controllers;

use DB;
use App\Repositories\LocationRepository;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param AgentRepository $locations
     * @return void
     */
    public function __construct(
        LocationRepository $locations
    ){
        $this->locations = $locations;
    }

    /**
     * Show the properties page.
     *
     * @param string $location
     * @return \Illuminate\Http\Response
     */
    public function locations($location=null)
    {
        $locations = \App\Models\Corporate\Location::where(DB::raw("CONCAT(locations.suburb, ' ', CONCAT(locations.state, ' ', locations.postal_code))"), 'like', '%' . $location . '%')

        ->select('id', DB::raw("CONCAT(locations.suburb, ' ', CONCAT(locations.state, ' ', locations.postal_code)) AS location_name"))->get();

        return response()->json(['locations'=>$locations], 200);
    }

    /**
     * Show the project page.
     *
     * @return \Illuminate\Http\Response
     */
    public function projects()
    {
        return view('projects')
            ->withLocations($this->locations->where('show_in_project', '=', '1')->get());
    }

}
