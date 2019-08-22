<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Traits\ModelEventLogger;

class PriceType extends Model
{
    use ModelEventLogger;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'price_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'heading'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    public static function getDefaultPriceTypes ()
    {
        return [
            'from' => 1,
            'fromOffThePlan' => 2,
            'fixedPrice' => 3,
            'contactUsForPricing' => 4,
            'priceGuide' => 5
        ];
    }
}
