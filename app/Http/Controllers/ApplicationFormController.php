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
        try {
            $pdf = \PDF::loadView('frontend.applicationForm.application_pdf', ['attributes' => $request->all()]);
            $attributes = $request->all();
            $attributes['pdf'] = $pdf;
            Mail::to(config('app.application_to_mail'))->send(new ApplicationFormSubmit($attributes));
            dd("Mail sent");
            return redirect()->route('home');
        }catch (\Exception $e){
            dd($e);
        }
    }
}