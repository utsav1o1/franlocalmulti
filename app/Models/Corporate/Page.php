<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table = 'pages';
    protected $connection = 'mysql-main';

    public static function getImageDir()
    {
        return env('CORPORATE_URL') . '/uploads/pages/';
    }
    public function getImagePath()
    {
        return $this->getImageDir() . $this->banner_image;
    }
}
