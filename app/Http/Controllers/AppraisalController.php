<?php

namespace App\Http\Controllers;

use App\Helpers\Shared\EmailHelper;
use App\Http\Requests\SendAppraisalRequest;
use App\Repositories\LocationRepository;
use App\Transformers\Select2Transformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Mail;
use Sheets;

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

        try {
            $this->sendContactUsByEmail($data);

        } catch (\Exception $e) {

            return $this->serverErrorResponse();
        }

        $appendData = [
            'Book an Apprasial',
            $data['fname'] . ' ' . $data['lname'],
            $data['email'],
            $data['contact'],
            $data['postcode'],
            $data['address'],
            '',
            $data['messages'] != null ? $data['messages'] : '',
            Carbon::parse(Carbon::now())->format('M d, Y'),
        ];
        // dd($appendData);

        $values = Sheets::spreadsheet(env('GOOGLE_SPREADSHEET_ID'))->sheetById(env('GOOGLE_SHEET_ID'))->append([$appendData]);
        EmailHelper::autoresponder($data['email']);

        $request->session()->flash('success', 'Successfully Sent!!');

        return response()->json(['status' => 'success']);

    }

    private function sendContactUsByEmail($data)
    {
        Mail::send('emails.appraisalmail', ['data' => $data], function ($message) use ($data) {
            $emailSender = \Config::get('app.appraisal_mail');
            $message->to($emailSender, 'Appraisal Booking')
                ->subject('New Appraisal Booking - MD Ingleburn');
        });
    }
}
