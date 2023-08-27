@extends('backend.master')

@section('content')

<div class="container m-5 p-5">
    <div class="card">
        <div class="card-header"><h3 style="color:rgba(55,180,236,255)">Medicine List <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('medicine_create')}}">Add New Medicine</a></h3>

        </div>
        <div class="card-body">
            <table class="table" >
                <thead >
                  <tr >
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Ser No</th>
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Medicine Name</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Medicine Image</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Medicine Description</th>  
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Price</th>
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Category Name</th>
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Company Name</th>
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Store Name</th>                     
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Actions</th>     
                  </tr>
                </thead>
                <tbody>
                  @php
                      $id=1;
                  @endphp
                  @foreach ($medicines as $medicine)
                  <tr>             
                    <td>{{$id++}}</td>
                    <td>{{$medicine->medicine_name}}</td>
                    <td>
                      @if(file_exists(storage_path().'/app/public/medicines/'.$medicine->medicine_image) &&(!is_null($medicine->medicine_image)))
                      <img src="{{asset('storage/medicines/'. $medicine->medicine_image)}}"height="100px"width="150px">
                      @else         
                      <img src="{{asset('storage/categories/default.jpg')}}"height="100px" width="150px">
                      @endif
                    </td>

                    <td>{{$medicine->medicine_description}}</td>
                    <td>{{$medicine->medicine_price}}</td>
                    <td>{{$medicine->category->category_name?? ''}}</td>
                    <td>{{$medicine->company->company_name?? ''}}</td>
                    <td>{{$medicine->vendor->store_name?? ''}}</td>
                    <td>
                      <a class="btn btn-sm btn-warning" href="{{route('medicine_edit',$medicine->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{route('medicine_delete',$medicine->id)}}">Delete</a>
                    </td>
                  </tr>  
                  @endforeach      
                </tbody>
              </table>
        {{-- pegination link show --}}
        {{ $medicines->links() }} 

             
        </div>
    </div>
</div>
      
@endsection