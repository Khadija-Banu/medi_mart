<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Carbon;
use Image;


class OrderController extends Controller
{
    public function index(){
        $orders=Order::paginate(4);
        return view ('backend.order_details.order_index',compact('orders'));
    }

    public function create(){
        $users=User::all();
        return view ('backend.order_details.order_create',compact('users'));
    }

    public function store(OrderRequest $request){
        try{
     $data=$request->all();
     Order::create($data);
     return redirect()->route('order_index');
    }
    catch(Exception $e){
     return redirect()-route('order_create')->withMessage($e->getMessage());
    }
    }

    public function edit($id){
        $users=User::all();
        $orders=Order::find($id);
        return view ('backend.order_details.order_edit',compact('orders','users'));
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
