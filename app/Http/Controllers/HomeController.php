<?php

namespace App\Http\Controllers;

use App\InfoScreenSlide;
use Illuminate\Http\Request;

class HomeController extends Controller
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
        return view('home', ['slides' => InfoScreenSlide::where('info_screen_id', 1)->get()]);
    }
}
