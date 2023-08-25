<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Carbon;
use Image;

class CartController extends Controller
{
    public function index(){
        $carts=Cart::all();
        return view ('backend.cart_details.cart_index',compact('carts'));
    }

    public function create(){
        return view ('backend.cart_details.cart_create');
    }


    public function store(Request $request){
        try{
     $data=$request->all();
     Cart::create($data);
     return redirect()->route('cart_index');
    }
    catch(Exception $e){
     return redirect()-route('cart_create');
    }
    }

    public function edit($id){
        $carts=Cart::find($id);
        return view ('backend.cart_details.cart_edit',compact('carts'));
    }


    public function update(Request $request,$id){

        try{
            $data=$request->except('_token');
            Cart::where('id', $id)->update($data);
            return redirect()->route('cart_index');
        }catch(Exception $e){
            dd($e->getMessage());
        }  
    }



      //Individual post delete
      public function delete($id){
        $data=Cart::find($id);
        $data->delete();
        return redirect()->back();
        
    }
}
