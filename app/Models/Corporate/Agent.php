<?php

namespace App\Models\Corporate;

use App\Models\Corporate\AgentSocial;
use App\Models\Corporate\Designation;
use App\Models\Corporate\Property;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agent extends Authenticatable
{
    use Notifiable;
    use Sluggable;

    protected $table = 'agents';
    protected $connection = 'mysql-main';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'first_name',
            ],
        ];
    }

    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public static function getAgentImageDir()
    {
        return env('CORPORATE_URL') . '/uploads/agent-images/';
    }

    public function isAgentImageProvided()
    {
        return !is_null($this->avatar);
    }

    public function getDefaultAgentImagePath()
    {
        return env('CORPORATE_URL') . '/uploads/default/default-agent-image.jpg';
    }

    public function getAgentImagePath()
    {
        if ($this->isAgentImageProvided()) {
            return $this->getAgentImageDir() . $this->avatar;
        }

        return $this->getDefaultAgentImagePath();
    }
    public function getCustomId()
    {
        return strtolower(str_replace(' ', '-', $this->first_name)) . "-" . strtolower(str_replace(' ', '-', $this->last_name)) . "-" . $this->id;
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'property_agents');
    }
    public function socials()
    {
        return $this->hasMany(AgentSocial::class);
    }

    // public function location()
    // {
    //     return $this->hasOne(Location::class);
    // }

}
