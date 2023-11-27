<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Http\Requests\SendMaintenanceRequest;

class MaintenanceRequestController extends Controller
{
    public function showMaintenanceRequestForm()
    {
        return view('frontend.maintenance-request.maintenance-request-form');
    }

    public function sendMaintenanceRequest(SendMaintenanceRequest $request)
    {
        $data = $request->all();

        $this->sendMaintenanceRequestEmail($data);

        $request->session()->flash('success', 'Maintenance Request Successfully Sent!!');

        return redirect(route('maintenance-request.form'));
    }

    private function sendMaintenanceRequestEmail($data)
    {
        Mail::send('emails.maintenance-request', ['data' => $data], function($message) use ($data) {
            $message->to(env('MAINTENANCE_EMAIL'), 'Maintenance Request')
                    ->subject('Maintenance Request');
        });
    }
}
