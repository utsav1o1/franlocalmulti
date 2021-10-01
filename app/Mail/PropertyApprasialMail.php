<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PropertyApprasialMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->data);
        return $this->from(env('NO_REPLY_EMAIL'))
            ->view('emails.property-apprasial')
            ->subject('Inquiry for the property apprasial.')
            ->with([
                'data' => $this->data,
                'logoPath' => public_path('images/logo.png'),
            ]);

    }
}
