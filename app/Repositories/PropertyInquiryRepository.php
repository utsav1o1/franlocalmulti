<?php
namespace App\Repositories;

use App\Models\PropertyInquiry;

class PropertyInquiryRepository extends Repository
{
    public function __construct(PropertyInquiry $inquiry)
    {
        $this->model = $inquiry;
    }
}