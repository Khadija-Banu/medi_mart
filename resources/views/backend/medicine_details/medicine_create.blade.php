@extends('backend.master')

@section('content')
<div class="container m-5 p-5">
    <div class="card">
    <div class="card-body mt-4 ">
    <h3 style="color:rgba(55,180,236,255)">Create Medicine<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('medicine_index')}}">Medicine list</a></h3>
        
    <form action="{{route('medicine_store')}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text " name="medicine_name"  value="{{old('medicine_name')}}" placeholder="medicine name">

                @error('medicine_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group mt-2">
                <input type="file" name="medicine_image" class="form-control"   >

                @error('medicine_image')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>
              <div class="form-group mt-2">
                <input type="text" name="medicine_description" class="form-control"  value="{{old('medicine_description')}}" placeholder="medicine description">

                @error('medicine_description')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>
              <div class="form-group mt-2">
                <input type="text" name="medicine_price" class="form-control"  value="{{old('medicine_price')}}" placeholder="medicine price" >

                @error('medicine_price')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>
              <div class="form-group mt-2">
                <select class="form-select" name="category_id" >
                  <option value="">Select category name</option>
                  @foreach ($categories as $category)
                  <option value="{{$category->id}}" >{{$category->category_name}}</option>
                  @endforeach             
                </select>

                @error('category_id')
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

                @error('vendor_id')
                <span class="text-danger">{{ $message }}</span>
                @enderror
              </div>
      
              <button type="submit" class="btn btn-success mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
    
@endsection