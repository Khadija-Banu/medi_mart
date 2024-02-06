@extends('frontend.master')

@section('content')
    
<main class="main">
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="index.html" rel="nofollow">Home</a>
                <span></span> Shop
            </div>
        </div>
    </div>
    <section class="mt-50 mb-50">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p> We found <strong class="text-brand">{{$medicines->count()}} </strong> items <strong class="text-brand">{{$query}}</strong> for you!</p>
                        </div>
                    </div>
 
                    <div class="row product-grid-3">
                    @foreach ($medicines as $medicine)
                   
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{route('frontend_product',$medicine->id)}}">
                                            <img class="default-img" src="{{asset('storage/medicines/'. $medicine->medicine_image)}}" alt="">
                                      
                                        </a>
                                    </div>
                                
                            
                                </div>  
                              
                                <div class="product-content-wrap ">                                 
                                    <h2>{{$medicine->medicine_name}}</h2>
                                    <div>Shop name: <span>{{$medicine->vendor->store_name?? ''}}</span>
                                  
                                  </div>
                                   <div class=" ">Company name: <span>{{$medicine->company->company_name?? ''}}</span></div>
                                   
                                   
                                    <div class="product-price">
                                        <span>Rs.{{$medicine->medicine_price}}</span>
                                       
                                     
                                    </div>
                                    <span>Gulshan. 5.1km</span>
                                    <div class="product-price" >
                                        <!-- <span>latitude.{{$medicine->vendor->latitude}}</span>
                                        <span>longitude.{{$medicine->vendor->longitude}}</span>
                                       -->
                                        <!-- <input type="text" value="{{$medicine->vendor->location}}" name="location" id="location">
                                        <input type="text" value="" name="dkm" id="dkm">
                                        <input type="text" value="" name="dmin" id="dmin"> -->
                                     
                                    </div>

                                    <!-- <div  class="product-price">
                                        <input type="text" id="ip">
                                        <input type="text" id="city">
                                       
                                    </div> -->

                                    <div class="product-action-1 mt-5 show">
                                    <a onclick="showMap({{$medicine->vendor->latitude}}, {{$medicine->vendor->longitute}}" class="ms-4 "><i class="fa-solid fa-location-dot fa-2xl"></i>
                            
                                </a>
                                    </div>
                                </div>
                                                      
                            </div>
                        </div>   

                        <!-- map -->
                        <div class="container">
                            <div id="map" style="width:100%;height:300px"></div>

                        </div>                 
                        @endforeach   
                   
                </div>

                  
                </div>
       
            </div>
        </div>
    </section>
</main>






<script>
    $.getJSON("https://api.ipify.org/?format=json", function(data) {
        let ip = data.ip;
        $("#ip").val(ip);
        getCity(ip);
    });

    function getCity(ip){
        var req =new XMLHttpRequest();
        req.open("GET","http://ip-api.com/json/"+ip,true);
        req.send();

        req.onreadystatechange =function(){
            if(req.readyState == 4 && req.status ==200){
                var obj= JSON.parse(req.responseText);
                jQuery("#city").val(obj.city);
                calculateDistance();
            }
        }
    }

    function calculateDistance() {
    var from = jQuery("#location").val();
    var to = jQuery("#city").val();

    var service = new google.maps.DistanceMatrixService();

    service.getDistanceMatrix({
        origins: [from], // Correct the order of origins and destinations
        destinations: [to],
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.metric,
        avoidHighways: false,
        avoidTolls: false
    }, callback);
}

function callback(response, status) {
    if (status != google.maps.DistanceMatrixStatus.OK) {
        console.log("Something  wrong");
    } else {
        if (response.rows[0].elements[0].status == "ZERO_RESULTS") {
            console.log("No roads found");
        } else {
            var distance = response.rows[0].elements[0].distance.text;
            var distance_in_km=distance.value/1000;
            var duration_in_min=distance.value/60;
            jQuery("#dkm").val(distance_in_km);
            jQuery("#dmin").val(duration_in_min);
            console.log(distance);
        }
    }
}


// map start
fucntion showMap(lat,lng){
    var coord = {lat:lat, lng:lng};
    var map = new google.maps.Map(document.getElementById("map"),
    {
        zoom:10,
        center:coord
    });
    new google.maps.Marker({
        position:coord,
        map:map
    })
}
showMap
</script>
@endsection