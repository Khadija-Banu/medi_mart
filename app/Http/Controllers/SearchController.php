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
//   public function medicine_search(Request $request){
//     $categories=Category::all();
//     $queryName=$request->input(key: 'query');
//     $medicines=Medicine::where('medicine_name','LIKE',"%$queryName%")->get();
    
//     $userInfo= @unserialize(file_get_contents("http://ip-api.com/php"));
  
//     $lat = $userInfo['lat'];
//     $lon = $userInfo['lon'];
//     $query = $userInfo['query'];

//     $vendors = [];
//     foreach ($medicines as $medicine)
//     {
 
// // foreach($medicine->vendor as $data){

//     $km = $this->calculateDistance($lat, $lon, $medicine->vendor->latitude, $medicine->vendor->latitude);

//     $data['current_km'] = ceil($km['kilometers']);

//     }

//     $vendors[] = $data;

//     $key = array_column($vendors,'current_km');
//     array_multisort($key, SORT_ASC, $vendors);
//     // dd($locationInfo);
    
//     return view('frontend.medicine_search_list',compact('medicines','queryName','categories','vendors','userInfo','query'));
//   }




public function medicine_search(Request $request){
  $categories = Category::all();
  $queryName = $request->input('query');
  $medicines = Medicine::where('medicine_name', 'LIKE', "%$queryName%")->get();
  
  $userInfo = @unserialize(file_get_contents("http://ip-api.com/php"));

  $lat = $userInfo['lat'];
  $lon = $userInfo['lon'];
  $query = $userInfo['query'];

  $vendors = [];
  foreach ($medicines as $medicine) {
      $data = []; // Initialize data for each medicine
      
      // foreach ($medicine->vendors as $vendor) {
          $km = $this->calculateDistance($lat, $lon, $medicine->vendor->latitude, $medicine->vendor->longitude);
          
          // Prepare vendor data
          $vendor_data = [
              'vendor_id' => $medicine->vendor->id,
              'current_km' => ceil($km['kilometers']),
              // Add other vendor data you want to store here
          ];
          
          $data[] = $vendor_data; // Add vendor data to data array
      // }

      // Sort vendors by current_km for each medicine
      usort($data, function ($a, $b) {
          return $a['current_km'] <=> $b['current_km'];
      });

      // Add data array for each medicine to vendors array
      $vendors[] = $data;
     
  }
  // dd($vendors[0][0]['vendor_id']);
  return view('frontend.medicine_search_list', compact('medicines', 'queryName', 'categories', 'vendors', 'userInfo', 'query'));
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
