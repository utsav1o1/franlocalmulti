<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;

class PageDetail extends Model
{
    protected $table = 'page_details';
    protected $connection = 'mysql-main';

    public static function getFileDir()
    {
        return env('CORPORATE_URL') . '/uploads/pagedetails/';
    }
    public function getFilePath()
    {
        return $this->getFileDir() . $this->image;
    }
}
