<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Http\Requests\SendVacateNoticeRequest;

class VacateNoticeController extends Controller
{
    public function showVacateNoticeForm()
    {
        return view('frontend.vacate-notice.vacate-notice-form');
    }

    public function sendVacateNotice(SendVacateNoticeRequest $request)
    {
        $data = $request->all();

        $this->sendVacateNoticeByEmail($data);

        $request->session()->flash('success', 'Vacate Notice Successfully Sent!!');

        return redirect(route('vacate-notice.form'));
    }

    private function sendVacateNoticeByEmail($data)
    {
        Mail::send('emails.vacate-notice', ['data' => $data], function($message) use ($data) {
            $message->to(env('VACATE_EMAIL'), 'Vacate Notice')
                    ->subject('Vacate Notice');
        });
    }
}
