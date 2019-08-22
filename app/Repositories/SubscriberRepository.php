<?php
namespace App\Repositories;

use App\Models\Subscriber;

class SubscriberRepository extends Repository
{
    public function __construct(Subscriber $subscriber)
    {
        $this->model = $subscriber;
    }

    public function checkExist($email)
    {
        return $this->model->where('email_address', $email)->first();
    }
}