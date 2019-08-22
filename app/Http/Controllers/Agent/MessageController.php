<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Repositories\AgentMessageRepository;
use App\Repositories\LocationRepository;
use App\Repositories\PropertyCategoryRepository;
use App\Repositories\PropertyRepository;
use App\Http\Requests\Agent\Property\StoreRequest;
use App\Http\Requests\Agent\Property\UpdateRequest;

use App\Repositories\PropertyTypeRepository;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  AgentMessageRepository  $messages
     * @return void
     */
    public function __construct(
        AgentMessageRepository $messages
    ){
        $this->messages = $messages;
    }

    /**
     * Display a listing of the property.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agent.Message.index')
            ->withMessages($this->messages->where('agent_id','=', auth()->guard('agent')->user()->id)
                ->orderby('created_at')->get()
            );
    }

    /**
     * Display a detail of the property.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('agent.Message.show')
            ->withMessage($this->messages->find($id));
    }
}
