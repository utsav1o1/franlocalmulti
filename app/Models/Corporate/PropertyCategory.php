<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PropertyCategory extends Model
{
	use Sluggable;

    protected $table = 'property_categories';
    protected $connection = 'mysql-main';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function getDefaultPropertyCategories()
    {
        return [
            'buy' => 1,
            'rent' => 2
        ];
    }

    public static function getCategoryOptions()
    {
        return [
            'buy' => 'Buy',
            'rent' => 'Rent'
        ];
    }

    public static function getName($id)
    {
        if(!$id || is_null($id))
            return null;
        
        $category = static::find($id);

        if($category)
            return $category->name;
    }
}
