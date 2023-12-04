@extends('frontend.app')
@section('title', 'Home')
@push('css')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

@endpush
@section('content')

<style>
    @media only screen and (min-width: 320px) and (max-width: 575px) {
        
        .category img {
            height: 37px !important;
        }
        
        .category p {
            min-height: 48px !important;
        }
        
        /*.slick-slide .product-item .product_thumb .product_thumb img {*/
        /*    margin: 0 auto !important;*/
        /*    width: 100% !important;*/
        /*}*/
        /*.flash_sale .slick-slide {*/
        /*    width: 246px !important;*/
        /*}*/
    }
    
    @media only screen and (max-width: 991px) {
      .first_slide {
        padding-right: 5px !important;
      }
      .second_slide {
          padding-left: 5px !important;
      }
      .mcontainer {
          margin-top: 0px !important;
      }
    }
    
    .product-item .product_thumb .primary_img img {
        margin: 0 auto;
        width: 100%;
    }
            
</style>

<div class="main-wrapper">
    <!-- Banner Section Start  -->
    <div class="mcontainer m-auto">
        <div class="row w-100 ms-0 mt-4">

            <div class="col-lg-8 col-12 mb-3">

                <div id="banner-slider" class="carousel slide h-100" data-bs-ride="true">
                    @if (!empty($slider))
                    <div class="carousel-indicators">
                        @foreach ($slider as $index => $sl)
                        <button type="button" data-bs-target="#banner-slider" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-label="Slide 1"></button>
                        @endforeach
                    </div>

                    <div class="carousel-inner h-100">
                        @foreach ($slider as $index => $sl)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }} h-100">
                            <img src="{{ asset($sl->image) }}" class="d-block w-100 h-100" alt="...">
                        </div>
                        @endforeach
                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#banner-slider" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#banner-slider" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                    @endif
                </div>

            </div>

            <div class="col-lg-4 col-md-12 col-12 mb-3">
                <div class="row">
                    <div class="col-6 col-md-6 mb-3 col-lg-12 first_slide">
                        <a href="{{$about->title_three}}"><img src="{{asset($about->video_background)}}" alt="" class="img-fluid w-100"></a>
                    </div>
                    <div class="col-6 col-md-6 col-lg-12 second_slide">
                        <a href="{{$about->title_three}}"><img src="{{asset($about->video_background)}}" alt="" class="img-fluid w-100"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End  -->
    <div class="mcontainer m-auto p-2 mt-4 mt-lg-5">
        <div class="bg-orange rounded-4 p-3">
            <div class="">
                <div class="col-12 d-flex justify-content-between flex-wrap align-items-center pt-1 px-2">
                    <div class="section_title">
                        <h4 class="semi p-1 m-0 text-light">11.11 Deals of the Day</h4>
                    </div>
                    <div id="clockdiv">
                        <div>
                            Sale End in  
                        </div>
                        
                      <div class="d-flex">
                        <div id="countdown" style="    background: red; padding: 5px; border-radius: 14px;"></div>
                      </div>
                    </div>
                </div>

            </div>
            <div class="p-0">
        <style>
            .product_slider .product-item{
                margin: 5px !important;
            }
            .product-box .product-item .product_content h4{
                height: 42px;
            }
            .old_price_only {
                text-decoration: solid !important;
            }
            
            @media only screen and (min-width: 388px) and (max-width: 420px) {
                .flash_sale .product-item .product_content .product_buttons a {
                    font-size: 8px !important;
                }
            }
            
            
        </style>
                <div class="product-box mt-4 flash_sale">
                    <div class="product_slider flash-sale">

                        @forelse($flashSell as $key => $sale)
                        <div>
                            <div class="product-item">
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('front.product.show', [ $sale->product->id ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$sale->product->thumb_image) }}" class="w-100" alt=""></a>
                                    @if($sale->product->offer_price > 0)
                                    <div class="label_product">
                                        <span class="label_sale ">
                                            {{ calculateDiscountPercent($sale->product) }} % OFF
                                        </span>
                                    </div>
                                    @endif
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="#" title="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                            <li class="compare"><a href="#" title="compare"><i class="fa-solid fa-repeat"></i></a></li>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <i class="fa-regular fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content ">
                                    <h4 class="ps-1">
                                        <a href="{{ route('front.product.show', [ $sale->product->id ] ) }}" class="name regular">{{ \Illuminate\Support\Str::limit($sale->product->name, 40)}}</a>
                                    </h4>
                                    <div class="price_box ps-1 pt-3">

                                        <!--@if(empty($sale->product->offer_price))-->
                                        <!--<span class="current_price">{{$sale->product->price}} Tk</span>-->
                                        <!--@else-->
                                        <!--<span class="old_price">{{$sale->product->price}} Tk</span>-->
                                        <!--<span class="current_price">{{$sale->product->price}} Tk</span>-->
                                        <!--@endif-->
                                        
                                        @if(!empty($sale->product->offer_price))
                                        <span class="current_price">{{$sale->product->offer_price}} ৳</span>
                                        <span class="old_price">{{$sale->product->price}} ৳</span>
                                        @else
                                        <span class="old_price_only">{{$sale->product->price}} ৳</span>
                                        @endif
                                        
                                        
                                    </div>


                                    <div class="rounded-0 d-flex justify-content-center product_buttons">
                                        @if($sale->product->type == 'variable' || $sale->product->prod_color == 'varcolor')

                                     <a href="{{ route('front.product.show', [ $sale->product->id ] ) }}"

                                        class=" btn btn-sm semi buy_now"
                                        >
                                    Buy Now
                                     </a>

                                     <a href="{{ route('front.product.show', [ $sale->product->id ] ) }}"  class="add_cart btn btn-sm semi add-to-cart">
                                        Add to cart
                                     </a>
                                     @else
                                     <a href="{{ route('front.check.single', ['product_id' => $sale->product->id]) }}"

                                        class="btn btn-sm btn-warning semi buy-now  semi buy_now"
                                        data-url="{{ route('front.cart.store') }}">
                                   Buy Now
                                     </a>
                                    
                                    @if(!in_array($sale->product->id,getCartProductArray()))
                                    
                                     <a data-id="{{ $sale->product->id }}" data-url="{{ route('front.cart.store') }}"  class=" add_cart btn btn-sm semi add-to-cart">
                                        Add to cart
                                    </a>
                                    @else
                                    
                                    <a data-id="{{ $sale->product->id }}" 
                                     style="background: darkred;color: #ffffff;"
                                     data-url="{{ route('front.cart.store') }}" 
                                     class=" add_cart btn btn-sm semi add-to-cart">
                                        Added
                                    </a>
                                    @endif
                                        
                                        
                                     @endif

                                   </div>

                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media (min-width: 1100px){
            .col-8-lg{
                flex: 0 0 auto;
                width: 12.5%;
            }
        }
    </style>
    <!-- Categories Start -->
    <section class="my-lg-5 my-3">
        <div class="mcontainer m-auto">
         <div class="text-center">
             <h3 class="text-cap"><strong>featured category</strong></h3>
             <p>Get your desired product from featured category</p>
         </div>
         <div class="container-fluid p-1">
            <div class="row feature-cat px-3 category_box">
                  
                    @forelse($feateuredCategories as $key => $item)
                      <div class="col-lg-2 col-md-2 col-sm-4 col-4 my-1 p-1 col-8-lg">
                          <div class="category text-center  p-4 rounded-3" style="padding: 1rem !important;">
                              <a href="{{ route('front.subcategory', [
                                'type'=>'subcategory',
                                'slug'=> $item->category->slug
                                ] ) }}">
                                 <img src="{{ asset('uploads/custom-images2/'.$item->category->image) }}" alt="" class="img-fluid">
                                 <p class="pt-3 text-muted font-14 bold" style="min-height: 58px;margin-bottom: 0px;">{{ $item->category->name }}</p>
                              </a>
                           </div>
                      </div>
                      @empty
                      <strong>No Categories are Available!</strong>
                      @endforelse
             </div>
        </div>


        </div>
     </section>
     
     <div class="mcontainer m-auto mt-lg-5 mt-4">
        <div class="col-12 product-header pt-1">
            <div class="section_title text-center">
                <h4 class="semi p-1 m-0">Recomended Products</h4>
            </div>
        </div>

    </div>
    <div class="mcontainer m-auto mt-lg-5 mt-4">

        <div class="product-box mt-4">
            <div class="product_slider">
               @forelse($recomended as $key => $recom)
                 <div>
                            <div class="product-item">
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('front.product.show', [ $recom->id ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$recom->thumb_image) }}" alt=""></a>
                                    @if($recom->offer_price > 0)
                                    <div class="label_product">
                                        <span class="label_sale ">
                                            {{ calculateDiscountPercent($recom) }} % OFF
                                            </span>
                                    </div>
                                    @endif
                                    <div class="action_links">
                                        <ul>
                                            <li class="wishlist"><a href="#" title="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                            <li class="compare"><a href="#" title="compare"><i class="fa-solid fa-repeat"></i></a></li>
                                            <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <i class="fa-regular fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_content ">
                                    <h4 class="ps-1">
                                        <a href="{{ route('front.product.show', [ $recom->id ] ) }}" class="name regular">{{ \Illuminate\Support\Str::limit($recom->name, 40)}}</a>
                                    </h4>
                                    <div class="price_box ps-1 pt-3">

                                        <!--@if(empty($recom->offer_price))-->
                                        <!--<span class="current_price">{{$recom->price}} ৳</span>-->
                                        <!--@else-->
                                        <!--<span class="old_price">{{$recom->price}} ৳</span>-->
                                        <!--<span class="current_price">{{$recom->price}} ৳</span>-->
                                        <!--@endif-->
                                        
                                        @if(!empty($recom->offer_price))
                                        <span class="current_price">{{$recom->offer_price}} ৳</span>
                                        <span class="old_price">{{$recom->price}} ৳</span>
                                        @else
                                        <span class="old_price_only">{{$recom->price}} ৳</span>
                                        @endif
                                        
                                        
                                    </div>


                                    <div class="rounded-0 d-flex justify-content-center product_buttons">
                                        @if($recom->type == 'variable' || $recom->prod_color == 'varcolor')

                                     <a href="{{ route('front.product.show', [ $recom->id ] ) }}"

                                        class=" btn btn-sm semi buy_now"
                                        >
                                    Buy Now
                                     </a>

                                     <a href="{{ route('front.product.show', [ $recom->id ] ) }}"  class="add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @else
                                     <a href="{{ route('front.check.single', ['product_id' => $recom->id]) }}"

                                        class="btn btn-sm btn-warning semi buy-now  semi buy_now"
                                        data-url="{{ route('front.cart.store') }}">
                                   Buy Now
                                     </a>


                                    @if(!in_array($recom->id,getCartProductArray()))

                                    <a data-id="{{ $recom->id }}" data-url="{{ route('front.cart.store') }}"  class=" add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                    </a>
                                    
                                        
                                    @else
                                    
                                    <a data-id="{{ $recom->id }}" 
                                    style="background: darkred;color: #ffffff;"
                                    data-url="{{ route('front.cart.store') }}" 
                                    class=" add_cart btn btn-sm semi add-to-cart">
                                        Added
                                    </a>
                                    
                                    @endif
                                        
                                     @endif
                                     
                                     
                                     

                                   </div>

                                </div>
                            </div>
                        </div>
                @empty
                
                @endforelse


            </div>
        </div>
    </div>
    <style>
        .feature_products .product-box{
            display: none;
        }
        .feature_products .product-box:first-child{
            display: block;
        }
    </style>
    <!-- Categories End -->
    <!-- Product Sliders Start  -->
    <div class="mcontainer m-auto">
        <div class="col-12 product-header pt-1">
            <div class="section_title text-center">
                <h4 class="semi p-1 m-0">Featured Products</h4>
                <div class="product_nav_tabs">
                    <nav class="navbar navbar-light justify-content-center">
                        <div class="d-flex justify-content-center feature_product_url">
                            <a class="nav-item nav-link active " get_link="all" href="#">all</a>
                            <a class="nav-item nav-link " get_link="new_arrival" href="#">New Arrival</a>
                            <a class="nav-item nav-link " get_link="hot_items" href="#">Hot Items</a>
                            <a class="nav-item nav-link " get_link="top_sale" href="#">Top Sale</a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </div>
    <div class="mcontainer feature_products m-auto mt-lg-5 mt-4">

        <div class="product-box mt-4 all">
            
       
            <div class="product_slider">
               @forelse($new_arrival as $n_arrival)
                <div>
                    <div class="product-item">
                        <div class="product_thumb">
                            <a class="primary_img" href="{{ route('front.product.show', [ $n_arrival->id ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$n_arrival->thumb_image) }}" alt=""></a>
                            @if($n_arrival->offer_price > 0)
                                    <div class="label_product">
                                        <span class="label_sale ">
                                            {{ calculateDiscountPercent($n_arrival) }} % OFF
                                        </span>
                                    </div>
                            @endif
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="#" title="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><i class="fa-solid fa-repeat"></i></a></li>
                                    <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <i class="fa-regular fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content ">
                            <h4 class="ps-1">
                                <a href="{{ route('front.product.show', [ $n_arrival->id ] ) }}" class="name regular">{{ \Illuminate\Support\Str::limit($n_arrival->name, 40)}}</a>
                            </h4>
                            <div class="price_box ps-1 pt-3">
                                <!-- @if(empty($n_arrival->offer_price))-->
                                <!--<span class="current_price">{{$n_arrival->offer_price}} Tk</span>-->
                                <!--@else-->
                                <!--<span class="old_price">{{$n_arrival->price}} Tk</span>-->
                                <!--<span class="current_price">{{$n_arrival->price}} Tk</span>-->
                                <!--@endif-->
                                
                                @if(!empty($n_arrival->offer_price))
                                <span class="current_price">{{$n_arrival->offer_price}} ৳</span>
                                <span class="old_price">{{$n_arrival->price}} ৳</span>
                                @else
                                <span class="old_price_only">{{$n_arrival->price}} ৳</span>
                                @endif
                                
                            </div>
                            <div class="rounded-0 d-flex justify-content-center product_buttons">
                                        @if($n_arrival->type == 'variable' || $n_arrival->prod_color == 'varcolor')

                                     <a href="{{ route('front.product.show', [ $n_arrival->id ] ) }}"

                                        class=" btn btn-sm semi buy_now"
                                        >
                                    Buy Now
                                     </a>

                                     <a href="{{ route('front.product.show', [ $n_arrival->id ] ) }}"  class="add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @else
                                     <a href="{{ route('front.check.single', ['product_id' => $n_arrival->id]) }}"

                                        class="btn btn-sm btn-warning semi buy-now  semi buy_now"
                                        data-url="{{ route('front.cart.store') }}">
                                   Buy Now
                                     </a>

                                    @if(!in_array($n_arrival->id,getCartProductArray()))

                                     <a data-id="{{ $n_arrival->id }}" data-url="{{ route('front.cart.store') }}"  class=" add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                    </a>
                                    
                                    @else
                                    <a data-id="{{ $n_arrival->id }}" 
                                    style="background: darkred;color: #ffffff;"
                                    data-url="{{ route('front.cart.store') }}" 
                                    class=" add_cart btn btn-sm semi   add-to-cart">
                                        Added
                                    </a>
                                    @endif
                                    
                                     @endif

                                   </div>
                        </div>
                    </div>
                </div>
                
                 @empty
                
                @endforelse
                
               

            </div>
        </div>
        <div class="product-box mt-4 new_arrival">
   
            <div class="product_slider">
               @forelse($new_arrival as $n_arrival)
                <div>
                    <div class="product-item">
                        <div class="product_thumb">
                            <a class="primary_img" href="{{ route('front.product.show', [ $n_arrival->id ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$n_arrival->thumb_image) }}" alt=""></a>
                            @if($n_arrival->offer_price > 0)
                                    <div class="label_product">
                                        <span class="label_sale ">
                                            {{ calculateDiscountPercent($n_arrival) }} % OFF
                                        </span>
                                    </div>
                            @endif
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="#" title="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><i class="fa-solid fa-repeat"></i></a></li>
                                    <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <i class="fa-regular fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content ">
                            <h4 class="ps-1">
                                <a href="{{ route('front.product.show', [ $n_arrival->id ] ) }}" class="name regular">{{ \Illuminate\Support\Str::limit($n_arrival->name, 40)}}</a>
                            </h4>
                            <div class="price_box ps-1 pt-3">
                                <!-- @if(empty($n_arrival->offer_price))-->
                                <!--<span class="current_price">{{$n_arrival->price}} Tk</span>-->
                                <!--@else-->
                                <!--<span class="old_price">{{$n_arrival->price}} Tk</span>-->
                                <!--<span class="current_price">{{$n_arrival->price}} Tk</span>-->
                                <!--@endif-->
                                @if(!empty($n_arrival->offer_price))
                                <span class="current_price">{{$n_arrival->offer_price}} ৳</span>
                                <span class="old_price">{{$n_arrival->price}} ৳</span>
                                @else
                                <span class="old_price_only">{{$n_arrival->price}} ৳</span>
                                @endif
                            </div>
                            <div class="rounded-0 d-flex justify-content-center product_buttons">
                                        @if($n_arrival->type == 'variable' || $n_arrival->prod_color == 'varcolor')

                                     <a href="{{ route('front.product.show', [ $n_arrival->id ] ) }}"

                                        class=" btn btn-sm semi buy_now"
                                        >
                                    Buy Now
                                     </a>

                                     <a href="{{ route('front.product.show', [ $n_arrival->id ] ) }}"  class="add_cart btn btn-sm semi add-to-cart">
                                        Add to cart
                                        </a>
                                     @else
                                     <a href="{{ route('front.check.single', ['product_id' => $n_arrival->id]) }}"

                                        class="btn btn-sm btn-warning semi buy-now  semi buy_now"
                                        data-url="{{ route('front.cart.store') }}">
                                   Buy Now
                                     </a>


                                    @if(!in_array($n_arrival->id,getCartProductArray()))


                                     <a data-id="{{ $n_arrival->id }}" data-url="{{ route('front.cart.store') }}"  class=" add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                        
                                       @else
                                       
                                       <a data-id="{{ $n_arrival->id }}" 
                                       style="background: darkred; color: #ffffff;"
                                       data-url="{{ route('front.cart.store') }}" 
                                       class=" add_cart btn btn-sm semi   add-to-cart">
                                        Added
                                        </a>
                                       @endif
                                        
                                        
                                        
                                     @endif

                                   </div>
                        </div>
                    </div>
                </div>
                
                 @empty
                
                @endforelse
                
               

            </div>
        </div>
        <div class="product-box mt-4 hot_items">
   
            <div class="product_slider">
               @forelse($hotItems as $hitem)
                <div>
                    <div class="product-item">
                        <div class="product_thumb">
                            <a class="primary_img" href="{{ route('front.product.show', [ $hitem->id ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$hitem->thumb_image) }}" alt=""></a>
                            @if($hitem->offer_price > 0)
                                    <div class="label_product">
                                        <span class="label_sale ">
                                            {{ calculateDiscountPercent($hitem) }} % OFF
                                        </span>
                                    </div>
                            @endif
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="#" title="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><i class="fa-solid fa-repeat"></i></a></li>
                                    <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <i class="fa-regular fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content ">
                            <h4 class="ps-1">
                                <a href="{{ route('front.product.show', [ $hitem->id ] ) }}" class="name regular">{{ \Illuminate\Support\Str::limit($hitem->name, 40)}}</a>
                            </h4>
                            <div class="price_box ps-1 pt-3">
                                <!-- @if(empty($hitem->offer_price))-->
                                <!--<span class="current_price">{{$hitem->price}} Tk</span>-->
                                <!--@else-->
                                <!--<span class="old_price">{{$hitem->price}} Tk</span>-->
                                <!--<span class="current_price">{{$hitem->price}} Tk</span>-->
                                <!--@endif-->
                                
                                @if(!empty($hitem->offer_price))
                                <span class="current_price">{{$hitem->offer_price}} ৳</span>
                                <span class="old_price">{{$hitem->price}} ৳</span>
                                @else
                                <span class="old_price_only">{{$hitem->price}} ৳</span>
                                @endif
                                
                            </div>
                            <div class="rounded-0 d-flex justify-content-center product_buttons">
                                        @if($hitem->type == 'variable' || $hitem->prod_color == 'varcolor')

                                     <a href="{{ route('front.product.show', [ $hitem->id ] ) }}"

                                        class=" btn btn-sm semi buy_now"
                                        >
                                    Buy Now
                                     </a>

                                     <a href="{{ route('front.product.show', [ $hitem->id ] ) }}"  class="add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @else
                                     <a href="{{ route('front.check.single', ['product_id' => $hitem->id]) }}"

                                        class="btn btn-sm btn-warning semi buy-now  semi buy_now"
                                        data-url="{{ route('front.cart.store') }}">
                                   Buy Now
                                     </a>

                                     <a data-id="{{ $hitem->id }}" data-url="{{ route('front.cart.store') }}"  class=" add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @endif

                                   </div>
                        </div>
                    </div>
                </div>
                
                 @empty
                
                @endforelse
                
               

            </div>
        </div>
        <div class="product-box mt-4 top_sale">

            <div class="product_slider">
               @forelse($topSellingProducts as $topSell)
                <div>
                    <div class="product-item">
                        <div class="product_thumb">
                            <a class="primary_img" href="{{ route('front.product.show', [ $topSell->id ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$topSell->thumb_image) }}" alt=""></a>
                            @if($topSell->offer_price > 0)
                                    <div class="label_product">
                                        <span class="label_sale ">
                                            {{ calculateDiscountPercent($topSell) }} % OFF
                                        </span>
                                    </div>
                            @endif
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="#" title="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><i class="fa-solid fa-repeat"></i></a></li>
                                    <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <i class="fa-regular fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content ">
                            <h4 class="ps-1">
                                <a href="{{ route('front.product.show', [ $topSell->id ] ) }}" class="name regular">{{ \Illuminate\Support\Str::limit($n_arrival->name, 40)}}</a>
                            </h4>
                            <div class="price_box ps-1 pt-3">
                                <!-- @if(empty($topSell->offer_price))-->
                                <!--<span class="current_price">{{$topSell->price}} Tk</span>-->
                                <!--@else-->
                                <!--<span class="old_price">{{$topSell->price}} Tk</span>-->
                                <!--<span class="current_price">{{$topSell->price}} Tk</span>-->
                                <!--@endif-->
                                
                                @if(!empty($topSell->offer_price))
                                <span class="current_price">{{$topSell->offer_price}} ৳</span>
                                <span class="old_price">{{$topSell->price}} ৳</span>
                                @else
                                <span class="old_price_only">{{$topSell->price}} ৳</span>
                                @endif
                                
                            </div>
                            <div class="rounded-0 d-flex justify-content-center product_buttons">
                                        @if($topSell->type == 'variable' || $topSell->prod_color == 'varcolor')

                                     <a href="{{ route('front.product.show', [ $topSell->id ] ) }}"

                                        class=" btn btn-sm semi buy_now"
                                        >
                                    Buy Now
                                     </a>

                                     <a href="{{ route('front.product.show', [ $topSell->id ] ) }}"  class="add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @else
                                     <a href="{{ route('front.check.single', ['product_id' => $topSell->id]) }}"

                                        class="btn btn-sm btn-warning semi buy-now  semi buy_now"
                                        data-url="{{ route('front.cart.store') }}">
                                   Buy Now
                                     </a>

                                     <a data-id="{{ $topSell->id }}" data-url="{{ route('front.cart.store') }}"  class=" add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @endif

                                   </div>
                        </div>
                    </div>
                </div>
                
                 @empty
                
                @endforelse
                
               

            </div>
        </div>
    </div>

    <div class="mcontainer m-auto mt-lg-5 mt-4">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-12 mb-3">
                <a href="{{$about->dualBannerlink1}}">
                <img src="{{$about->dualBanner1}}" alt="" class="w-100">
                </a>
            </div>
            <div class="col-lg-6 col-md-6 col-12 mb-3">
                <a href="{{$about->dualBannerlink2}}">
                <img src="{{$about->dualBanner2}}" alt="" class="w-100">
                </a>
            </div>
        </div>

    </div>
    
    <style>
        .brand_products .product-box{
            display: none;
        }
        .brand_products .product-box:first-child{
            display: block;
        }
    </style>
    
    
    <div class="mcontainer m-auto">
        <div class="col-12 product-header pt-1">
            <div class="section_title text-center">
                <h4 class="semi p-1 m-0">Top Brand Products</h4>
                <div class="product_nav_tabs">
                    <nav class="navbar navbar-light justify-content-center brand_product_url">
                        <div class="d-flex justify-content-center">
                            
                            @forelse($brands as $key => $brand)
                            <a id="brand_data" class="nav-item nav-link" href="" get_link="{{$brand->id}}">{{$brand->name}}</a>
                            @empty
                            
                            @endforelse
                            
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </div>
    <div class="mcontainer brand_products m-auto mt-lg-5 mt-4">
        
        <div class="product-box mt-4 ">
            <div class="product_slider">
               @forelse($all_brand_product as $allbrand)
                <div>
                    
                    <div class="product-item {{$allbrand->brand_id}}">
                        <div class="product_thumb ">
                            <a class="primary_img" href="{{ route('front.product.show', [ $allbrand->id ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$allbrand->thumb_image) }}" alt=""></a>
                            @if($allbrand->offer_price > 0)
                                    <div class="label_product">
                                        <span class="label_sale ">
                                            {{ calculateDiscountPercent($allbrand) }} % OFF
                                        </span>
                                    </div>
                            @endif
                            <div class="action_links">
                                <ul>
                                    <li class="wishlist"><a href="#" title="Add to Wishlist"><i class="fa-regular fa-heart"></i></a></li>
                                    <li class="compare"><a href="#" title="compare"><i class="fa-solid fa-repeat"></i></a></li>
                                    <li class="quick_button"><a href="#" data-bs-toggle="modal" data-bs-target="#modal_box" title="quick view"> <i class="fa-regular fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product_content ">
                            <h4 class="ps-1">
                                <a href="{{ route('front.product.show', [ $allbrand->id ] ) }}"  class="name regular" >{{ \Illuminate\Support\Str::limit($n_arrival->name, 40)}}</a>
                            </h4>
                            <div class="price_box ps-1 pt-3">
                                <!-- @if(empty($allbrand->offer_price))-->
                                <!--<span class="current_price">{{$allbrand->price}} ৳</span>-->
                                <!--@else-->
                                <!--<span class="old_price">{{$allbrand->price}} ৳</span>-->
                                <!--<span class="current_price">{{$allbrand->price}} ৳</span>-->
                                <!--@endif-->
                                
                                @if(!empty($allbrand->offer_price))
                                <span class="current_price">{{$allbrand->offer_price}} ৳</span>
                                <span class="old_price">{{$allbrand->price}} ৳</span>
                                @else
                                <span class="old_price_only">{{$allbrand->price}} ৳</span>
                                @endif
                                
                            </div>
                            <div class="rounded-0 d-flex justify-content-center product_buttons">
                                        @if($allbrand->type == 'variable' || $allbrand->prod_color == 'varcolor')

                                     <a href="{{ route('front.product.show', [ $allbrand->id ] ) }}"

                                        class=" btn btn-sm semi buy_now"
                                        >
                                    Buy Now
                                     </a>

                                     <a href="{{ route('front.product.show', [ $allbrand->id ] ) }}"  class="add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @else
                                     <a href="{{ route('front.check.single', ['product_id' => $allbrand->id]) }}"

                                        class="btn btn-sm btn-warning semi buy-now  semi buy_now"
                                        data-url="{{ route('front.cart.store') }}">
                                   Buy Now
                                     </a>

                                     <a data-id="{{ $allbrand->id }}" data-url="{{ route('front.cart.store') }}"  class=" add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @endif

                                   </div>
                        </div>
                    </div>
                    
                </div>
                @empty
                
                @endforelse
                
                
               

            </div>
            
        </div>
         
    </div>
    
    
    <div class="mcontainer m-auto mt-lg-5 mt-4">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-12 mb-3">
                <a href="{{$about->trippleBannerlink1}}">
                <img src="{{$about->trippleBanner1}}" alt="" class="w-100">
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-6 mb-3">
                <a href="{{$about->trippleBannerlink2}}">
                <img src="{{$about->trippleBanner2}}" alt="" class="w-100">
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-6 mb-3">
                <a href="{{$about->trippleBannerlink3}}">
                <img src="{{$about->trippleBanner3}}" alt="" class="w-100">
                </a>
            </div>
        </div>

    </div>
    
    
    <!-- Product Sliders End  -->
    <section class="brands mt-lg-5 mt-3 mb-5">
        <div class="container">
            <div class="col-12 product-header pt-1">
                <div class="section_title text-center">
                    <h4 class="semi p-1 m-0">Shop By Brand</h4>
                </div>
            </div>
            <div class="shadow mt-3">
                <div class="brand-slider">
                    @forelse($all_brands as $key => $brand)
                    <div class="single_brand ">
                        <a href="{{ url('/brand-product/' . $brand->slug) }}"><img src="{{asset($brand->logo)}}" alt="" class="img-fluid"></a>
                    </div>

                    @empty
                    <div align="center">
                        <strong class="text-center text-danger">No Brands are available</strong>
                    </div>
                    @endforelse


                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="mcontainer">
            <div class="row">
                <div class="col-lg-12 free-content">
                    <div>
                        <p>{!!$about->about_us!!}</p>
                    </div>

                </div>
            </div>
        </div>
    </section>
</div>

@endsection

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
$(document).ready(function () {
    $('.buy-now').on('click', function (e) {
        e.preventDefault();

        var productId = $(this).attr('href').split('/').pop();
        var proQty = 1;
        var addToCartUrl = $(this).data('url');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Include CSRF token in AJAX request headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        // Perform AJAX request to add the product to the cart
        $.post(addToCartUrl, { id: productId, quantity: proQty }, function (response) {
            // toastr.success(response.msg);
            if(response.status)
            {
                // Redirect to checkout page after adding to cart
                window.location.href = "{{ route('front.checkout.index') }}";
            } else
            {

            }

        });
    });
});
</script>

<script>
 $(function () {
   // Add CSS to initially hide the .offerBox
        function setCookie(name, value, minutes) {
            var expires = "";
            if (minutes) {
                var date = new Date();
                date.setTime(date.getTime() + (minutes * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1, c.length);
                }
                if (c.indexOf(nameEQ) == 0) {
                    return c.substring(nameEQ.length, c.length);
                }
            }
            return null;
        }

        $(".modal-overlay").click(function(){
            $('.offerBox').hide();
            setCookie('offerBoxHidden', 'true', 5);
        })

        $(".offerBox .content .close").click(function(){
            $('.offerBox').hide();
            setCookie('offerBoxHidden', 'true', 5);
        })

        // Check if the offerBox should be hidden based on the cookie
        var offerBoxHidden = getCookie('offerBoxHidden');

        if (offerBoxHidden === 'true') {
            $('.offerBox').hide();
        }

        $(document).on('click', '.add-to-cart', function (e) {
            
        let id = $(this).data('id');
        let url = $(this).data('url');
        let addButton = $(this); // Reference to the clicked button
    
        addToCart(url, id, "", "", 1, addButton);
        
    });

    // ... other click event handlers ...

    function addToCart(url, id, variation = "", type = "", quantity = 1, addButton) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "POST",
            url: url,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: { id, quantity, variation },
            success: function (res) {
                if (res.status) {
                    if (type) {
                        if (res.url != '') {
                            toastr.success(res.msg);
                            document.location.href = res.url;
                        } else {
                            // Handle specific case
                        }
                    } else {
                        
                        toastr.success(res.msg);
                        $('span.cart_items').text(res.cart_items);
                        addButton.text('Added'); // Update only the clicked button
                        // window.location.reload();
                    }
                } else {
                    toastr.error(res.msg);
                }
            },
            error: function (xhr, status, error) {
                toastr.error('An error occurred while processing your request.');
            }
        });
    }

    // ... other functions ...

});

</script>

<script>
    $(document).ready(function() {
    $('.select2').select2({
    closeOnSelect: true
});
});
</script>

<!-- Place this JavaScript code after your HTML content -->
<script>
$(document).ready(function () {
    $('.buy-now').on('click', function (e) {
        e.preventDefault();

        var productId = $(this).attr('href').split('/').pop();
        var proQty = 1;
        var addToCartUrl = $(this).data('url');
        var checkoutUrl = "{{ route('front.cart.index') }}";
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        // Include CSRF token in AJAX request headers
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        });

        // Perform AJAX request to add the product to the cart
        $.post(addToCartUrl, { id: productId, quantity: proQty }, function (response) {
            toastr.success(response.msg);
            if(response.status)
            {
                // Redirect to checkout page after adding to cart
                window.location.href = "{{ route('front.checkout.index') }}";
            } else
            {

            }

        });
    });
});
</script>


<script>

    $(document).ready(function(){


});

    document.addEventListener("DOMContentLoaded", function () {
        var popUpForm = document.getElementById("popUpForm");

        var shouldShowPopup = localStorage.getItem("showPopup");
        var lastCloseTime = localStorage.getItem("lastCloseTime");

        if (!shouldShowPopup || (shouldShowPopup && lastCloseTime && Date.now() - lastCloseTime >= 5 * 60 * 1000)) {
            popUpForm.style.display = "block";
        }
        // setTimeout(function () {
        //         popUpForm.style.display = "none";
        //     }, 10000);
        document.querySelector('.popupGrid').addEventListener('click', function(event) {
            if (event.target.classList.contains('popupGrid')) {
                popUpForm.style.display = "none";
                localStorage.setItem("showPopup", false);
                localStorage.setItem("lastCloseTime", Date.now());
            }
        });
        document.getElementById("close").addEventListener("click", function () {
            popUpForm.style.display = "none";
            localStorage.setItem("showPopup", false);
            localStorage.setItem("lastCloseTime", Date.now());
        });
    });

</script>


<script>
    // Set the end time from the backend
    var endTime = new Date("{{ $endTime }}").getTime();

    // Update the countdown every 1 second
    var x = setInterval(function() {
        // Get the current time
        var now = new Date().getTime();

        // Calculate the remaining time
        var distance = endTime - now;

        // Calculate days, hours, minutes, and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the countdown in the "countdown" div
        document.getElementById("countdown").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds + "s ";

        // If the countdown is over, display a message
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "Sale has ended!";
        }
    }, 1000);
</script>


@endpush

