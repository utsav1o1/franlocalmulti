<?php

namespace App\Models\Corporate;

use \DateTime;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
	use Sluggable;

    protected $table = 'blogs';
    protected $connection = 'mysql-main';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function getPublishedKeysInString()
    {
    	return 'Y,N';
    }

    public function isPublished()
    {
    	return $this->published == 'Y';
    }

    public static function getBlogImageDir()
    {
        return env('CORPORATE_URL') . '/uploads/blogs/';
    }

    public function isBlogImageProvided()
    {
        return !is_null($this->blog_image);
    }

    public function getDefaultBlogImagePath()
    {
        return env('CORPORATE_URL') . '/uploads/default/default-blog-image.jpg';
    }

    public function getBlogImagePath()
    {
        if($this->isBlogImageProvided())
            return $this->getBlogImageDir() . $this->blog_image;

        return $this->getDefaultBlogImagePath();
    }

    public function updateBlogImageCropPoints($cropPoints)
    {
        if($this->isBlogImageProvided())
            FileHelper::cropImage($this->getBlogImagePath(), $cropPoints);
    }

    public function getCreatedDate()
    {
        return date_format(new DateTime($this->published_date), 'd M, Y');
    }
}