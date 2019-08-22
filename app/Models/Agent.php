<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Traits\ModelEventLogger;

class Agent extends Authenticatable
{
    use Notifiable, ModelEventLogger;

    protected $guard = 'agent';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agents';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id',
        'designation_id',
        'first_name',
        'last_name',
        'email_address',
        'password',
        'attachment',
        'description',
        'phone_number',
        'mobile_number',
        'order_position',
        'is_active',
        'is_core_member',
        'reset_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get all of the agent's logs.
     */
    public function logs()
    {
        return $this->morphMany('App\Models\Log', 'loginable');
    }

    /**
     * Get designation of the agent
     */
    public function designation()
    {
        return $this->belongsTo('App\Models\Designation', 'designation_id');
    }

    /**
     * Get location of the agent
     */
    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id');
    }

    public function getCustomId()
    {
    return strtolower(str_replace(' ', '-', $this->first_name)) . "-" . strtolower(str_replace(' ', '-', $this->last_name)) . "-" . $this->id;
    }
}