<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Repositories\AgentRepository;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

use App\Http\Requests\Agent\ForgotPasswordRequest;
use App\Http\Requests\Agent\ResetPasswordRequest;

use App\Mail\AgentForgotPassword;
use App\Mail\AgentResetPassword;
use Mail;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        AgentRepository $agents
    ){
        $this->agents = $agents;
        $this->middleware('guest');
    }

    public function create()
    {
        return view('agent.forget_password');
    }

    public function store(ForgotPasswordRequest $request)
    {
        $agent = $this->agents->findByField('email_address', $request->email_address);
        $agent->update(['reset_token'=>str_random(60)]);
        Mail::to($agent->email_address)
            ->send(new AgentForgotPassword($agent));
        return redirect()->back()
            ->withSuccessMessage('Please check your email to reset your password.');
    }

    public function getReset($token)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }
        $agent = $this->agents->findByField('reset_token', $token);
        if ($agent) {
            return view('agent.reset_password')
                ->with('agent', $agent);
        } else {
            return redirect()->route('agent.forgot.password.create')
                ->withWarningMessage( env('APP_NAME') .' could not locate the information needed to recover your password. Please try again.');
        }
    }

    public function update(ResetPasswordRequest $request, $token)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        $agent = $this->agents->findByField('reset_token', $token);
        $agent->update(['reset_token'=>null]);

        return redirect()->route('agent.login')
            ->withSuccessMessage('');
    }

}
