<?php namespace todoaparrot\Http\Controllers;

use todoaparrot\Http\Requests;
use todoaparrot\Http\Controllers\Controller;

use Illuminate\Http\Request;

class DashBoardController extends Controller {
 
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
     * Show the application dashboard to the user.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard');
    }
 
}