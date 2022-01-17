<?php

namespace App\Http\Controllers;

use App\Helpers\Shared\EmailHelper;
use App\Jobs\BuyingGuideJob;
use App\Jobs\SellingGuideJob;
use App\Jobs\SendBuyingGuideJob;
use App\Jobs\SendSellingGuideJob;
use App\Models\Corporate\Page;
use App\Models\Corporate\PageDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Sheets;

class DownloadGuideController extends Controller
{
    public function sellingdownloadguide(Request $request)
    {

        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'postal_code' => 'required',
            'property_address' => '',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->all();
        unset($data['_token']);

        try {
            $selling = Page::where('slug', 'selling')->first();
            if (isset($selling) && $selling != null) {
                $data['selling'] = PageDetail::where('page_id', $selling->id)->where('slug', 'selling-your-home')->select('image')->first();
                // if (!empty($data['selling'])):
                //     $path = 'files';
                //     $copying_path = $data['selling']->getFilePath();
                //     if (!File::exists(public_path() . '/' . $path)) {
                //         File::makeDirectory(public_path() . '/' . $path, 0777, true);
                //     }
                //     if (!File::exists(public_path() . '/' . $path . '/' . $data['selling']['image'])) {
                //         // $image->move($destinationPath, $this->data['selling']->getFilePath());
                //         File::copy($copying_path, public_path($path . '/' . $data['selling']['image']));
                //     }
                //     $data['selling'] = asset('files' . '/' . $data['selling']['image']);
                // else:
                //     $data['selling'] = null;
                // endif;
                if (!empty($data['selling'])) {
                    $data['selling'] = $data['selling']->getFilePath();
                } else {
                    $data['selling'] = null;

                }
            } else {
                $data['selling'] = null;
            }
            // dd($validator);
            // Mail::to(config('app.enquiry_to_mail'))->send(new SellingGuideMail($data));
            // Mail::to($data['email'])->send(new SendSellingGuideMail($data));
            $emails = explode(',', config('app.enquiry_to_mail'));
            foreach ($emails as $email):
                $data['mail_to'] = $email;
                $sellingJobToDispatch = (new SellingGuideJob($data))->delay(Carbon::now()->addSeconds(10));
                dispatch($sellingJobToDispatch);
            endforeach;

            $sendSellingJobToDispatch = (new SendSellingGuideJob($data))->delay(Carbon::now()->addSeconds(10));
            dispatch($sendSellingJobToDispatch);

            // saving data to google spread sheet
            $appendData = [
                'Selling Guide Download',
                $data['name'],
                $data['email'],
                $data['phone'],
                $data['postal_code'],
                '',
                '',
                '',
                Carbon::parse(Carbon::now())->format('M d, Y'),
            ];

            $values = Sheets::spreadsheet(env('GOOGLE_SPREADSHEET_ID'))->sheetById(env('GOOGLE_SHEET_ID'))->append([$appendData]);
            //email responder
            EmailHelper::autoresponder($data['email']);
        } catch (\Exception $e) {
            // dd($e);
            $this->serverErrorResponse();
        }
        session()->put('name', $data['name']);
        return response()->json(['status' => 'success']);

    }
    public function buyingdownloadguide(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'postal_code' => 'required',
            'property_address' => '',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $data = $request->all();
        unset($data['_token']);

        // dd($validator->fails());
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);

        }
        try {
            $buying = Page::where('slug', 'selling')->first();
            if (isset($buying) && $buying != null) {
                $data['buying'] = PageDetail::where('page_id', $buying->id)->where('slug', 'buying-a-home')->select('image')->first();
                //dd($data['buying']->getFilePath());
                // $path = 'files';
                // if (!empty($data['buying'])):
                //     $copying_path = $data['buying']->getFilePath();
                //     if (!File::exists(public_path() . '/' . $path)) {
                //         File::makeDirectory(public_path() . '/' . $path, 0777, true);
                //     }
                //     if (!File::exists(public_path() . '/' . $path . '/' . $data['buying']['image'])) {
                //         // $image->move($destinationPath, $this->data['buying']->getFilePath());
                //         File::copy($copying_path, public_path($path . '/' . $data['buying']['image']));
                //     }
                //     $data['buying'] = asset('files' . '/' . $data['buying']['image']);
                // else:
                //     $data['buying'] = null;
                // endif;
                if (!empty($data['buying'])) {
                    $data['buying'] = $data['buying']->getFilePath();
                } else {
                    $data['buying'] = null;

                }

            } else {
                $data['buying'] = null;
            }
            // dd($data);
            $emails = explode(',', config('app.enquiry_to_mail'));
            foreach ($emails as $email):
                $data['mail_to'] = $email;
                $buyingJobToDispatch = (new BuyingGuideJob($data))->delay(Carbon::now()->addSeconds(10));
                dispatch($buyingJobToDispatch);

            endforeach;

            $sendBuyingJobToDispatch = (new SendBuyingGuideJob($data))->delay(Carbon::now()->addSeconds(10));
            dispatch($sendBuyingJobToDispatch);

            // saving data to google spreadsheet
            $appendData = [
                'Buying Guide Download',
                $data['name'],
                $data['email'],
                $data['phone'],
                $data['postal_code'],
                '',
                '',
                '',
                Carbon::parse(Carbon::now())->format('M d, Y'),
            ];

            $values = Sheets::spreadsheet(env('GOOGLE_SPREADSHEET_ID'))->sheetById(env('GOOGLE_SHEET_ID'))->append([$appendData]);
            EmailHelper::autoresponder($data['email']);
            // Mail::to($data['email'])->send(new SendBuyingGuideMail($data));
        } catch (\Exception $e) {

            $this->serverErrorResponse();
        }
        session()->put('name', $data['name']);
        // return redirect()->route('downloadguidesuccess');
        return response()->json(['status' => 'success']);

    }
    public function downloadguidesuccess()
    {
        $buying = Page::where('slug', 'selling')->first();
        if (isset($buying) && $buying != null) {
            $data['buying'] = PageDetail::where('page_id', $buying->id)->where('slug', 'buying-a-home')->select('image')->first();
            if (!empty($data['buying'])) {
                $data['buying'] = $data['buying']->getFilePath();
            } else {
                $data['buying'] = null;

            }

        } else {
            $data['buying'] = null;
        }
        /**
         * selling
         */
        $selling = Page::where('slug', 'selling')->first();
        if (isset($selling) && $selling != null) {
            $data['selling'] = PageDetail::where('page_id', $selling->id)->where('slug', 'selling-your-home')->select('image')->first();
            if (!empty($data['selling'])) {
                $data['selling'] = $data['selling']->getFilePath();
            } else {
                $data['selling'] = null;

            }
        } else {
            $data['selling'] = null;
        }
        if (session()->get('name') != null) {
            session()->forget('name');
            return view('frontend.enquiry-success.download-guide-success')->withBuying($data['buying'])->withSelling($data['selling']);
        } else {
            return redirect('/');
        }

    }
}
