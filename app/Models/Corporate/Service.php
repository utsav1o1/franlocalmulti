<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    protected $connection = 'mysql-main';

    public static function getServiceImageDir()
    {
        return env('CORPORATE_URL') . 'uploads/services/';
    }
    public function getServiceImagePath()
    {
        return $this->getServiceImageDir() . $this->image;
    }
}
