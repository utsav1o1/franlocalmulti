<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelEventLogger;

class Location extends Model
{
    use ModelEventLogger;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'locations';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_name',
        'postal_code',
        'latitude',
        'longitude',
        'zoom',
        'show_in_project',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * Get all agents of the location
     */
    public function agents()
    {
        return $this->hasMany('App\Models\Agent', 'location_id');
    }
}
