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

                        @foreach ($categories as $category)
                        @foreach ($category->medicines as $medicine)
                      
                            @php
                            $counts=$category->medicines->count();
                            @endphp

                        @endforeach
                        @endforeach
                        <div class="totall-product">
                            <p> We found <strong class="text-brand">{{$counts}}</strong> items for you!</p>
                        </div>
                    </div>
 
                    <div class="row product-grid-3">
                    @foreach ($categories as $category)
                    @foreach ($category->medicines as $medicine)
                   
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{route('frontend_product',$medicine->id)}}">
                                            <img class="default-img" src="{{asset('storage/medicines/'. $medicine->medicine_image)}}" alt="">
                                            <img class="hover-img" src="assets/imgs/shop/product-2-2.jpg" alt="">
                                        </a>
                                    </div>
                                
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                            <i class="fi-rs-search"></i></a>
                                        <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                       
                                     <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                    
                                    </div>
                                   
                                </div>  
                              
                                <div     class="product-content-wrap mt-5">                                 
                                    <h2><a href="product-details.html">{{$medicine->medicine_name}}</a></h2>
                                    <div class="rating-result" title="90%">
                                        <span>
                                            <span>90%</span>
                                        </span>
                                    </div>
                                    <div class="product-price">
                                        <span>${{$medicine->medicine_price}}</span>
                                     
                                    </div>
                                    <div class="product-action-1 show">
                                        <a aria-label="Add To Cart" class="action-btn hover-up" href="shop-cart.php"><i class="fi-rs-shopping-bag-add"></i></a>
                                    </div>
                                </div>
                                                      
                            </div>
                        </div>                    
                        @endforeach   
                    @endforeach
                </div>
                    <!--pagination-->



  
                  
                </div>
       
            </div>
        </div>
    </section>
</main>



@endsection