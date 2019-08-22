<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelEventLogger;
use Cviebrock\EloquentSluggable\Sluggable;

class Property extends Model
{
    use ModelEventLogger, Sluggable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'properties';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'property_name'
            ]
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id',
        'category_id',
        'contract_type_id',
        'price_type_id',
        'agent_id',
        'location_id',
        'project_id',
        'property_name',
        'area',
        'price',
        'price_to',
        'slug',
        'description',
        'amenities',
        'floor_plan',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'number_of_garages',
        'video_key',
        'latitude',
        'longitude',
        'zoom',
        'view_count',
        'is_rent',
        'is_sold',
        'is_active',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get the agent that owns the property.
     */
    public function agent(){
        return $this->belongsTo('App\Models\Agent', 'agent_id');
    }

    /**
     * Get the property type that owns the property.
     */
    public function propertyType(){
        return $this->belongsTo('App\Models\PropertyType', 'type_id');
    }

    /**
     * Get the category that owns the property.
     */
    public function category(){
        return $this->belongsTo('App\Models\PropertyCategory', 'category_id');
    }

    /**
     * Get the contract type that owns the property.
     */
    public function contractType(){
        return $this->belongsTo('App\Models\ContractType', 'contract_type_id');
    }

    /**
     * Get the price type that owns the property.
     */
    public function priceType(){
        return $this->belongsTo('App\Models\PriceType', 'price_type_id');
    }

    /**
     * Get the location that owns the property.
     */
    public function location(){
        return $this->belongsTo('App\Models\Location', 'location_id');
    }


    /**
     * Get the images for the property.
     */
    public function images(){
        return $this->hasMany('App\Models\PropertyImage', 'property_id')
            ->orderby('is_cover', 'desc');
    }

    /**
     * Get the cover image for the property.
     */
    public function coverImage(){
        return $this->hasOne('App\Models\PropertyImage', 'property_id')
            ->where('is_cover', '1');
    }

    /**
     * Get the inquiries for the property.
     */
    public function inquiries(){
        return $this->hasMany('App\Models\PropertyInquiry', 'property_id');
    }

    public function getFormattedPrice()
    {
        if($this->price_type_id == 5)
        {
            return '$' . number_format($this->price) . ' - $' . number_format($this->price_to) . (($this->is_rent == 1) ? '/W' : '');
        }
        else if($this->price_type_id != 4)
        {
            return '$' . number_format($this->price) . (($this->is_rent == 1) ? '/W' : '');
        }

        return "";
    }
}
