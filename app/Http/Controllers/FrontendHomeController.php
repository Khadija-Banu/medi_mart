<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Company;

class FrontendHomeController extends Controller
{
    public function home(){
        $categories=Category::all();
        $medicines=Medicine::all();
        $companies=Company::all();
        return view ('frontend.f_home',compact('categories','medicines','companies'));
    }
}
