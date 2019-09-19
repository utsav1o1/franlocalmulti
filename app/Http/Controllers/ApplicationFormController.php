<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationFormSubmitRequest;
use App\Mail\ApplicationFormSubmit;
use Illuminate\Support\Facades\Mail;


class ApplicationFormController extends Controller
{

    public function showForm()
    {
        return view('frontend.applicationForm.application');
    }

    public function submitApplication(ApplicationFormSubmitRequest $request)
    {
        $pdf = \PDF::loadView('frontend.applicationForm.application_pdf', ['attributes' => $request->all()]);
        $attributes = $request->all();
        $attributes['pdf'] = $pdf;
        Mail::to(config('app.application_to_mail'))->send(new ApplicationFormSubmit($attributes));
        $request->session()->flash('success', 'Your application has been successfully sent. We will contact you soon!');
        return redirect()->route('home');
    }
}