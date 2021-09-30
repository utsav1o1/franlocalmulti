<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;

class PropertyManager extends Model
{
    protected $table = 'property_managers';
    protected $connection = 'mysql-main';

    public static function getImageDir()
    {
        return env('CORPORATE_URL') . 'uploads/property-managers/';
    }
    public function getImagePath()
    {
        return $this->getImageDir() . $this->image;
    }
}
