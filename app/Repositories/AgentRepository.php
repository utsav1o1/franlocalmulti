<?php
namespace App\Repositories;

use App\Models\Agent;

class AgentRepository extends Repository
{
    public function __construct(Agent $agent)
    {
        $this->model = $agent;
    }
}