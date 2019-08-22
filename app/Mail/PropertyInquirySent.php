<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\PropertyInquiry;

class PropertyInquirySent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The property inquiry instance.
     *
     * @var inquiry
     */
    protected $inquiry;

    /**
     * Create a new message instance.
     *
     * @param PropertyInquiry $inquiry
     * @return void
     */
    public function __construct(
        PropertyInquiry $inquiry
    ){
        $this->inquiry = $inquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('NO_REPLY_EMAIL'))
            ->view('emails.property-inquiry')
            ->subject('Inquiry for the property.')
            ->with([
                'inquiry' => $this->inquiry,
                'logoPath' => public_path('images/logo.png'),
            ]);
    }
}
