<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends GeneralController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->getVars();
        return view('dashboard.index', ["data"=>$this->data]);
    }
}
