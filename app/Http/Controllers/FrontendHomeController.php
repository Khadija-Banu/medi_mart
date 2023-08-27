<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Company;
use App\Models\Slider;

class FrontendHomeController extends Controller
{
    public function home(){
        $sliders=Slider::all();
        $categories=Category::all();
        $medicines=Medicine::all();
        $companies=Company::all();
        return view ('frontend.f_home',compact('categories','medicines','companies','sliders'));
    }

    public function shop($id){
        $medicines=Medicine::all();
        $categories = Category::where('id', $id)->get();
        return view ('frontend.f_shop',compact('medicines','categories'));
    }
    
}
