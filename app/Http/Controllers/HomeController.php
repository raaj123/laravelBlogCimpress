<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Session;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$userData = ['userName'=>session::get('userName'),'userEmail' =>session::get('userEmail')];
		return view('home',compact('userData'));
    }
}
