<?php

namespace App\Models\Corporate;

use App\Models\Corporate\Property;
use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $table = 'property_images';
    protected $connection = 'mysql-main';

    public function getOwnPropertyImagesDir()
    {
        return static::getPropertyImageDir() . $this->property_id;
    }

    public static function getPropertyImageDir()
    {
        return env('CORPORATE_URL') . '/uploads/properties/';
    }

    public function isPropertyImageProvided()
    {
        return !is_null($this->property_image);
    }

    public function getDefaultPropertyImagePath()
    {
        return env('CORPORATE_URL') . '/uploads/default/default-property-image.jpg';
    }

    public function getPropertyImagePath()
    {
        return $this->getOwnPropertyImagesDir() . '/' . $this->property_image;
    }

    public function updatePropertyImageCropPoints($cropPoints)
    {
        if($this->isPropertyImageProvided())
            FileHelper::cropImage($this->getPropertyImagePath(), $cropPoints);
    }

    public function isCoverImage()
    {
        return Property::where('main_image', $this->id)->count() > 0;
    }
}