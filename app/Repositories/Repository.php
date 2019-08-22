<?php
namespace App\Repositories;

use DB;

class Repository
{
    protected $model;

    public function with($with=[])
    {
        return $this->model->with($with);
    }

    public function all() {
        return $this->model->all();
    }

    public function paginate($paginate) {
        return $this->model->paginate($paginate);
    }

    public function count() {
        return $this->model->count();
    }

    public function find($id) {
        return $this->model->findOrFail($id);
    }

    public function findWith($id, $with=[]) {
        return $this->with($with)->findOrFail($id);
    }

    public function create($data)
    {
        $data['created_by'] = auth()->id();
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $record = $this->model->findOrFail($id);
        $data['updated_by'] = auth()->id();
        $record->fill($data)->save();
        return $record;
    }

    public function destroy($id)
    {
        return $this->model->findOrFail($id)->delete();
    }

    public function findByField($field, $value = null, $columns = ['*'])
    {
        return $this->model->where($field, '=', $value)->first($columns);
    }

    public function where($field, $operator=null, $value) {
        return $this->model->where($field, $operator, $value);
    }

    public function orderby($field, $type='desc')
    {
        return $this->model->orderby($field, $type);
    }

    public function pluck($field, $key)
    {
        return $this->model->pluck($field, $key);
    }
}