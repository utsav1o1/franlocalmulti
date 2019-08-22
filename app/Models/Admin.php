<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Traits\ModelEventLogger;

class Admin extends Authenticatable
{
    use Notifiable, ModelEventLogger;

    protected $guard = 'admin';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'admins';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'email_address',
        'password',
        'attachment',
        'is_active',
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
     * Get all of the admin's logs.
     */
    public function logs()
    {
        return $this->morphMany('App\Models\Log', 'loginable');
    }
}