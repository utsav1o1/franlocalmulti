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
use Mail;

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

        $request->session()->flash('success', 'Successfully Sent!!');

        return redirect(route('contact-us.form'));
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
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'postal_code' => 'required|numeric',
            'property_address' => 'required|min:5|max:255',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        $validated['mail_to'] = config('app.enquiry_to_mail');
        try {
            // Mail::to(config('app.enquiry_to_mail'))->send(new PropertyEvaluationMail($validated));
            $jobToDispatch = (new PropertyEvaluationJob($validated))->delay(Carbon::now()->addSeconds(10));
            dispatch($jobToDispatch);

        } catch (\Exception $e) {
            dd($e);
            return $this->serverErrorResponse();
        }
        session()->put('name', $validated['name']);
        return redirect()->route('propertyevaluationsuccess');

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
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'postal_code' => 'required|numeric',
            'property_type' => 'required',
            'message' => 'required|max:500',
            'g-recaptcha-response' => 'required|captcha',
        ]);
        $validated['mail_to'] = config('app.enquiry_to_mail');

        try {
            // Mail::to(config('app.enquiry_to_mail'))->send(new PropertyApprasialMail($validated));
            $jobToDispatch = (new PropertyApprasialJob($validated))->delay(Carbon::now()->addSeconds(10));
            dispatch($jobToDispatch);

        } catch (\Exception $e) {
            // dd($e);
            return $this->serverErrorResponse();
        }
        session()->put('name', $validated['name']);
        return redirect()->route('propertyappraisalsuccess');

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
