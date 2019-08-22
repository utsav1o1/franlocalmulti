<?php

namespace App\Models\Corporate;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProjectLocation extends Model
{
	use Sluggable;

    protected $table = 'project_locations';
    protected $connection = 'mysql-main';

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public static function getProjectLocationImageDir()
    {
        return env('CORPORATE_URL') . '/uploads/project-locations/';
    }

    public function getOwnProjectLocationImageDir()
    {
        return $this->getProjectLocationImageDir() . $this->id;
    }

    public function isMainImageProvided()
    {
        return !is_null($this->location_image);
    }

    public function getDefaultMainImagePath()
    {
        return env('CORPORATE_URL') . '/uploads/default/default-project-location-main-image.jpg';
    }

    public function getMainImagePath()
    {
        if($this->isMainImageProvided())
            return $this->getOwnProjectLocationImageDir() . '/' . $this->location_image;
    
        return $this->getDefaultMainImagePath();
    }

    public function isMasterPlanImageProvided()
    {
        return !is_null($this->master_plan_image);
    }

    public function getDefaultMasterPlanImagePath()
    {
        return env('CORPORATE_URL') . '/uploads/default/default-project-location-master-plan-image.jpg';
    }

    public function getMasterPlanImagePath()
    {
        if($this->isMasterPlanImageProvided())
            return $this->getProjectLocationImageDir() . $this->id . '/' . $this->master_plan_image;

        return $this->getDefaultMasterPlanImagePath();
    }
}
