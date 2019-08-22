<?php

namespace App\Models;

use App\Traits\ModelEventLogger;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use ModelEventLogger, Sluggable;

    protected $table = 'projects';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'project_name'
            ]
        ];
    }

    public static function getProjectImageDir()
    {
    	return 'storage/projects/project-images/';
    }

    public function getProjectImageFullPath()
    {
    	return static::getProjectImageDir() . $this->project_image;
    }
}
