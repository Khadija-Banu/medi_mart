<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medicine;
use App\Models\Category;



class SearchController extends Controller
{
    //security
    public function __construct(){
      $this->middleware('auth');
  }
  //Search blog title in navbar search field
  public function medicine_search(Request $request){
    $categories=Category::all();
    $query=$request->input(key: 'query');
    $medicines=Medicine::where('medicine_name','LIKE',"%$query%")->get();
    
    $userInfo= @unserialize(file_get_contents("http://ip-api.com/php"));
    // dd($userInfo);
    $lat = $userInfo['lat'];
    $lon = $userInfo['lon'];

    $vendors = [];
    foreach ($medicines as $medicine)
    {
     
// foreach($medicine->vendor as $data){

 
  $km = $this->calculateDistance($lat, $lon, $medicine->vendor->latitude, $medicine->vendor->latitude);
  $data['current_km'] = ceil($km['kilometers']);
  $vendors[] = $data;
  // dd($vendors[0]['current_km']);
}

// $key = array_column($vendors,'current_km');
// array_multisort($key, SORT_ASC, $vendors);
    // dd($locationInfo);
    
    return view('frontend.medicine_search_list',compact('medicines','query','categories','vendors'));
  }

  function calculateDistance($lat1,$lng1, $lat2, $lng2)
{
  $theta = $lng1 - $lng2;
  $miles = (sin(deg2rad($lat1))) *sin(deg2rad($lat2)) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));

  $miles = acos($miles);
  $miles = rad2deg($miles);
  $result['miles'] = $miles * 60 * 1.1515;
  $result['kilometers'] = $result['miles'] * 1.609344;
  return $result;
}

  public function f_medicine_search(Request $request){
  
    $query=$request->input(key: 'query');
    
    $medicines=Medicine::where('medicine_name','LIKE',"%$query%")->get();
    return view('backend.medicine_details.medicine_search_list',compact('medicines','query'));
  }


  public function medicine(Request $request){
    $data=Medicine::where('medicine_name','like','%'.$request->searchItem.'%') ->get();
    return $data;
    }
}
