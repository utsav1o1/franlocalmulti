<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Transformers\Select2Transformer;
use App\Http\Requests\SendEnquiryRequest;
use App\Repositories\LocationRepository;

class ContactUsController extends Controller
{
	protected $locationRepo;

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
        Mail::send('emails.contact-us', ['data' => $data], function($message) use ($data) {
            $message->to('megha.poudel@multidynamic.com.au', 'Contact Us')
                    ->subject('Contact Us');
        });
    }
}
