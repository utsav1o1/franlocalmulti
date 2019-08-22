<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelEventLogger;
use Cviebrock\EloquentSluggable\Sluggable;

class PropertyCategory extends Model
{
    use ModelEventLogger, Sluggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'property_categories';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'property_category'
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_category',
        'slug',
        'short_description',
        'order_position'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
