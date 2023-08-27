<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendHomeController extends Controller
{
    public function home(){
        return view ('frontend.f_home');
    }
}
