@extends('backend.master')

@section('content')

<div class="container">
    <div class="card">
        <div class="card-body m-4">
          <h3 style="color:rgba(55,180,236,255)">Order List <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('order_create')}}">Add New Order</a></h3>
            <table class="table" >
                <thead >
                  <tr >
                    <th style="color:rgba(70,99,202,255)">Ser No</th>
                    <th style="color:rgba(70,99,202,255)"> Status</th> 
                    <th style="color:rgba(70,99,202,255)">Address</th> 
                    <th style="color:rgba(70,99,202,255)">Mobile No</th> 
                    <th style="color:rgba(70,99,202,255)">User Name</th>                                
                   <th style="color:rgba(70,99,202,255)">Actions</th>     
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
                    <td>{{$order->phone}}</td>
                    <td>{{$order->name?? ''}}</td>            
                    <td>
                      <a class="btn btn-sm btn-warning" href="{{route('order_edit',$order->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{route('order_delete',$order->id)}}">Delete</a>
                    </td>
                  </tr>  
                  @endforeach      
                </tbody>
              </table>

                   {{-- pegination link show --}}
                    {{ $orders->links() }} 
        </div>
    </div>
</div>
    
@endsection