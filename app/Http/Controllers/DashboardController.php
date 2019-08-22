<?php

namespace App\Http\Controllers;

use App\Repositories\LogRepository;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  LogInterface  $logs
     * @return void
     */
    public function __construct(
        LogRepository $logs
    ){
        $this->logs = $logs;
    }

    /**
     * show dashboard page
     *
     * @return view
     */
    public function index()
    {
        return view('dashboard');
    }
}
