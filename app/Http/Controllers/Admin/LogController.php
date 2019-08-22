<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\LogRepository;

class LogController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  LogRepository  $logs
     * @return void
     */
    public function __construct(
        LogRepository $logs
    ){
        $this->logs = $logs;
    }

    /**
     * Display a listing of the log.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.logs')
            ->withLogs($this->logs->searchAndPaginate($request->all(), 100))
            ->withRequestData($request->all());
    }

    /**
     * Display the specified log.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = $this->logs->find($id);
        if($log){
            return response()->json(['type'=>'ok',
                'log'=>$log,
                'loginable'=>$log->loginable
            ], 200);
        }
        return response()->json(['message'=>'Log not found'], 404);
    }
}
