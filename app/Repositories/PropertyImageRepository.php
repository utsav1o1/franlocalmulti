<?php
namespace App\Repositories;

use App\Models\PropertyImage;

use DB;

class PropertyImageRepository extends Repository
{
    public function __construct(PropertyImage $image)
    {
        $this->model = $image;
    }

    public function makeCover($id)
    {
        $image = $this->model->find($id);
        $property = $image->property;
        $property->images()->update(['is_cover' => '0']);
        $image->fill(['is_cover'=>'1'])->save();

        return $image;
    }
}