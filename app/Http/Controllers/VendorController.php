<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Carbon;
use Image;

class VendorController extends Controller
{
    public function index(){
        $vendors=Vendor::all();
        return view ('backend.vendor_details.vendor_index',compact('vendors'));
    }

    public function create(){
        return view ('backend.vendor_details.vendor_create');
    }

    public function store(Request $request){
        try{
   
     $data=$request->all();
     if($request->store_image){
         $image=$this->UploadImage($request->vendor_name,$request->store_image);
     }
    
     $data['store_image']=$image;
     Vendor::create($data);
     return redirect()->route('vendor_index');
    }
    catch(Exception $e){
     return redirect()-route('vendor_create');
    }
    }




    //Image upload function
    public function UploadImage($medicine_name,$medicine_image){
        $timestamp=str_replace([' ',':'],'-',Carbon::now()->toDateTimeString());
        $file_name=$timestamp . '-'.$medicine_name. '.' .$medicine_image->getClientOriginalExtension();
        $pathToUpload=storage_path().'/app/public/medicines/';
 
        if(!is_dir($pathToUpload)){
         mkdir($pathToUpload, 0755, true);
 
        }
        Image::make($medicine_image)->resize(634,792)->save($pathToUpload.$file_name);
        return $file_name;
     }
 
     //Image update then previous image delete in storage folder
     private function unlink($medicine_image){
         $pathToUpload=storage_path().'/app/public/medicines/';
         if($medicine_image != '' && file_exists($pathToUpload.$medicine_image)){
             @unlink($pathToUpload.$medicine_image);
         }
     }
}
