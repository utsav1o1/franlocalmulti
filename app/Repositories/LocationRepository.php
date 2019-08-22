<?php
namespace App\Repositories;

use App\Models\Location;

class LocationRepository extends Repository
{
    public function __construct(Location $location)
    {
        $this->model = $location;
    }

    public function getLocationListForSelect2($searchText, $pageLimit)
    {
    	return Location::where('location_name', 'LIKE', "%{$searchText}%")
    				   ->select('id', 'location_name AS text')
    				   ->paginate($pageLimit)
    				   ->toArray();
    }
}