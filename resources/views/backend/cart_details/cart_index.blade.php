@extends('backend.master')

@section('content')

<div class="container m-5 p-5">
    <div class="card">
        <div class="card-header"><h3 style="color:rgba(55,180,236,255)">Cart List <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('cart_create')}}">Add New Cart</a></h3>

        </div>
        <div class="card-body">
            <table class="table" >
                <thead >
                  <tr >
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Ser No</th>
                    <th style="color:rgba(141,196,66,255)" class="fs-5"> Quantity</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Unit price</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Total price</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">User Name</th>   
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Medicine Name</th>                               
                   <th style="color:rgba(141,196,66,255)" class="fs-5">Actions</th>     
                  </tr>
                </thead>
                <tbody>
                  @php
                      $id=1;
                  @endphp
                  @foreach ($carts as $cart)
                  <tr>             
                    <td>{{$id++}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>{{$cart->unit_price}}</td>               
                    <td>{{$cart->total_price}}</td>
                    <td>{{$cart->user->name?? ''}}</td> 
                    <td>{{$cart->medicine->medicine_name?? ''}}</td>              
                    <td>
                      <a class="btn btn-sm btn-warning" href="{{route('cart_edit',$cart->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{route('cart_delete',$cart->id)}}">Delete</a>
                    </td>
                  </tr>  
                  @endforeach      
                </tbody>
              </table>

                   {{-- pegination link show --}}
                   {{ $carts->links() }} 
        </div>
    </div>
</div>
    
@endsection