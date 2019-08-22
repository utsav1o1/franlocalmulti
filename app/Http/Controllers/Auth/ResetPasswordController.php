<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

use App\Http\Requests\ChangePasswordRequest;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'web']);
    }

    /**
     * get change password page
     *
     * @return  view
     */
    public function getChangePassword()
    {
        return view('auth.change-password');
    }


    /**
     * get change password page
     *
     * @param  \App\Http\Requests\ChangePasswordRequest $request
     * @return  Response
     */
    public function changePassword(ChangePasswordRequest $request)
    {
        $user = auth()->user();
        $user->password = bcrypt($request->new_password);
        $user->save();
        $request->session()->flash('class', 'alert alert-success');
        $request->session()->flash('message', 'Password successfully updated.');
        return redirect()->route('login');
    }
}
