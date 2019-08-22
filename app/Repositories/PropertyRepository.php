<?php
namespace App\Repositories;

use App\Models\Property;
use DB;

class PropertyRepository extends Repository
{
    public function __construct(Property $property)
    {
        $this->model = $property;
    }

    public function changeStatus($id, $field)
    {
        DB::beginTransaction();
        try{
            $model = $this->model->findOrFail($id);
            $model->$field == '0' ? $model->fill([$field => '1'])->save() : $model->fill([$field => '0'])->save();
            DB::commit();
            return $model;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}