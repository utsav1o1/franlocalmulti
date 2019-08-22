<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelEventLogger;

class Subscriber extends Model
{
    use ModelEventLogger;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'subscribers';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email_address'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
