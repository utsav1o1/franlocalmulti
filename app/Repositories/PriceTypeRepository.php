<?php
namespace App\Repositories;

use App\Models\PriceType;

class PriceTypeRepository extends Repository
{
    public function __construct(PriceType $type)
    {
        $this->model = $type;
    }
}