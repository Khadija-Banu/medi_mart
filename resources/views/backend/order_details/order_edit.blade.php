@extends('backend.master')

@section('content')

<div class="container ">
    <div class="card">
    <div class="card-body m-4 ">
    <h3 style="color:rgba(55,180,236,255)">Update Order<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('order_index')}}">Update list</a></h3>
        
    <form action="{{route('order_update',$orders->id)}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text " name="status" value="{{$orders->status}}">
            </div>
            <div class="form-group mt-2">
              <input class="form-control" type="text " name="address" value="{{$orders->address}}">
          </div>
              <div class="form-group mt-2">
                <input type="text" name="mobile_no" class="form-control" value="{{$orders->mobile_no}}">
              </div>
              <div class="form-group mt-2">
                <select class="form-select" name="user_id" >
                  <option value="">Select user name</option>
                  @foreach ($users as $user)
                  <option value="{{$user->id}}" >{{$user->name}}</option>
                  @endforeach        
                </select>
              </div>
              <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
    
@endsection