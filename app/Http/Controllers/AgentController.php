<?php

namespace App\Http\Controllers;

use Auth;
use App\Mail\AgentInquirySent;
use App\Repositories\AgentMessageRepository;
use App\Repositories\AgentRepository;
use App\Repositories\PropertyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Contracts\Encryption\DecryptException;

class AgentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param AgentRepository $agents
     * @param AgentMessageRepository $messages
     * @param PropertyRepository $properties
     * @return void
     */
    public function __construct(
        AgentRepository $agents,
        AgentMessageRepository $messages,
        PropertyRepository $properties
    )
    {
        $this->agents = $agents;
        $this->messages = $messages;
        $this->properties = $properties;
    }

    /**
     * Show the properties page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $existFlag = false;
        $user = [];
        $userProperties = [];

        if(Auth::guard('user')->check()){
            $user = auth()->guard('user')->user();
            $userProperties = $user->properties()->pluck('id')->toArray();
            $existFlag = in_array($property->id, $userProperties);
        }

        return view('agents')->withUser($user)
                ->withExistFlag($existFlag)
                ->withRecentProperties(\App\Models\Corporate\Property::where('is_active', '=', 'Y')->where('branch_id', env('BRANCH_ID'))->orderby('created_at', 'desc')->take(5)->get())
                ->withSavedProperties(\App\Models\Corporate\Property::where('is_active', '=','Y')->where('branch_id', env('BRANCH_ID'))->whereIn('id', $userProperties)->orderby('created_at', 'desc')->take(5)->get())
                ->withPopularProperties(\App\Models\Corporate\Property::where('is_active', '=','Y')->where('branch_id', env('BRANCH_ID'))->orderby('view_count', 'desc')->take(5)->get())
                ->withAgents($this->agents->where('is_active','=', '1')->orderby('order_position', 'asc')->paginate(env('PAGINATE')));
    }

    /**
     * Show the properties detail page.
     *
     * @param string $encryptedId
     * @return \Illuminate\Http\Response
     */
    public function show($encryptedId)
    {
        $arr = explode("-", $encryptedId);

        $id = $arr[count($arr) - 1];
        $agent = $this->agents->findByField('id', $id);
        if ($agent) {
            return view('agent-detail')
                ->withAgent($agent);
        } else {
            return view('404');
        }
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'g-recaptcha-response' => 'required|captcha'
        ]);

        $message = $this->messages->create($request->all());
        if ($message) {
            if($message->agent){
                Mail::to($message->agent->email_address)
                    ->send(new AgentInquirySent($message));
            }
            return redirect()->back()
                ->withSuccessMessage('Your message is submitted.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Your message can not be submitted.');

    }
}
