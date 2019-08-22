<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Repositories\SubscriberRepository;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    /**
     * The subscribers repository instance.
     *
     * @var SubscriberRepository
     */
    protected $subscribers;

    /**
     * Create a new controller instance.
     *
     * @param  SubscriberRepository  $subscribers
     * @return void
     */
    public function __construct(
        SubscriberRepository $subscribers
    ){
        $this->subscribers = $subscribers;
    }

    /**
     * Display a listing of the subscribers.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Subscriber.index')
            ->withSubscribers($this->subscribers->orderby('created_at', 'desc')->get());
    }
}
