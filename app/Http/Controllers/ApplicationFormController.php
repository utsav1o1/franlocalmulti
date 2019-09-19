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
        dd($request->all());
        $pdf = \PDF::loadView('frontend.applicationForm.application_pdf', ['attributes' => $request->all()]);
        $attributes = $request->all();
        $attributes['pdf'] = $pdf;
        Mail::to('prasang381@gmail.com')->send(new ApplicationFormSubmit($attributes));
        return redirect()->route('home');
    }
}