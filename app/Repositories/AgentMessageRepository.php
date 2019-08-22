<?php
namespace App\Repositories;

use App\Models\AgentMessage;

class AgentMessageRepository extends Repository
{
    public function __construct(AgentMessage $message)
    {
        $this->model = $message;
    }
}