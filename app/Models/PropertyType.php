<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelEventLogger;
use Cviebrock\EloquentSluggable\Sluggable;

class PropertyType extends Model
{
    use ModelEventLogger, Sluggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'property_types';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'property_type'
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_type',
        'slug',
        'order_position'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
