<?php

namespace App\Mail;

use App\Models\Agent;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AgentForgotPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        Agent $agent
    ){
        $this->agent = $agent;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('NO_REPLY_EMAIL'))
            ->view('emails.agent-forgot-password')
            ->subject('Forgotten password request')
            ->with([
                'agent' => $this->agent,
                'logoPath' => public_path('images/logo.png'),
            ]);
    }
}
