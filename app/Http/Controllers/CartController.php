<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CartRequest;
use App\Models\Cart;
use App\Models\User;
use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Support\Carbon;
use Image;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function index(){
        $carts=Cart::paginate(4);
        return view ('backend.cart_details.cart_index',compact('carts'));
    }

    public function create(){
        $medicines=Medicine::all();
        $users=User::all();
        return view ('backend.cart_details.cart_create',compact('users','medicines'));
    }


    public function store(Request $request){

        $medicine = Medicine::find($request->medicine_id);



        DB::table('carts')->insert([
            'medicine_id' => $medicine->id,
            'user_id' => auth()->user()->id,
            'unit_price' => $medicine->medicine_price,
            'quantity' => $request->quantity,
            'total_price' =>( $medicine->medicine_price * $request->quantity ) ?? 0


        ]);
        return redirect()->back();

    //     try{
    //  $data=$request->all();
    //  Cart::create($data);
    //  return redirect()->route('cart_index');
    // }
    // catch(Exception $e){
    //  return redirect()-route('cart_create')->withMessage($e->getMessage());
    // }
    }

    public function edit($id){
        $medicines=Medicine::all();
        $users=User::all();
        $carts=Cart::find($id);
        return view ('backend.cart_details.cart_edit',compact('carts','users','medicines'));
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

    public function cartItems()

    { 

        $categories = Category::all();
        $cartItems=Cart::with('medicine')->where('user_id',auth()->user()->id)->get();
        return view('frontend.f_cart',compact('cartItems','categories'));
    }

}
