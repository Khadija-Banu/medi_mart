<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Category;

class SearchController extends Controller
{
   
  //Search blog title in navbar search field
  public function search(Request $request){
  
    $query=$request->input(key: 'query');
    
    $medicines=Medicine::where('medicine_name','LIKE',"%$query%")->get();
    return view('backend.medicine_details.medicine_search_list',compact('medicines','query'));
  }

  //Search blog title in navbar search field
  public function search_order(Request $request){
  
    $query=$request->input(key: 'query');
    
    $categories=Category::where('category_name','LIKE',"%$query%")->get();
    return view('backend.category_details.category_search_list',compact('categories','query'));
  }
}
