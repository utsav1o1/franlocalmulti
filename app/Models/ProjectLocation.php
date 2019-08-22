<?php

namespace App\Models;

use App\Traits\ModelEventLogger;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class ProjectLocation extends Model
{
    use ModelEventLogger, Sluggable;

    protected $table = 'project_locations';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'project_location_name'
            ]
        ];
    }

    public static function getProjectLocationImageDir()
    {
        return 'storage/project-locations/location-images/';
    }

    public static function getMasterPlanImageDir()
    {
        return 'storage/project-locations/master-plan-images/';
    }

    public function getProjectLocationImageFullPath()
    {
        return static::getProjectLocationImageDir() . $this->location_image;
    }

    public function getMasterPlanImageFullPath()
    {
        return static::getMasterPlanImageDir() . $this->master_plan_image;
    }
}
