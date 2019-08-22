<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Project extends Model
{
	use Sluggable;

    protected $table = 'projects';

    protected $connection = 'mysql-main';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function getProjectImageDir()
    {
        return env('CORPORATE_URL') . '/uploads/projects/';
    }

    public function isProjectImageProvided()
    {
        return !is_null($this->project_image);
    }

    public function getDefaultProjectImagePath()
    {
        return env('CORPORATE_URL') . '/uploads/default/default-project-image.jpg';
    }

    public function getProjectImagePath()
    {
        if($this->isProjectImageProvided())
            return $this->getProjectImageDir() . $this->project_image;

        return $this->getDefaultProjectImagePath();
    }
}