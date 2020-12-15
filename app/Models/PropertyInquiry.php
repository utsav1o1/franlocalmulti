<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Traits\ModelEventLogger;

class PropertyInquiry extends Authenticatable
{
    use Notifiable, ModelEventLogger;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'property_inquiries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'property_id',
        'full_name',
        'email_address',
        'phone_number',
        'message',
    ];

    /**
     * Get the property that owns the inquiry.
     */
    public function property(){
        return $this->belongsTo('App\Models\Corporate\Property', 'property_id');
    }
}