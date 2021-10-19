<?php

namespace App\Http\Controllers;

use App\Mail\BuyingGuideMail;
use App\Mail\SellingGuideMail;
use App\Mail\SendBuyingGuideMail;
use App\Mail\SendSellingGuideMail;
use App\Models\Corporate\Page;
use App\Models\Corporate\PageDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DownloadGuideController extends Controller
{
    public function sellingdownloadguide(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'postal_code' => 'required',
            'property_address' => 'required',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);
        $data = $request->all();
        unset($data['_token']);
        // dd($data['email']);

        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Please provide all info!');
        }
        try {
            $selling = Page::where('slug', 'selling')->first();
            if (isset($selling) && $selling != null) {
                $data['selling'] = PageDetail::where('page_id', $selling->id)->where('slug', 'selling-your-home')->first();

            } else {
                $data['selling'] = null;
            }
            // dd($validator);
            Mail::to(config('app.enquiry_to_mail'))->send(new SellingGuideMail($data));
            Mail::to($data['email'])->send(new SendSellingGuideMail($data));
        } catch (\Exception $e) {
            dd($e);
            return $this->serverErrorResponse();
        }
        session()->put('name', $data['name']);
        return redirect()->route('downloadguidesuccess');

    }
    public function buyingdownloadguide(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'postal_code' => 'required',
            'property_address' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $data = $request->all();
        unset($data['_token']);

        // dd($validator->fails());
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Please provide all info!');
        }
        try {
            $buying = Page::where('slug', 'selling')->first();
            if (isset($buying) && $buying != null) {
                $data['buying'] = PageDetail::where('page_id', $buying->id)->where('slug', 'buying-a-home')->first();

            } else {
                $data['buying'] = null;
            }
            // dd($validator);
            Mail::to(config('app.enquiry_to_mail'))->send(new BuyingGuideMail($data));
            Mail::to($data['email'])->send(new SendBuyingGuideMail($data));
        } catch (\Exception $e) {
            // dd($e);
            return $this->serverErrorResponse();
        }
        session()->put('name', $data['name']);
        return redirect()->route('downloadguidesuccess');

    }
    public function downloadguidesuccess()
    {
        // dd(session()->get('name'));
        if (session()->get('name') != null) {
            session()->forget('name');
            return view('frontend.enquiry-success.download-guide-success');
        } else {
            return redirect('/');
        }

    }
}
