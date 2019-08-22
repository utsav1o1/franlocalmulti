<?php
namespace App\Repositories;

use App\Models\Designation;

class DesignationRepository extends Repository
{
    public function __construct(Designation $designation)
    {
        $this->model = $designation;
    }
}