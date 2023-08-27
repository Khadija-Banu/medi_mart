@extends('backend.master')

@section('content')

<div class="container m-5 p-5">
    <div class="card">
    <div class="card-body mt-4 ">
    <h3 style="color:rgba(55,180,236,255)">Create Vendor<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('vendor_index')}}">Vendor list</a></h3>
        
    <form action="{{route('vendor_store')}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text " name="vendor_name" value="{{old('vendor_name')}}"  placeholder="vendor name">

                @error('vendor_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
            <div class="form-group mt-2">
              <input class="form-control" type="text " name="store_name" value="{{old('store_name')}}" placeholder="store name">

              @error('store_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror

          </div>
            <div class="form-group mt-2">
                <input type="file" name="store_image" class="form-control" >

                @error('store_image')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>
              <div class="form-group mt-2">
                <input type="text" name="store_website_link" class="form-control" value="{{old('store_website_link')}}"  placeholder="store website link">

                @error('store_website_link')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>
              <div class="form-group mt-2">
                <input type="text" name="location" class="form-control" value="{{old('location')}}" placeholder="location" >

                @error('location')
                <span class="text-danger">{{ $message }}</span>
                @enderror

              </div>
              <button type="submit" class="btn btn-success mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
    
@endsection