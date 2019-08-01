<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class universalController extends Controller
{
    /**
     * Index page
     */
    public function index(){
        return view('index');
    }

    public function pos(){
        return view('pos');
    }

}
