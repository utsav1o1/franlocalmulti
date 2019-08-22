<?php

namespace App\Helpers\Shared;

use App\Models\PropertyCategory;
use App\Models\PropertyType;
use App\Models\Location;

class DataHelper
{
	public static function getCategories()
	{
		return PropertyCategory::all();
	}

	public static function getPropertyTypes()
	{
		return PropertyType::all();
	}

	public static function getLocationName($id)
	{
		return Location::find($id)->location_name;
	}

	public static function getPropertyTypesForSearch()
	{
		return \App\Models\Corporate\PropertyType::all();
	}

	public static function getPropertySubCategoriesOrderByName($category)
	{
		$defaultPropertyCategories = \App\Models\Corporate\PropertyCategory::getDefaultPropertyCategories();

		return \App\Models\Corporate\PropertySubCategory::leftJoin('property_categories', 'property_categories.id', '=', 'property_sub_categories.property_category_id')
								  ->where('property_category_id', $defaultPropertyCategories[$category])
								  ->select('property_sub_categories.*', 'property_categories.slug AS property_category_slug')
								  ->get();
	}

	public static function getRentResidentialSlug()
	{
		return 'residential-1';
	}
}