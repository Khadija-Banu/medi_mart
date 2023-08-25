@extends('backend.master')

@section('content')

<div class="container m-5 p-5">
    <div class="card">
        <div class="card-header"><h3 style="color:rgba(55,180,236,255)">Order List <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('order_create')}}">Add New Order</a></h3>

        </div>
        <div class="card-body">
            <table class="table" >
                <thead >
                  <tr >
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Ser No</th>
                    <th style="color:rgba(141,196,66,255)" class="fs-5"> Status</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Address</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Mobile No</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">User Id</th>                                
                   <th style="color:rgba(141,196,66,255)" class="fs-5">Actions</th>     
                  </tr>
                </thead>
                <tbody>
                  @php
                      $id=1;
                  @endphp
                  @foreach ($orders as $order)
                  <tr>             
                    <td>{{$id++}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->address}}</td>               
                    <td>{{$order->mobile_no}}</td>
                    <td>{{$order->user_id}}</td>              
                    <td>
                      <a class="btn btn-sm btn-warning" href="{{route('order_edit',$order->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{route('order_delete',$order->id)}}">Delete</a>
                    </td>
                  </tr>  
                  @endforeach      
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection