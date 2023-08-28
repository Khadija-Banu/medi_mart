@extends('frontend.master')

@section('content')
    

        <div class="container">

          <section class="popular-categories section-padding mt-15 mb-25">
            <div class="container wow fadeIn animated">
              <h4 >{{$medicines->count()}} Results for: {{$query}}</h4>


               
                <div class="carausel-6-columns-cover position-relative">
                    <div class="slider-arrow slider-arrow-2 carausel-6-columns-arrow" id="carausel-6-columns-arrows">
    
                    </div>
                    <div class="carausel-6-columns" id="carausel-6-columns">
    
                      @foreach ($medicines as $medicine)
                        
                        <div class="card-1">
                            <figure class=" img-hover-scale overflow-hidden">
                                <a href="{{route('frontend_shop',$medicine->id)}}"><img src="{{asset('storage/medicines/'. $medicine->medicine_image)}}" alt=""></a>
                            </figure>
                            <h5><a href="{{route('frontend_shop',$medicine->id)}}">Name:{{$medicine->medicine_name}}</a></h5>
                            <h5><a href="{{route('frontend_shop',$medicine->id)}}">${{$medicine->medicine_price}}</a></h5>
                            <h5><a href="{{route('frontend_shop',$medicine->id)}}">{{$medicine->vendor->store_name?? ''}}</a></h5>
                            <h5><a href="{{route('frontend_shop',$medicine->id)}}">Location:{{$medicine->vendor->location?? ''}}</a></h5>
                        </div>
                        @endforeach
                       
                       
                    </div>
                </div>
            </div>
        </section>
        
    
      
      


@endsection