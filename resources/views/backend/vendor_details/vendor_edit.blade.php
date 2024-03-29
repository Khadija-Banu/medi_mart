@extends('backend.master')

@section('content')

<div class="container">
    <div class="card">
    <div class="card-body m-4 ">
    <h3 style="color:rgba(55,180,236,255)">Update Vendor<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('vendor_index')}}">Vendor list</a></h3>
        
    <form action="{{route('vendor_update',$vendors->id)}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text " name="vendor_name" value="{{$vendors->vendor_name}}">
            </div>

            <div class="form-group mt-2">
                <input class="form-control" type="text " name="store_name" value="{{$vendors->store_name}}">
            </div>

            <div class="form-group mt-2">
                <input type="file" name="store_image" class="form-control" value="{{$vendors->store_image}}" >
            </div>

            <div class="form-group mt-2">
                <input type="text" name="store_website_link" class="form-control" value="{{$vendors->store_website_link}}">
            </div>

            <div class="form-group mt-2">
                <input type="text" name="location" class="form-control" value="{{$vendors->location}}" >
            </div>

            <div class="form-group mt-2">
                <input type="text" name="latitude" class="form-control" value="{{$vendors->latitude}}" >
            </div>

            <div class="form-group mt-2">
                <input type="text" name="longitude" class="form-control" value="{{$vendors->longitude}}" >
            </div>

            <button type="submit" class="btn btn-success mt-2">Update</button>
            </form>

        </div>
    </div>
</div>
    
@endsection