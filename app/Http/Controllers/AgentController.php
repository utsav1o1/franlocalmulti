<?php

namespace App\Http\Controllers;

use App\Mail\AgentInquirySent;
use App\Models\Corporate\PropertyCategory;
use App\Repositories\AgentMessageRepository;
use App\Repositories\AgentRepository;
use App\Repositories\PropertyRepository;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
    ) {
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

        if (Auth::guard('user')->check()) {
            $user = auth()->guard('user')->user();
            $userProperties = $user->properties()->pluck('id')->toArray();
            $existFlag = in_array($property->id, $userProperties);
        }

        return view('agents')->withUser($user)
            ->withExistFlag($existFlag)
            ->withRecentProperties(\App\Models\Corporate\Property::where('is_active', '=', 'Y')->where('branch_id', env('BRANCH_ID'))->orderby('created_at', 'desc')->take(5)->get())
            ->withSavedProperties(\App\Models\Corporate\Property::where('is_active', '=', 'Y')->where('branch_id', env('BRANCH_ID'))->whereIn('id', $userProperties)->orderby('created_at', 'desc')->take(5)->get())
            ->withPopularProperties(\App\Models\Corporate\Property::where('is_active', '=', 'Y')->where('branch_id', env('BRANCH_ID'))->orderby('view_count', 'desc')->take(5)->get())
            ->withAgents($this->agents->where('is_active', '=', 'Y')->orderby('created_at', 'asc')->where('branch_id', env('BRANCH_ID'))->paginate(env('PAGINATE')));
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
        $propertyCategory = $this->getPropertyCategory();
        $leased_properties = $agent->properties()->where('is_leased_sold',
            'Y')->where('property_category_id', 2)->orderBy('created_at', 'desc')->paginate(6);
        $sold_properties = $agent->properties()->where('is_leased_sold',
            'Y')->where('property_category_id', 1)->orderBy('created_at', 'desc')->paginate(6);
        $rent_properties = $agent->properties()->where('property_category_id', 2)->where('is_leased_sold',
            'N')->orderBy('created_at', 'desc')->paginate(6);
        $buy_properties = $agent->properties()->where('property_category_id', 1)->where('is_leased_sold',
            'N')->orderBy('created_at', 'desc')->paginate(6);
        // dd($agent->properties()->where('property_category_id', '=', 1)->count());

        if ($agent) {
            return view('agent-detail')
                ->withAgent($agent)
                ->withLeasedProperties($leased_properties)
                ->withRentProperties($rent_properties)
                ->withBuyProperties($buy_properties)
                ->withSoldProperties($sold_properties);
        } else {
            return view('404');
        }
    }
    public function getPropertyCategory()
    {
        $categories = PropertyCategory::getDefaultPropertyCategories();
        return $categories;
    }
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|min:3|max:255',
            'email_address' => 'required|email',
            'phone_number' => 'required|numeric',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $message = $this->messages->create($request->all());
        if ($message) {
            if ($message->agent) {
                Mail::to($message->agent->email_address)
                    ->send(new AgentInquirySent($message));
            }
            return redirect(route('thank-you'));
//            return redirect()->back()
//                ->withSuccessMessage('Your message is submitted.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Your message can not be submitted.');

    }
}
