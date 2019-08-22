<?php
namespace App\Repositories;

use App\Models\PropertyType;

class PropertyTypeRepository extends Repository
{
    public function __construct(PropertyType $type)
    {
        $this->model = $type;
    }
}