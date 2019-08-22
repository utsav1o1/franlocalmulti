<?php

namespace App\Models;

use App\Traits\ModelEventLogger;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Model;

class ProjectType extends Model
{
    use ModelEventLogger, Sluggable;

    protected $table = 'project_types';

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'project_type_name'
            ]
        ];
    }

}
