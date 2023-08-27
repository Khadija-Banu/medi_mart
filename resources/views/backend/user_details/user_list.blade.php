@extends('backend.master')

@section('content')

  <div class="container">
    <div class="card">    
        <div class="card-body m-4">
          <h3 style="color:rgba(55,180,236,255)">User List  <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('order_create')}}">Medicine list</a></h3>
          <table class="table" >
                <thead >
                  <tr>
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Ser No</th>
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Name</th>
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Email</th>
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Medicine</th>                
                  </tr>
                </thead>
                <tbody>
                 @php
                   $i=1  
                 @endphp
                  @foreach ($users as $user)           
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @foreach ($user->carts as $cart)
                        <li>{{$cart->medicine->medicine_name?? ''}}</li>  
                        @endforeach
                    </td>   
                  </tr>   
                  @endforeach
                </tbody>
            </table>

                 {{-- pegination link show --}}
                 {{ $users->links() }} 
        </div>
      </div> 
    </div>
    
@endsection