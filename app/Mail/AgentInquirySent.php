<?php

namespace App\Mail;

use App\Models\AgentMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AgentInquirySent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        AgentMessage $message
    ){
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('NO_REPLY_EMAIL'))
            ->view('emails.agent-inquiry')
            ->subject('Inquiry from '. env('APP_NAME'))
            ->with([
                'inquiry' => $this->message,
                'logoPath' => public_path('images/logo.png'),
            ]);
    }
}
