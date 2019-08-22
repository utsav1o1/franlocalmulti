<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PropertySubCategory extends Model
{
	use Sluggable;
	
    protected $table = 'property_sub_categories';
    protected $connection = 'mysql-main';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function getName($id)
    {
        if(!$id || is_null($id))
            return null;
        
        $subcategory = static::find($id);

        if($subcategory)
            return $subcategory->name;
    }
}
