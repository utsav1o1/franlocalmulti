<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Repositories\LogRepository;
use Modules\Privilege\Repositories\UserRepository;

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
    protected $redirectTo = '/login';

    /**
     * The Log repository implementation.
     *
     * @var LogRepository
     */
    protected $logs;

    /**
     * The User repository implementation.
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        LogRepository $logs,
        UserRepository $users
    )
    {
        $this->logs = $logs;
        $this->users = $users;
    }

    /**
     * Login Page.
     *
     */
    public function login(Request $request)
    {
        return view('auth.login');
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

        if (Auth::attempt(['email_address' => $request->username, 'password' => $request->password, 'is_active'=>'1'])) {
            $user = auth()->user();
            $accessModulesArray = $this->users->accessModules($user->id);
            $request->session()->push('access-modules', $accessModulesArray);

            $this->logs->create([
                'user_id'=>auth()->id(),
                'action'      => 'Login',
                'description' => "Logged in to " .env('APP_NAME'),
                'ip_address'     => $_SERVER['REMOTE_ADDR']
            ]);
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Handle an authentication logout.
     *
     */
    public function logout(Request $request)
    {
        $this->logs->create([
            'user_id'=>auth()->id(),
            'action'      => 'Logout',
            'description' => "Log out from " .env('APP_NAME'),
            'ip_address'     => $_SERVER['REMOTE_ADDR']
        ]);
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('admin.login');
    }
}
