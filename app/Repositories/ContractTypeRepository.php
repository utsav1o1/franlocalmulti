<?php
namespace App\Repositories;

use App\Models\ContractType;

class ContractTypeRepository extends Repository
{
    public function __construct(ContractType $type)
    {
        $this->model = $type;
    }
}