<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth')->except('Show');
    // }

    Public function Show(){
        return 'Hi youssef';
    }
}
