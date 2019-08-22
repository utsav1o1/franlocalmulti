<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function checkExistByProvider($provider, $providerId)
    {
        return $this->model->where('provider', $provider)->where('provider_id', $providerId)->first();
    }
}