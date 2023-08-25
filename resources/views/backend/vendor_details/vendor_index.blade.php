@extends('backend.master')

@section('content')

<div class="container m-5 p-5">
    <div class="card">
        <div class="card-header"><h3 style="color:rgba(55,180,236,255)">Vendor List <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('vendor_create')}}">Add New Vendor</a></h3>

        </div>
        <div class="card-body">
            <table class="table" >
                <thead >
                  <tr >
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Ser No</th>
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Vendor Name</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Store Name</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Store Image</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Store Website Link</th>  
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Location</th>                     
                   <th style="color:rgba(141,196,66,255)" class="fs-5">Actions</th>     
                  </tr>
                </thead>
                <tbody>
                  @php
                      $id=1;
                  @endphp
                  @foreach ($vendors as $vendor)
                  <tr>             
                    <td>{{$id++}}</td>
                    <td>{{$vendor->vendor_name}}</td>
                    <td>{{$vendor->store_name}}</td>
                    <td>
                      @if(file_exists(storage_path().'/app/public/vendors/'.$vendor->store_image) &&(!is_null($vendor->store_image)))
                      <img src="{{asset('storage/vendors/'. $vendor->store_image)}}"height="100px"width="150px">
                      @else         
                      <img src="{{asset('storage/categories/default.jpg')}}"height="100px" width="150px">
                      @endif
                    </td>
                    <td>{{$vendor->store_website_link}}</td>
                    <td>{{$vendor->location}}</td>              
                    <td>
                      <a class="btn btn-sm btn-warning" href="{{route('vendor_edit',$vendor->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{route('vendor_delete',$vendor->id)}}">Delete</a>
                    </td>
                  </tr>  
                  @endforeach      
                </tbody>
              </table>
        </div>
    </div>
</div>
    
@endsection