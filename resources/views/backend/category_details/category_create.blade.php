@extends('backend.master')

@section('content')

<div class="container m-5 p-5">
    <div class="card">
    <div class="card-body mt-4 ">
    <h3 style="color:rgba(55,180,236,255)">Create Category<a class="btn btn-sm btn-info" style="margin-left: 20px" href="{{route('category_index')}}">Category list</a></h3>
        
    <form action="{{route('category_store')}}" method="post" class="mt-4" enctype="multipart/form-data">
        @csrf
            <div class="form-group mt-2">
                <input class="form-control" type="text " name="category_name" placeholder="category name">
            </div>
            <div class="form-group mt-2">
                <input type="file" name="category_image" class="form-control" >
              </div>
              <button type="submit" class="btn btn-success mt-2">Submit</button>
            </form>
        </div>
    </div>
</div>
    
@endsection