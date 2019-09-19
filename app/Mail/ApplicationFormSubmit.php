<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ApplicationFormSubmit extends Mailable
{
    use Queueable, SerializesModels;

    protected $attributes;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($attributes = [])
    {
        $this->attributes = $attributes;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from(config('mail.from.address'))
            ->view('emails.application-form')
            ->subject('Application request')
            ->attachData($this->attributes['pdf']->output(), 'application.pdf', [
                'mime' => 'application/pdf',
            ]);
        if(isset($this->attributes['driver_license'])){
            $mail = $mail->attach($this->attributes['driver_license']->getRealPath(), [
                'as' => $this->attributes['driver_license']->getClientOriginalName(),
                'mime' => $this->attributes['driver_license']->getMimeType()
            ]);
        }
        if(isset($this->attributes['proof_of_income'])){
            $mail = $mail->attach($this->attributes['proof_of_income']->getRealPath(), [
                'as' => $this->attributes['proof_of_income']->getClientOriginalName(),
                'mime' => $this->attributes['proof_of_income']->getMimeType()
            ]);
        }
        if(isset($this->attributes['other_photo_id'])){
            $mail = $mail->attach($this->attributes['other_photo_id']->getRealPath(), [
                'as' => $this->attributes['other_photo_id']->getClientOriginalName(),
                'mime' => $this->attributes['other_photo_id']->getMimeType()
            ]);
        }
        if(isset($this->attributes['birth_certificate'])){
            $mail = $mail->attach($this->attributes['birth_certificate']->getRealPath(), [
                'as' => $this->attributes['birth_certificate']->getClientOriginalName(),
                'mime' => $this->attributes['birth_certificate']->getMimeType()
            ]);
        }
        if(isset($this->attributes['rent_receipts'])){
            $mail = $mail->attach($this->attributes['rent_receipts']->getRealPath(), [
                'as' => $this->attributes['rent_receipts']->getClientOriginalName(),
                'mime' => $this->attributes['rent_receipts']->getMimeType()
            ]);
        }
        if(isset($this->attributes['medicare_card'])){
            $mail = $mail->attach($this->attributes['medicare_card']->getRealPath(), [
                'as' => $this->attributes['medicare_card']->getClientOriginalName(),
                'mime' => $this->attributes['medicare_card']->getMimeType()
            ]);
        }
        if(isset($this->attributes['debit_credit_card'])){
            $mail = $mail->attach($this->attributes['debit_credit_card']->getRealPath(), [
                'as' => $this->attributes['debit_credit_card']->getClientOriginalName(),
                'mime' => $this->attributes['debit_credit_card']->getMimeType()
            ]);
        }
        if(isset($this->attributes['bank_statement'])){
            $mail = $mail->attach($this->attributes['bank_statement']->getRealPath(), [
                'as' => $this->attributes['bank_statement']->getClientOriginalName(),
                'mime' => $this->attributes['bank_statement']->getMimeType()
            ]);
        }
        if(isset($this->attributes['utility_bill'])){
            $mail = $mail->attach($this->attributes['utility_bill']->getRealPath(), [
                'as' => $this->attributes['utility_bill']->getClientOriginalName(),
                'mime' => $this->attributes['utility_bill']->getMimeType()
            ]);
        }

        return $mail->with([
            'logoPath' => public_path('images/logo.png'),
        ]);

    }
}
