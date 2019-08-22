<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelEventLogger;

class PropertyImage extends Model
{
    use ModelEventLogger;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'property_images';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id',
        'attachment',
        'thumb_attachment',
        'is_cover'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public function property()
    {
        return $this->belongsTo('App\Models\Property', 'property_id');
    }
}
