<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\AdminRepository;
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
    protected $redirectTo = '/admin/login';

    /**
     * The Log repository implementation.
     *
     * @var LogRepository
     */
    protected $logs;

    /**
     * The Admin repository implementation.
     *
     * @var AdminRepository
     */
    protected $admins;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        LogRepository $logs,
        AdminRepository $admins
    )
    {
        $this->logs = $logs;
        $this->admins = $admins;
    }

    /**
     * Login Page.
     *
     */
    public function login(Request $request)
    {
        return view('admin.login');
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

        if (Auth::guard('admin')->attempt(['email_address' => $request->username, 'password' => $request->password, 'is_active'=>'1'])) {
            $admin = auth()->guard('admin')->user();
            $data = [
                'action'      => 'Login',
                'description' => "Logged in to " .env('APP_NAME'),
                'ip_address'     => $_SERVER['REMOTE_ADDR']
            ];
            $admin->logs()->create($data);
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withInput();
    }

    /**
     * Handle an authentication logout.
     *
     */
    public function logout(Request $request)
    {
        $admin = auth()->guard('admin')->user();
        $data = [
            'action'      => 'Logout',
            'description' => "Log out from " .env('APP_NAME'),
            'ip_address'     => $_SERVER['REMOTE_ADDR']
        ];
        $admin->logs()->create($data);

        auth('admin')->logout();
        $request->session()->flush();
        return redirect()->route('admin.login');
    }
}
