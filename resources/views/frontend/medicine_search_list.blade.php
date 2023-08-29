@extends('frontend.master')

@section('content')
    

        <div class="container p-5">

          <section class="popular-categories section-padding mt-15 mb-25">
            <div class="container wow fadeIn animated">
              <h4 style="color:rgba(141,196,66,255)">{{$medicines->count()}} Results for: {{$query}}</h4>

            <div class="container mt-4">
              <table class="table" >
                <thead >
                  <tr >
                    <th style="color:rgba(141,196,66,255)" >Ser No</th>
                    <th style="color:rgba(141,196,66,255)">Medicine Name</th> 
                    <th style="color:rgba(141,196,66,255)" >Medicine Image</th> 
                    <th style="color:rgba(141,196,66,255)" >Price</th>
                
                    <th style="color:rgba(141,196,66,255)" >Company Name</th>
                    <th style="color:rgba(141,196,66,255)" >Store Name</th>  
                    <th style="color:rgba(141,196,66,255)" >Location</th>                   
                  
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
                    <td>{{$medicine->medicine_price}}</td>
                  
                    <td>{{$medicine->company->company_name?? ''}}</td>
                    <td>{{$medicine->vendor->store_name?? ''}}</td>
                    <td>{{$medicine->vendor->location ?? ''}}</td>
                
                  </tr>  
                  @endforeach      
                </tbody>
              </table>
        {{-- pegination link show
        {{ $categories->links() }}  --}}



      </div> 
    
            </div>
        </section>
        
      </div> 
      
      


@endsection