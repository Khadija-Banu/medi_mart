<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Image;


class OrderController extends Controller
{
    public function index(){
        $orders=Order::all();
        return view ('backend.order_details.order_index',compact('orders'));
    }

    public function create(){
        return view ('backend.order_details.order_create');
    }

    public function store(Request $request){
        try{
     $data=$request->all();
     Order::create($data);
     return redirect()->route('order_index');
    }
    catch(Exception $e){
     return redirect()-route('order_create');
    }
    }

    public function edit($id){
        $orders=Order::find($id);
        return view ('backend.order_details.order_edit',compact('orders'));
    }

    public function update(Request $request,$id){

        try{
            $data=$request->except('_token');
            Order::where('id', $id)->update($data);
            return redirect()->route('order_index');
        }catch(Exception $e){
            dd($e->getMessage());
        }  
    }

      //Individual post delete
      public function delete($id){
        $data=Order::find($id);
        $data->delete();
        return redirect()->back();
        
    }
}
