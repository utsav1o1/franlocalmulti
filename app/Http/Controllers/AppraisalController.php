<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Transformers\Select2Transformer;
use App\Http\Requests\SendAppraisalRequest;
use App\Repositories\LocationRepository;

class AppraisalController extends Controller
{
	protected $locationRepo;

	public function __construct(LocationRepository $locationRepo)
	{
		$this->locationRepo = $locationRepo;
	}

    public function showAppraisalForm()
    {
        echo "<script type='text/javascript'>
        $(document).ready(function(){
        $('.bs-example-modal-lg').modal('show');
        });
        </script>";
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

    public function sendEnquiry(SendAppraisalRequest $request)
    {
        $data = $request->all();

        $this->sendContactUsByEmail($data);

        $request->session()->flash('success', 'Successfully Sent!!');

        return redirect(route('home'));
    }

    private function sendContactUsByEmail($data)
    {
        Mail::send('emails.appraisalmail', ['data' => $data], function($message) use ($data) {
            $emailSender = \Config::get('app.appraisal_mail');
            $message->to($emailSender, 'Appraisal Booking')
                    ->subject('New Appraisal Booking - MD Ingleburn');
        });
    }
}
