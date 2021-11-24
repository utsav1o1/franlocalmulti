<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEnquiryRequest;
use App\Jobs\PropertyApprasialJob;
use App\Jobs\PropertyEvaluationJob;
use App\Models\Corporate\Page;
use App\Models\Corporate\PageDetail;
use App\Repositories\LocationRepository;
use App\Transformers\Select2Transformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Sheets;

class ContactUsController extends Controller
{
    protected $locationRepo;
    protected $name;

    public function __construct(LocationRepository $locationRepo)
    {
        $this->locationRepo = $locationRepo;
    }

    public function showContactUsForm()
    {
        return view('frontend.enquiry.enquiry-form');
    }

    public function getLocationListForEnquiryForm(Request $request)
    {
        $searchText = $request->has('q') ? $request->input('q') : '';
        $pageLimit = $request->input('pageLimit');

        try {
            $paginatedData = $this->locationRepo->getLocationListForSelect2($searchText, $pageLimit);

        } catch (\Exception $e) {

            return $this->serverErrorResponse();
        }

        $select2Data = Select2Transformer::transformPaginatedDataToSelect2Data($paginatedData);

        return $this->successDataResponse($select2Data);
    }

    public function sendEnquiry(SendEnquiryRequest $request)
    {
        $data = $request->all();

        $this->sendContactUsByEmail($data);

        // saving data to google sheet
        $appendData = [
            'Send Enquiry',
            $data['name'],
            $data['email'],
            $data['contact'],
            '',
            $data['address'],
            '',
            '',
            Carbon::parse(Carbon::now())->format('M d, Y'),
        ];

        $values = Sheets::spreadsheet(env('GOOGLE_SPREADSHEET_ID'))->sheetById(env('GOOGLE_SHEET_ID'))->append([$appendData]);

        $request->session()->flash('success', 'Successfully Sent!!');

//        return redirect(route('contact-us.form'));
        session()->put('name', $data['name']);
        // return redirect()->route('propertyappraisalsuccess');
        return response()->json(['status' => 'success']);

    }

    private function sendContactUsByEmail($data)
    {
        Mail::send('emails.contact-us', ['data' => $data], function ($message) use ($data) {
            $message->to('megha.poudel@multidynamic.com.au', 'Contact Us')
                ->subject('Contact Us');
        });
    }

    // home page property evaluation inquery
    public function propertyEvaludation(Request $request)
    {

        $validated = validator()->make(request()->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'postal_code' => 'required|postal_code:Au',
            'property_address' => 'required|min:5|max:255',
            'g-recaptcha-response' => 'required|captcha',
            'my_name' => 'honeypot',
            'my_time' => 'required|honeytime:10',
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }
        $validated = $request->all();
        $emails = explode(',', config('app.enquiry_to_mail'));

        try {

            foreach ($emails as $email):
                $validated['mail_to'] = $email;
                $jobToDispatch = (new PropertyEvaluationJob($validated))->delay(Carbon::now()->addSeconds(10));
                dispatch($jobToDispatch);
            endforeach;

            // saving data to spreadsheet
            $appendData = [
                'Property Evaluation',
                $validated['name'],
                $validated['email'],
                $validated['phone'],
                $validated['postal_code'],
                $validated['property_address'],
                '',
                '',
                Carbon::parse(Carbon::now())->format('M d, Y'),

            ];
            $values = Sheets::spreadsheet(env('GOOGLE_SPREADSHEET_ID'))->sheetById(env('GOOGLE_SHEET_ID'))->append([$appendData]);

        } catch (\Exception $e) {

            return $this->serverErrorResponse();
        }
        session()->put('name', $validated['name']);
        // return redirect()->route('propertyevaluationsuccess');
        return response()->json(['status' => 'success']);

    }
    public function propertyEvaludationSuccess()
    {
        // dd(session()->get('name'));
        if (session()->get('name') != null) {
            session()->forget('name');
            return view('frontend.enquiry-success.property-evaluation-success');
        } else {
            return redirect('/');
        }

    }
    public function propertyAppraisal(Request $request)
    {

        $validated = validator()->make(request()->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'postal_code' => 'required|required|postal_code:Au',
            'property_type' => 'required',
            'message' => 'required|max:500',
            'g-recaptcha-response' => 'required|captcha',
            'my_name' => 'honeypot',
            'my_time' => 'required|honeytime:10',
        ]);
        if ($validated->fails()) {
            return response()->json(['errors' => $validated->errors()], 422);
        }
        $validated = $request->all();
        $emails = explode(',', config('app.enquiry_to_mail'));

        try {
            // Mail::to(config('app.enquiry_to_mail'))->send(new PropertyApprasialMail($validated));
            foreach ($emails as $email):
                $validated['mail_to'] = $email;
                $jobToDispatch = (new PropertyApprasialJob($validated))->delay(Carbon::now()->addSeconds(10));
                dispatch($jobToDispatch);
            endforeach;

            // saving data to google spread sheet
            $appendData = [
                'Property Appraisal',
                $validated['name'],
                $validated['email'],
                $validated['phone'],
                $validated['postal_code'],
                '',
                $validated['property_type'],
                $validated['message'],
                Carbon::parse(Carbon::now())->format('M d, Y'),

            ];

            $values = Sheets::spreadsheet(env('GOOGLE_SPREADSHEET_ID'))->sheetById(env('GOOGLE_SHEET_ID'))->append([$appendData]);

        } catch (\Exception $e) {
            // dd($e);
            return $this->serverErrorResponse();
        }
        session()->put('name', $validated['name']);
        // return redirect()->route('propertyappraisalsuccess');
        return response()->json(['status' => 'success']);

    }
    public function propertyAppraisalSuccess()
    {
        // dd(session()->get('name'));
        if (session()->get('name') != null) {
            session()->forget('name');

            // sending selling page data
            $selling = Page::where('slug', 'selling')->first();
            if (isset($selling) && $selling != null) {
                $selling['selling'] = PageDetail::where('page_id', $selling->id)->where('slug', 'selling-your-home')->first();
                $selling['buying'] = PageDetail::where('page_id', $selling->id)->where('slug', 'buying-a-home')->first();

            } else {
                $selling['selling'] = null;
                $selling['buying'] = null;
            }

            return view('frontend.enquiry-success.property-appraisal-success')->withPage($selling);
        } else {
            return redirect('/');
        }

    }
}
