<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Medicine;
use App\Models\Company;
use App\Models\Slider;
use App\Models\Cart;

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

    public function product($id){
        $myItems=Cart::where('user_id',auth()->user()->id)->count();
        $medicines=Medicine::where('id', $id)->get();
        $categories=Category::all();
        return view ('frontend.f_product_details',compact('categories','medicines','myItems'));
    }

    public function checkout(){
        $categories=Category::all();
        $cartItems=Cart::with('medicine')->where('user_id',auth()->user()->id)->get();
        return view ('frontend.f_checkout',compact('categories','cartItems'));
    }
    
}
