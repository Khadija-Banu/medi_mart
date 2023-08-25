@extends('backend.master')

@section('content')

<div class="container m-5 p-5">
    <div class="card">
    <div class="card-body mt-4 ">
    <h3 style="color:rgba(55,180,236,255)">Create Vendor<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('vendor_index')}}">Vendor list</a></h3>
        
    <form action="{{route('vendor_store')}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text " name="vendor_name" placeholder="vendor name">
            </div>
            <div class="form-group mt-2">
              <input class="form-control" type="text " name="store_name" placeholder="store name">
          </div>
            <div class="form-group mt-2">
                <input type="file" name="store_image" class="form-control" >
              </div>
              <div class="form-group mt-2">
                <input type="text" name="store_website_link" class="form-control" placeholder="store website link">
              </div>
              <div class="form-group mt-2">
                <input type="text" name="location" class="form-control"placeholder="location" >
              </div>
              <button type="submit" class="btn btn-success mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
    
@endsection