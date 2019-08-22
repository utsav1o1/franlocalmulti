<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;

class PriceType extends Model
{
    protected $table = 'price_types';
    protected $connection = 'mysql-main';

    public static function getDefaultPriceTypes()
    {
    	return [
    		'from' => 1,
    		'fixedPrice' => 2,
    		'priceGuide' => 3,
    		'auction' => 4,
    		'contactUsForPricing' => 5
    	];
    }
}