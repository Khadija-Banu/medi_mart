@extends('backend.master')

@section('content')
<div class="container m-5 p-5">
    <div class="card">
    <div class="card-body mt-4 ">
    <h3 style="color:rgba(55,180,236,255)">Update Medicine<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('medicine_index')}}">Medicine list</a></h3>
        
    <form action="{{route('medicine_update',$medicines->id)}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text "value="{{$medicines->medicine_name}}" name="medicine_name" >
            </div>
            <div class="form-group mt-2">
                <input type="file" name="medicine_image" value="{{$medicines->medicine_image}}"class="form-control" >
              </div>
              <div class="form-group mt-2">
                <input class="form-control" type="text "value="{{$medicines->medicine_description}}" name="medicine_description" >
            </div>
            <div class="form-group mt-2">
                <input class="form-control" type="text "value="{{$medicines->medicine_price}}" name="medicine_price" >
            </div>
            <div class="form-group mt-2">
                <select class="form-select" name="category_id" >
                  <option value="">Select category name</option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}" >{{$category->category_name}}</option>
                  @endforeach
              
                </select>
              </div>

              <div class="form-group mt-2">
                <input type="text" name="company_name" class="form-control"  value="{{old('company_name')}}" placeholder="company name" >

                @error('company_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>
              
              <div class="form-group mt-2">
                <select class="form-select" name="vendor_id" >
                  <option value="">Select store name</option>
                  @foreach ($vendors as $vendor)
                  <option value="{{$vendor->id}}" >{{$vendor->store_name}}</option>
                  @endforeach
              
                </select>
              </div>
              <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
    
@endsection