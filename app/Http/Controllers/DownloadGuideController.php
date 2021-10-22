<?php

namespace App\Http\Controllers;

use App\Jobs\BuyingGuideJob;
use App\Jobs\SellingGuideJob;
use App\Jobs\SendBuyingGuideJob;
use App\Jobs\SendSellingGuideJob;
use App\Models\Corporate\Page;
use App\Models\Corporate\PageDetail;
use Carbon\Carbon;
use File;
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
            // 'g-recaptcha-response' => 'required|captcha',
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
                if (!empty($data['selling'])):
                    $path = 'files';
                    $copying_path = $data['selling']->getFilePath();
                    if (!File::exists(public_path() . '/' . $path)) {
                        File::makeDirectory(public_path() . '/' . $path, 0777, true);
                    }
                    if (!File::exists(public_path() . '/' . $path . '/' . $data['selling']['image'])) {
                        // $image->move($destinationPath, $this->data['selling']->getFilePath());
                        File::copy($copying_path, public_path($path . '/' . $data['selling']['image']));
                    }
                    $data['selling'] = asset('files' . '/' . $data['selling']['image']);
                else:
                    $data['selling'] = null;
                endif;

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
                //dd($data['buying']->getFilePath());
                $path = 'files';
                if (!empty($data['buying'])):
                    $copying_path = $data['buying']->getFilePath();
                    if (!File::exists(public_path() . '/' . $path)) {
                        File::makeDirectory(public_path() . '/' . $path, 0777, true);
                    }
                    if (!File::exists(public_path() . '/' . $path . '/' . $data['buying']['image'])) {
                        // $image->move($destinationPath, $this->data['buying']->getFilePath());
                        File::copy($copying_path, public_path($path . '/' . $data['buying']['image']));
                    }
                    $data['buying'] = asset('files' . '/' . $data['buying']['image']);
                else:
                    $data['buying'] = null;
                endif;

            } else {
                $data['buying'] = null;
            }
            // dd($data);
            $data['mail_to'] = config('app.enquiry_to_mail');

            // dd($validator);
            // Mail::to(config('app.enquiry_to_mail'))->send(new BuyingGuideMail($data));
            $buyingJobToDispatch = (new BuyingGuideJob($data))->delay(Carbon::now()->addSeconds(10));
            dispatch($buyingJobToDispatch);
            $sendBuyingJobToDispatch = (new SendBuyingGuideJob($data))->delay(Carbon::now()->addSeconds(10));
            dispatch($sendBuyingJobToDispatch);

            // Mail::to($data['email'])->send(new SendBuyingGuideMail($data));
        } catch (\Exception $e) {
            dd($e);
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
