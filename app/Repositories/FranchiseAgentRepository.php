<?php
namespace App\Repositories;

use App\Models\Agent;

class FranchiseAgentRepository extends Repository
{
    public function __construct(Agent $agent)
    {
        $this->model = $agent;
    }
}
