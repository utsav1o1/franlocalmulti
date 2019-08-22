<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected function serverErrorResponse()
    {
    	return response()->json(['status' => 'error', 'message' => 'Server Error!!']);
    }

    protected function successResponse($message)
    {
    	return response()->json(['status' => 'success', 'message' => $message]);
    }

    protected function failResponse($message)
    {
    	return response()->json(['status' => 'fail', 'message' => $message]);
    }

    protected function errorResponse($message)
    {
    	return response()->json(['status' => 'error', 'message' => $message]);
    }

    protected function successDataResponse($data)
    {
        $data['status'] = 'success';

        return response()->json($data);
    }

    protected function failDataResponse($data)
    {
        $data['status'] = 'fail';

        return response()->json($data);
    }

    protected function errorDataResponse($data)
    {
        $data['status'] = 'error';

        return response()->json($data);
    }

    protected function validationErrorResponse($errors)
    {
        return response()->json([ 'status' => 'validation-error', 'errors' => $errors ]);
    }

    protected function serverErrorReply()
    {
        Session::flash('error', 'Server Error');

        redirect()->back()
                  ->withInput();
    }
}
