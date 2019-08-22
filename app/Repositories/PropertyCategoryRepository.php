<?php
namespace App\Repositories;

use App\Models\PropertyCategory;

class PropertyCategoryRepository extends Repository
{
    public function __construct(PropertyCategory $category)
    {
        $this->model = $category;
    }
}