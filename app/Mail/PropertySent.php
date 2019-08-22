<?php

namespace App\Mail;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PropertySent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The rproperty instance.
     *
     * @var property
     */
    protected $property;

    /**
     * Create a new message instance.
     *
     * @param Property $property
     * @return void
     */
    public function __construct(
        Property $property
    ){
        $this->property = $property;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('NO_REPLY_EMAIL'))
            ->view('emails.send-property')
            ->subject('Suggestion for viewing property.')
            ->with([
                'property' => $this->property,
                'logoPath' => public_path('images/logo.png'),
            ]);
    }
}
