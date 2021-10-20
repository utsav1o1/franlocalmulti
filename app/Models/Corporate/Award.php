<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $table = 'awards';
    protected $connection = 'mysql-main';

    public static function getAwardImageDir()
    {
        return env('CORPORATE_URL') . 'uploads/awards/';
    }
    public function getAwardImagePath()
    {
        return $this->getAwardImageDir() . $this->image;
    }
}
