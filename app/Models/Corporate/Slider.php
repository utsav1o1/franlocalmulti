<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    protected $connection = 'mysql-main';

    public static function getSliderImageDir()
    {
        return env('CORPORATE_URL') . '/uploads/sliders/';
    }
    public function getSliderImagePath()
    {
        return $this->getSliderImageDir() . $this->image;
    }
}
