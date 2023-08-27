@extends('backend.master')

@section('content')

<div class="container m-5 p-5">
    <div class="card">
        <div class="card-header"><h3 style="color:rgba(55,180,236,255)">Company List <a class="btn btn-sm btn-success" style="margin-left: 20px" href="{{route('company_create')}}">Add New Company</a></h3>

        </div>
        <div class="card-body">
            <table class="table" >
                <thead >
                  <tr >
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Ser No</th>
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Company Name</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Company Image</th>  
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Medicine item</th> 
                    <th style="color:rgba(141,196,66,255)" class="fs-5">Actions</th>     
                  </tr>
                </thead>
                <tbody>
                  @php
                      $id=1;
                  @endphp
                  @foreach ($companies as $company)
                  <tr>             
                    <td>{{$id++}}</td>
                    <td>{{$company->company_name}}</td>
                    <td>
                      @if(file_exists(storage_path().'/app/public/companies/'.$company->company_image) &&(!is_null($company->company_image)))
                      <img src="{{asset('storage/companies/'. $company->company_image)}}"height="100px"width="150px">
                      @else         
                      <img src="{{asset('storage/categories/default.jpg')}}"height="100px" width="150px">
                      @endif
                    </td>

                    {{-- <td>
                      @foreach ($company->medicines as $medicine)
                      <li>{{$medicine->medicine_name}}</li>  
                      @endforeach
                  </td> --}}

                    <td>
                      <a class="btn btn-sm btn-warning" href="{{route('company_edit',$company->id)}}">Edit</a>
                      <a class="btn btn-sm btn-danger" href="{{route('company_delete',$company->id)}}">Delete</a>
                    </td>
                  </tr>  
                  @endforeach      
                </tbody>
              </table>

                   {{-- pegination link show --}}
                   {{ $companies->links() }} 
        </div>
    </div>
</div>
    
@endsection