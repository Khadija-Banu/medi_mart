<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;



class SearchController extends Controller
{
   
  //Search blog title in navbar search field
  public function medicine_search(Request $request){
  
    $query=$request->input(key: 'query');
    
    $medicines=Medicine::where('medicine_name','LIKE',"%$query%")->get();
    return view('backend.medicine_details.medicine_search_list',compact('medicines','query'));
  }

 
}
