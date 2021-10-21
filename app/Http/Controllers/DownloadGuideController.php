<?php

namespace App\Http\Controllers;

use App\Jobs\BuyingGuideJob;
use App\Jobs\SellingGuideJob;
use App\Jobs\SendSellingGuideJob;
use App\Models\Corporate\Page;
use App\Models\Corporate\PageDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $data = $request->all();
        unset($data['_token']);
        // dd($data['email']);

        if ($validator->fails()) {
            return redirect()->back()->with('errors_selling', 'Please provide all info!');
        }
        try {
            $selling = Page::where('slug', 'selling')->first();
            if (isset($selling) && $selling != null) {
                $data['selling'] = PageDetail::where('page_id', $selling->id)->where('slug', 'selling-your-home')->select('image')->first();

            } else {
                $data['selling'] = null;
            }
            $data['mail_to'] = config('app.enquiry_to_mail');
            // dd($data['selling']['image']);
            // dd($validator);
            // Mail::to(config('app.enquiry_to_mail'))->send(new SellingGuideMail($data));
            // Mail::to($data['email'])->send(new SendSellingGuideMail($data));
            $sellingJobToDispatch = (new SellingGuideJob($data))->delay(Carbon::now()->addSeconds(10));
            dispatch($sellingJobToDispatch);
            $sendSellingJobToDispatch = (new SendSellingGuideJob($data))->delay(Carbon::now()->addSeconds(10));
            dispatch($sendSellingJobToDispatch);

        } catch (\Exception $e) {
            // dd($e);
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
            return redirect()->back()->with('errors_buying', 'Please provide all info!');
        }
        try {
            $buying = Page::where('slug', 'selling')->first();
            if (isset($buying) && $buying != null) {
                $data['buying'] = PageDetail::where('page_id', $buying->id)->where('slug', 'buying-a-home')->select('image')->first();

            } else {
                $data['buying'] = null;
            }
            $data['mail_to'] = config('app.enquiry_to_mail');

            // dd($validator);
            // Mail::to(config('app.enquiry_to_mail'))->send(new BuyingGuideMail($data));
            $buyingJobToDispatch = (new BuyingGuideJob($data))->delay(Carbon::now()->addSeconds(10));
            dispatch($buyingJobToDispatch);
            $sendBuyingJobToDispatch = (new BuyingGuideJob($data))->delay(Carbon::now()->addSeconds(10));
            dispatch($sendBuyingJobToDispatch);

            // Mail::to($data['email'])->send(new SendBuyingGuideMail($data));
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
