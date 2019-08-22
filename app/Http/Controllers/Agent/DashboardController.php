<?php

namespace App\Http\Controllers\Agent;

use App\Repositories\LogRepository;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashboardController extends Controller
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
        $this->middleware(['auth:agent', 'web']);
    }

    /**
     * show dashboard page
     *
     * @return view
     */
    public function index()
    {
        return view('agent.dashboard');
    }
}
