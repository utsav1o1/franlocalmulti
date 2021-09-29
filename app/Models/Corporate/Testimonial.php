<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';
    protected $connection = 'mysql-main';

    public static function getImageDir()
    {
        return env('CORPORATE_URL') . 'uploads/testimonials/';
    }
    public function getImagePath()
    {
        return $this->getImageDir() . $this->image;
    }
}
