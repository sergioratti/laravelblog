<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting ;


class FrontEndController extends Controller
{
    public function index() {
        $setting = Setting::first() ;

        return view('welcome')->with('setting', $setting) ;
    }
}
