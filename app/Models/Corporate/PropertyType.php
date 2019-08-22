<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PropertyType extends Model
{
	use Sluggable;
	
    protected $table = 'property_types';
    protected $connection = 'mysql-main';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
