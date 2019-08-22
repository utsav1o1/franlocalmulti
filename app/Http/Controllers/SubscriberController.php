<?php

namespace App\Http\Controllers;

use App\Repositories\SubscriberRepository;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param SubscriberRepository $subscribers
     * @return void
     */
    public function __construct(
        SubscriberRepository $subscribers
    ){
        $this->subscribers = $subscribers;
    }

    /**
     * Store a newly created property in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subscriberExist = $this->subscribers->checkExist($request->email_address);
        if (empty($subscriberExist)) {
            $this->subscribers->create($request->only('email_address'));
            return response()->json(['message'=>'Your email address subscribed successfully.'], 200);
        } else {
            return response()->json(['message'=>'Your email address is already subscribed.'], 200);
        }
    }
}
