<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Repositories\AgentRepository;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Repositories\LogRepository;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/agent/login';

    /**
     * The Log repository implementation.
     *
     * @var LogRepository
     */
    protected $logs;

    /**
     * The Agent repository implementation.
     *
     * @var AgentRepository
     */
    protected $agents;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        LogRepository $logs,
        AgentRepository $agents
    )
    {
        $this->logs = $logs;
        $this->agents = $agents;
    }

    /**
     * Login Page.
     *
     */
    public function login(Request $request)
    {
        return view('agent.login');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param Request $request
     * @return Response
     */
    public function authenticate(Request $request)
    {
        $request->session()->flush();

        if (Auth::guard('agent')->attempt(['email_address' => $request->username, 'password' => $request->password, 'is_active'=>'1'])) {
            $agent = auth()->guard('agent')->user();
            $data = [
                'action'      => 'Login',
                'description' => "Logged in to " .env('APP_NAME'),
                'ip_address'     => $_SERVER['REMOTE_ADDR']
            ];
            $agent->logs()->create($data);
            return redirect()->route('agent.dashboard');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Handle an authentication logout.
     *
     */
    public function logout(Request $request)
    {
        $agent = auth()->guard('agent')->user();
        $data = [
            'action'      => 'Logout',
            'description' => "Log out from " .env('APP_NAME'),
            'ip_address'     => $_SERVER['REMOTE_ADDR']
        ];
        $agent->logs()->create($data);

        Auth::guard('agent')->logout();
        $request->session()->flush();
        return redirect()->route('agent.login');
    }
}
