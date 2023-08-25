@extends('backend.master')

@section('content')

<div class="container m-5 p-5">
    <div class="card">
    <div class="card-body mt-4 ">
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
                <input class="form-control" type="text " name="user_id" value="{{$orders->user_id}}">
            </div>
              <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
    
@endsection