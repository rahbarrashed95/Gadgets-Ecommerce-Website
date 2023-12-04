@extends('frontend.app')
@section('title', 'Shop Product List')
@push('css')

<style>

.product-box .product-item .product_thumb .primary_img img {
    width: 100%;
}

@media only screen and (max-width: 767px)  {
    #myTabs li a {
        padding: 6px 12px !important;
    }
}

.thumbnail-container::-webkit-scrollbar {
  width: 10px;
  height: 5px;
}

/* Track */
.thumbnail-container::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
.thumbnail-container::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
.thumbnail-container::-webkit-scrollbar-thumb:hover {
  background: #555;
}
.slider-image {
    width: 100%;
    height: auto;
    display: block;
   }
   /* Styles for the mini image thumbnails */
   .thumbnail-container {
       max-width: 100%;
        overflow-x: auto;
        display: flex;
   }
   .thumbnail-container > div{
       height: 80px;
       width: 60px;
       min-width: 60px;
       margin: 10px;
   }
   .thumbnail {
   width: 100%;
   height: auto;
   margin: 5px;
   cursor: pointer;
   }
   
 .testslide-image {
       margin-left: 10px;
       margin-top: 10px;
   }

   .img-thumbnail:hover {
       box-shadow: 0px 0px 10px -4px green !important;
   }
   .img-thumbnail {
       box-shadow: 0px 0px 10px -4px gray !important;
   }
   .testslide-image img {
       box-shadow: 3px 4px 13px -3px gray !important;
   }
   .testslide-image img:hover {
       box-shadow: 0px 2px 13px -3px green !important;
   }

.img-thumbnail.active{
    border: 2px solid orange;
}
   .accordion-body .btn-info {
       background: #1F8C40 !important;
   }

    .sizes{
                     display: flex;
                     }
                     .sizes .size {
                     padding: 5px;
                     margin: 5px;
                     border: 1px solid #FE9017;
                     width: auto;
                     text-align: center;
                     cursor: pointer;
                     min-width: 45px;
                     }
                     .sizes .size.active{
                     background: #1F8B40;
                     color: white;
                     font-weight: bold;
                     }
                     
                     
                      .sims{
                     display: flex;
                     }
                     .sims .sim {
                     padding: 5px;
                     margin: 5px;
                     border: 1px solid #FE9017;
                     width: auto;
                     text-align: center;
                     cursor: pointer;
                     min-width: 45px;
                     }
                     .sims .sim.active{
                     background: #1F8B40;
                     color: white;
                     font-weight: bold;
                     }
                     
                     
                     
                      .regions{
                     display: flex;
                     }
                     .regions .region {
                     padding: 5px;
                     margin: 5px;
                     border: 1px solid #FE9017;
                     width: auto;
                     text-align: center;
                     cursor: pointer;
                     min-width: 45px;
                     }
                     .regions .region.active{
                     background: #1F8B40;
                     color: white;
                     font-weight: bold;
                     }
                     
                     
                     
                     
                     .colors{
                     display: flex;
                     }
                     .colors .color {
                         padding: 5px;
                        margin: 8px;
                        border: 4px solid white;
                        outline: 1px solid #b3b3b3;
                        width: 35px;
                        height: 35px;
                        text-align: center;
                        cursor: pointer;
                     }
                     .colors .color.active{
                     background: #0d6efd;
                     box-shadow: 0 0 7px 2px #f17e23;
                     color: white;
                     font-weight: bold;
                     }

</style>
@endpush
@section('content')
<div class="main-wrapper">
        <div class="overlay-sidebar"></div>
        <div class="product-page mcontainer p-0 m-auto mt-2 mb-2">
            <div class="d-lg-flex justify-content-between align-items-center p-3 pb-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb align-items-center">
                        <li class="breadcrumb-item"><a href="#" class="text-dark font-12"><i class="fas fa-house-chimney"></i></a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-dark font-12">Sub</a></li>
                        <li class="breadcrumb-item active font-12">Active</li>
                    </ol>
                </nav>
                <div class="d-flex">
                    <div class="share d-flex align-items-center">
                        <span class="bold font-12">Share: </span>

                        
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{route('front.product.show', $product->id)}}&display=popup" class="text-dark p-1 font-12"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-dark p-1 font-12"><i class="fab fa-pinterest"></i></a>
                    </div>
                    <div class="btns">
                        <button class="btn bold text-start font-12">
                            <i class="far fa-bookmark"></i>
                            Save
                        </button>
                        <a href="{{ route('front.add-compare',['product_id' => $product->id]) }}" data-proid="{{ $product->id }}" class="btn bold text-start font-12 add-to-compare">
                            <i class="far fa-square-plus"></i>
                            Add To Compare
                        </a>
                    </div>
                </div>
            </div>
            <div class="row p-lg-3">
                <div class="col-lg-4 col-md-5 col-12">
               <div class="slider-container">
               <!-- Big Image -->
              <div class="">
                <div class="testslide-image">
                 <a href="{{asset('uploads/custom-images/'.$product->thumb_image)}}" class="popup-link">
                  <img class="slider-image img-thumbnail" id="big-image" src="{{asset('uploads/custom-images/'.$product->thumb_image)}}" alt="Image 1">
                 </a>
               </div>
			   </div>
              @foreach($product->gallery as $key => $img_gals)
                            <div class="">
                                <a href="{{ asset($img_gals->image) }}" class="popup-link">
                                    <img src="{{ asset('uploads/custom-images/'.$img_gals->image) }}" alt="" class="img-fluid" style="display:none">
                               </a>
                            </div>
               @endforeach


               @foreach($product->colorVariations as $v)

              	<div class="">
                                <a href="{{ asset($v->var_images) }}" class="popup-link">
                                    <img src="{{ asset($v->var_images) }}" alt="" class="img-fluid" style="display:none" />
                               </a>
                            </div>
                  @endforeach
               <!-- Mini Image Thumbnails -->
               <div class="thumbnail-container mt-3 text-center">
                  <div>
                      <img class="thumbnail img-thumbnail" src="{{asset('uploads/custom-images/'.$product->thumb_image)}}" alt="" class="img-fluid" change_image="{{asset('uploads/custom-images/'.$product->thumb_image)}}">
                  </div>
                  @forelse($product->gallery as $key => $img_gals)
                  <div>
                      <img class="thumbnail img-thumbnail" src="{{ asset($img_gals->image) }}" change_image="{{ asset($img_gals->image) }}">

                  </div>

                  @empty
                  @endforelse
                  
                  @forelse($product->gallery as $key => $img_gals)
                  <div>
                      <img class="thumbnail img-thumbnail" src="{{ asset($img_gals->image) }}" change_image="{{ asset($img_gals->image) }}">

                  </div>

                  @empty
                  @endforelse
                  
                  
               </div>
            </div>
                </div>
                <div class="col-lg-7 col-md-7 col-12">
                    <div class="bg-white p-2 ps-3">
                        <div class="product-content">
                            @if(!empty($product->brand->logo))
                            <div class="mb-4 ps-2 semi font-12"> <img src="{{asset($product->brand->logo)}}" width="20px" height="20px" /> {{$product->brand->name}}</div>
                            @endif
                            <h4 class="product-title ps-2 ">{{ $product->name }}</h4>
                            <div class="badge-box">
                                @if(!empty($product->offer_price))
                                <div class="badge">
                                    <button class="btn btn-sm btn-light bg-muted  rounded-3" >
                                        
                                        Cash Discount Price: <del class="text-muted px-2">{{$product->offer_price}}</del> <span class="semi px-2">{{$product->price}}</span>
                                    </button>
                                </div>
                                @else
                                <div class="badge">
                                    <button class="btn btn-sm btn-light bg-muted  rounded-3" >
                                        
                                        Cash Discount Price: <del class="text-muted px-2">{{$product->offer_price}}</del> <span class="semi px-2">{{$product->price}}</span>
                                    </button>
                                </div>
                                @endif
                                <div class="badge">
                                    <button class="btn btn-sm btn-light bg-muted  rounded-3" >
                                            Status: <span class="semi px-2">In Stock</span>
                                    </button>
                                </div>
                                @if(!empty($product->sku))
                                <div class="badge">
                                    <button class="btn btn-sm btn-light bg-muted  rounded-3" >
                                        Product Code: <span class="semi px-2">{{$product->sku}}</span>
                                    </button>
                                </div>
                                @endif
                                <!--<div class="badge">-->
                                <!--    <button class="btn btn-sm btn-light bg-muted  rounded-3" >-->
                                <!--       <b class="fa fa-coins"></b> Earn : <span class="semi px-2">700</span>-->
                                <!--    </button>-->
                                <!--</div>-->
                            </div>
                            
                            @php
                                use App\Models\FooterSocialLink;
                                $whats_link = FooterSocialLink::where('id', 5)->first();
                            @endphp
                            
                            
                            <div class="whatsapp_gradient mt-3 mb-4">
                                <a href="{{ $whats_link->link }}" class="text-light">
                                    <div class="d-flex align-items-center">
                                        <div class="logo px-2"><h3 class="m-0 fab fa-whatsapp"></h3></div>
                                        <div class="content"><div class="font-13">Message</div>
                                        <div class="font-12">On Whatsapp</div>
                                    </div>
                                    </div>
                                </a>
                            </div>
                            
                
                 @if(!empty($product->offer_price))
                  <div class="payment-options">

                        <div class="left-box bg-muted" style="background:#0d6efd; height: 100%; width: 14%;">
                        </div>
                        <div class="right-box">

                          <div class="product-price-variant">
                        <span class="price current-price-product" style="font-size: 25px; font-weight: bolder">
                          {{$product->offer_price}} ৳
                        </span>
                        @if($product->offer_price > 0 && $product->price >0)
                        <del><span id="product-old-price" class="price old-price" style="font-size:14px;margin-left:10px">
                        </span>{{$product->price}}</del> ৳ ({{$product->price - $product->offer_price}} ৳  discount)
                        @endif
                     	</div>



                           <!--<h5 class="medium font-16">{{$product->price - $product->offer_price}} tk Discount On online order</h5>-->
                           <!--<h5 class="medium font-16">Online / Cash Payment</h5>-->
                        </div>

                  </div>
                  @else
                  <h5 class="semi" style="margin-left:1%; padding:0px">Price : {{$product->price}} ৳</h5>
                  @endif

                  @if($product->qty == '0')
                  <span style="color: red;font-weight: bold;">Out Of Stock</span>
                  @else
                  @endif

                  <input type="hidden" name="product_id" value="{{ $product->id}}">
                  @if($product->offer_price != '0')
                  <input type="hidden" name="price" id="price_val" value="{{ $product->offer_price }}">
                  @else
                  <input type="hidden" name="price" id="price_val" value="{{ $product->price }}">
                  @endif
                  
                  
                            
                            
                @if($product->type == 'variable') <h6 id="select_size">Select Storage : </h6> @else @endif
               @if($product->type == 'variable')

               @if(count($product->variations))

               <div class="sizes" id="sizes" style="margin-bottom: 5px;">
                  @foreach($product->variations as $v)
                  @if(!empty($v->size->title))
                  <div class="size" data-proid="{{ $v->product_id }}" data-varprice="{{ $v->sell_price }}" data-varsize="{{ $v->size->title }}"
                     value="{{$v->id}}">
                     @if($v->size->title == 'free')
                     @else
                     {{ $v->size->title }}
                     <input type="hidden" id="size_value" name="variation_id">
                     <input type="hidden" id="size_variation_id" name="size_variation_id">
                     <input type="hidden" name="pro_price" id="pro_price">
                     @endif
                  </div>
                  @else
                  
                  @endif
                  @endforeach
               </div>
               @else
               <input type="text" id="size_value" name="variation_id" value="free">
               @endif

               @endif

              @if($product->prod_color == 'varcolor') <h6 id="select_color">Select Color : </h6> @else @endif
               @if($product->prod_color == 'varcolor')
               <div class="colors" id="colors">
                  @foreach($product->colorVariations as $v)
                  @if(!empty($v->color->code))
                  <div class="color" style="background: {{$v->color->code}}" data-proid="{{ $v->product_id }}" data-colorid="{{ $v->color_id }}" data-varcolor="{{ $v->color->name}}"
                     value="{{$v->id}}">
                     <input type="hidden" id="color_val" name="color_id" >
                     <!--<img src="{{ asset($v->var_images) }}" width="50px" height="50px" />-->
                     <input type="hidden" id="color_value" name="variationColor_id">
                  </div>
                  @else
                  Color Not Available
                  @endif
                  @endforeach
               </div>
                @else
                <input type="hidden" id="color_value" name="variationColor_id" value="default">
               @endif
                            
                            
                            
                            <!--<div class="color_box my-4 my-lg-4">-->
                            <!--    <span>Color : </span>-->
                            <!--    <div class="colors">-->
                            <!--        <div class="color" style="background: blue;"></div>-->
                            <!--        <div class="color" style="background: green;"></div>-->
                            <!--        <div class="color" style="background: yellow;"></div>-->
                            <!--        <div class="color" style="background: red;"></div>-->
                            <!--    </div>-->
                            <!--</div>-->
                            
                           
                            <div class="d-flex align-items-center wrap">
                                
                                
                                @if($product->type == 'variable') <h6 id="select_sim">Select Sim : </h6>@endif
                                <div class="sims" id="sims" style="margin-bottom: 5px;">
                                @foreach($var_sim as $v)
                                <div class="sim" data-proid="{{ $v->product_id }}"  data-varsim="{{ $v->name }}"  value="{{$v->id}}">
                                {{$v->name}}
                                <input type="hidden" id="sim_value" name="sim_variation">
                                 <input type="hidden" id="sim_variation_id" name="sim_variation_id">
                                 <!--<input type="text" name="pro_price" id="pro_price">-->
                                </div>
                                 @endforeach
                                 </div>
                            </div>
                           
                            
                            
                            <!--<div class="d-flex align-items-center wrap mt-lg-4 mt-4">-->
                            <!--    <span>Storage : </span>-->
                            <!--    @foreach($var_storage as $vr_str)-->
                            <!--    <button class="btn btn-sm btn-light ms-5">{{$vr_str->name}}</button>-->
                            <!--    @endforeach-->
                                
                            <!--</div>-->
                           
                           <!--<div class="d-flex align-items-center wrap mt-lg-4 mt-4">-->
                           <!--     <span>Region : </span>-->
                           <!--     @foreach($var_region as $vr_rg)-->
                           <!--     <button class="btn btn-sm btn-light ms-5">{{$vr_rg->name}}</button>-->
                           <!--     @endforeach-->
                                
                           <!-- </div>-->
                            
                            
                            <div class="d-flex align-items-center wrap">
                                
                                @if($product->type == 'variable') <span id="select_region">Region : </span>@endif
                                <div class="regions" id="regions" style="margin-bottom: 5px;">
                                 @foreach($var_region as $vr_rg)
                                <div class="region" data-proid="{{ $vr_rg->product_id }}"  data-varregion="{{ $vr_rg->name }}"  value="{{$vr_rg->id}}">
                                {{$vr_rg->name}}
                                <input type="hidden" id="region_value" name="region_variation_id">
                                 <input type="hidden" id="region_variation_id" name="region_variation_id">
                                 <!--<input type="text" name="pro_price" id="pro_price">-->
                                </div>
                                 @endforeach
                                 </div>
                            </div>
                           
                            <div class="payment-options">
                                <div class="qty-btn-box mt-3">
                                    
                                     <div class="qty-box mb-2" >
                                        <button class="btn btn-light border rounded-0 bold font-16 border-warning decrease-qty">-</button>
                                        <input type="number" id="quantity" min="1" value="1" class="form-control font-16 rounded-0 shadow-none qty">
                                        <button class="btn btn-light border rounded-0 bold font-16 border-warning increase-qty">+</button>
                                     </div>
                                    <div class="text-center ms-lg-3 mb-2">
                                        @if($product->qty == '0')
                     <a href="{{ route('front.check.single', ['product_id' => $product->id]) }}"
                       
                        class="btn bold font-16 px-3 checkout-btn buy-now text-light"
                        style="border:1px solid #f17e23; background-color: #f17e23; "
                        data-url="{{ route('front.cart.store') }}" >
                     Buy Now 
                     </a>
                     @else
                     <a href="{{ route('front.check.single', ['product_id' => $product->id]) }}"
                       
                        class="btn bold font-15 px-3 checkout-btn buy-now text-light"
                        style="border:1px solid #f17e23; background-color: #f17e23; "
                        data-url="{{ route('front.cart.store') }}" >
                    Buy Now 
                     </a>
                     @endif
                      @if($product->qty == '0')
                     <a data-id="{{ $product->id }}"
                     
                     data-url="{{ route('front.cart.store') }}" class="btn bold font-16 px-3  add-to-cart px-3  add_cart " style="border:1px solid #f17e23;">
                     ADD To Cart
                     </a>
                     @else
                     <a data-id="{{ $product->id }}"
                     
                     data-url="{{ route('front.cart.store') }}" class="btn bold font-15 px-3  add-to-cart px-3  add_cart "  style="border:1px solid #f17e23;">
                     ADD To Cart
                     </a>
                     @endif
                     
                  </div>
                                </div>
                            </div>
                            
                            
                     
                            
                            
                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="mcontainer m-auto mt-lg-5 mt-4">
                <div class="col-12 product-header pt-1">
                    <div class="section_title text-center">
                        <h4 class="semi p-1 m-0">Related Products</h4>
                    </div>
                </div>
                
            </div>
            <div class=" m-auto mt-lg-5 mt-4">
                
                <div class="product-box mt-4">
                    <div class="product_slider">
                        
                        @forelse($relatedProducts as $key => $item)
                        <div class="p-1">
                            <div class="product-item">
                                <div class="product_thumb">
                                    <a class="primary_img" href="{{ route('front.product.show', [ $item->id ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$item->thumb_image) }}" alt=""></a>
                                   
                                    
                                     @if($item->offer_price > 0)
                                    <div class="label_product">
                                        <span class="label_sale ">{{ BanglaText('offer') }}</span>
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
                                        <a href="{{ route('front.product.show', [ $item->id ] ) }}" class="name regular">{{ \Illuminate\Support\Str::limit($item->name, 40)}}</a>
                                        
                                    </h4>
                                    <div class="price_box ps-1 pt-3">

                                        @if(empty($item->offer_price))
                                        <span class="current_price">{{$item->price}} ৳</span>
                                        @else
                                        <span class="old_price">{{$item->price}} ৳</span>
                                        <span class="current_price">{{$item->price}} ৳</span>
                                        @endif
                                    </div>
                                    <div class="rounded-0 d-flex justify-content-center product_buttons">
                                        @if($item->type == 'variable' || $item->prod_color == 'varcolor')

                                     <a href="{{ route('front.product.show', [ $item->id ] ) }}"

                                        class=" btn btn-sm semi buy_now"
                                        >
                                    Buy Now
                                     </a>

                                     <a href="{{ route('front.product.show', [ $item->id ] ) }}"  class="add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @else
                                     <a href="{{ route('front.check.single', ['product_id' => $item->id]) }}"

                                        class="btn btn-sm btn-warning semi buy-now  semi buy_now"
                                        data-url="{{ route('front.cart.store') }}">
                                   Buy Now
                                     </a>

                                     <a data-id="{{ $item->id }}" data-url="{{ route('front.cart.store') }}"  class=" add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @endif

                                   </div>
                                </div>
                            </div>
                        </div>
                          @empty
                     <div>
                        <strong class="text-center text-danger">
                        No Related Products
                        </strong>
                     </div>
                     @endforelse
                                    
                        
                        
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-12">
                <div class="container">
                    <ul class="nav border-bottom" id="myTabs">
                        <li class="">
                        <a class="btn btn-light bg-white bold active" id="tab2-tab" data-bs-toggle="tab" href="#tab2">Description</a>
                      </li>
                      <li class="">
                        <a class="btn btn-light bg-white bold" id="tab1-tab" data-bs-toggle="tab" href="#tab1">Specification</a>
                      </li>
                      
                      <li class="">
                        <a class="btn btn-light bg-white bold " id="tab3-tab" data-bs-toggle="tab" href="#tab4">Review</a>
                      </li>
                      <li class="">
                        <a class="btn btn-light bg-white bold " id="tab3-tab" data-bs-toggle="tab" href="#vedio">Video</a>
                      </li>
                    </ul>

                    <div class="tab-content bg-white p-lg-4 p-3" id="myTabsContent">
                        <div class="tab-pane show active" id="tab2">
                        <h4 class="semi">Descriptions</h4>
                        <p class="font-15 semi">
                            {!!$product->long_description!!}
                        </p>
                     </div>
                      
                      <div class="tab-pane show" id="tab1">
                        <h4 class="semi"></h4>
                        <div class="bg-sky">
                        <strong style="">Specification</strong>
                        </div>
                        
                         <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Key</th>
                              <th scope="col">Specification</th>
                              
                            </tr>
                          </thead>
                          <tbody>
                             @forelse($Specification as $key => $item)  
                            <tr>
                              
                              <td class="w-40">{{$item->key}}</td>
                              <td class="w-60">{{$item->specification}}</td>
                            </tr>
                            @empty
                                <tr>
                              
                              
                              <td class="w-100">No Data</td>
                            </tr>
                        @endforelse
                          </tbody>
                        </table>	   
                        
                        
                      </div>
                      
                      <div class="tab-pane fade" id="tab3">
                        <p>Content for Tab 3</p>
                      </div>
                      <div class="tab-pane fade" id="tab4">
                        @auth
                            <form action="{{ route('front.product.product-reviews.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="form-group">
                                    <label for="rating">Rating:</label>
                                    <select name="rating" id="rating" class="form-control">
                                        <option value="1">1 Star</option>
                                        <option value="2">2 Star</option>
                                        <option value="3">3 Star</option>
                                        <option value="4">4 Star</option>
                                        <option value="5">5 Star</option>
                                        <!-- Add more options for ratings -->
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="review">Review:</label>
                                    <textarea name="review" id="review" rows="4" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary" style="margin-top: 15px;">Submit Review</button>
                            </form>
                            @else
                            <p>Please <a href="{{url('login-user')}}" class="btn btn-warning">login</a> to submit a review.</p>
                            @endauth
                            
                          <style>
                                 .fa-solid{
                                     color: #F2C94C;
                                 }
                                 p.rev {
                                     font-size: 17px;
                                 }
                                 p.rev_user {
                                     font-size: 25px;
                                 }
                                 
                                 
                             </style>  
                            
                            
                        @forelse($reviews as $key=>$rev)
                        <br/>
                        <div class="container card">
                            
                         <div class="row">
                             <div class="col-md-6">
                                 <p class="rev_user" style="font-weight:bold;">    
                        <img src="https://media.istockphoto.com/id/1300845620/vector/user-icon-flat-isolated-on-white-background-user-symbol-vector-illustration.jpg?s=612x612&w=0&k=20&c=yBeyba0hUkh14_jgv1OKqIH0CCSWU_4ckRkAoy2p73o=" alt="Avater" width="70px" height="70px"/>
                         {{$rev->user->name}}</p>
                             </div>
                             
                             <div class="col-md-6" style="text-align: right;">
                                 <p style="margin-left:8%;font-weight:bolder;margin-top: 15px;">
                            @if($rev->rating == 1)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            @elseif($rev->rating == 2)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            @elseif($rev->rating == 3)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            @elseif($rev->rating == 4)
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            @else
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            @endif
                            ({{$rev->rating}}/5)</p>
                             </div>
                         </div>   
                         
                        <p class="rev" style="margin-left: 8%;margin-top: -2%;font-weight: bold;"> {{$rev->review}}</p>
                        
                        </div>
                        @empty
                        <p> here are no questions asked yet. Be the first one to ask a question. </p>
                        @endforelse
                      </div>
                      <div class="tab-pane show" id="vedio">
                        <h4 class="semi">Video</h4>
                        <p class="font-15 semi">
                            <div class="bg-sky">
                            <strong>{{ $product->video_title }}</strong>
                            
                            <div> 
                            {!!$product->video_link!!}
                            </div>
                            </div>
                        </p>
                     </div>
                    </div>
                    
                  </div>
            </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="bg-white p-3 related">
                        <h5 class="bold text-center primary">Recently Viewed</h5>
                        <hr class="border" style="border-color: #b1b1b1 !important; margin-top: 24px;">
                         @foreach($recentlyViewed as $productId)
                            @php
                                $product = \App\Models\Product::find($productId);
                            @endphp
                            <a href="{{ route('front.product.show', [ $product->id ] ) }}">
                            <div class="product">
                                <img src="{{ asset('uploads/custom-images2/'.$product->thumb_image) }}" alt="" width="60">
                                <div class="content">
                                    <p class="bold font-14 m-0 text-dark">{{ $product->name }}</p>
                                    <span class="primary font-13 bold">{{ $product->price }}৳</span>
                                    <div class="col-12">
                                        <button class="btn border-none btn-sm text-light primary-bg btn-outline-danger bold font-15">
                                            <span class="ms-0"> Buy Now</span>
                                        </button>
                                        <button class="btn border-none text-muted bold font-15">
                                            <i class="far fa-square-plus"></i><span class="ms-0"> Add To Comparessssss</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            </a>
                            <hr class="border border-muted">
                        @endforeach

                        <hr class="border border-muted">
                        
                        <hr class="border border-muted">
                    </div>
                </div>
            </div>
        </div>
        
    </div>
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="
   https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js
   "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
   
<script>
   $(document).ready(function () {
       
       $(document).on('click', 'a.add-to-compare', function(e){
           e.preventDefault();
           let url = $(this).attr('href');
           $.ajax({
               url: url,
               method: 'GET',
               success: function(res) {
                   if(res.status){
                       alert(res.msg);
                   } else {
                       alert(res.msg);
                   }
               } 
           });
       });
       
       $('.buy-now').on('click', function (e) {
           e.preventDefault();

           let variation_id = $('#size_variation_id').val();
           let variation_size = $('#size_value').val();
           let variation_color = $('#color_value').val();
           let variation_sim = $('#sim_value').val();
          
          let variation_region = $('#region_value').val();
          
           let variation_price = $('#pro_price').val();
           var productId = $(this).attr('href').split('/').pop();
           var proQty = $('#quantity').val();
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
           $.post(addToCartUrl,
           {
               id              : productId,
               quantity        : proQty,
               variation_id    : variation_id,
               varSize         : variation_size,
               varColor        : variation_color,
               variation_sim   : variation_sim,
               variation_region :variation_region,
               variation_price : variation_price
           },

           function (response) {

               if(response.status)
               {
                   toastr.success(response.msg);
                   // Redirect to checkout page after adding to cart
                   window.location.href = "{{ route('front.checkout.index') }}";
               } else {
            // Check if the response contains validation errors
            if (response.errors) {
                for (var field in response.errors) {
                    if (response.errors.hasOwnProperty(field)) {
                        for (var i = 0; i < response.errors[field].length; i++) {
                            toastr.error(response.errors[field][i]);
                        }
                    }
                }
            } else {
                toastr.error(response.msg || 'An error occurred while processing your request.');
            }
        }

           });
       });
   });

</script>
<script>
   $(document).ready(function () {
       $('.increase-qty').on('click', function () {
           var qtyInput = $(this).siblings('.qty');
           var newQuantity = parseInt(qtyInput.val()) + 1;
           qtyInput.val(newQuantity);
       });

       $('.decrease-qty').on('click', function () {
           var qtyInput = $(this).siblings('.qty');
           var newQuantity = parseInt(qtyInput.val()) - 1;
           if (newQuantity > 0) {
               qtyInput.val(newQuantity);
           }
         else{

         }
       });
   });


</script>
<script>
   $(function () {

      $(document).on('click', '.add-to-cart', function (e) {

          let variation_id = $('#size_variation_id').val();
          let variation_size = $('#size_value').val();
          let variation_sim = $('#sim_value').val();
          let variation_region = $('#region_value').val();
        //   alert(variation_region)
          let variation_color = $('#color_value').val();
          let variation_price = $('#pro_price').val();
          let quantity = $('#quantity').val();
          let id = $(this).data('id');
          let url = $(this).data('url');

          addToCart(url, id, variation_size, variation_color, variation_sim, variation_region, variation_id,variation_price,quantity);
      });

      // ... other click event handlers ...

      function addToCart(url, id, varSize ="", varColor = "", variation_sim = "", variation_region ="",  variation_id="",variation_price="",quantity,type = "") {
          var csrfToken = $('meta[name="csrf-token"]').attr('content');

          $.ajax({
              type: "POST",
              url: url,
              headers: {
                  'X-CSRF-TOKEN': csrfToken
              },
              data: { id,varSize,varColor,variation_sim, variation_region, variation_id, variation_price,quantity },
             success: function (res) {
                    
                    
                  if (res.status) {
                      toastr.success(res.msg);
            if (type) {
                if (res.url !== '') {
                    document.location.href = res.url;
                } else {
                    // Handle specific case
                }
            } else {
                $('span.cart_items').text(res.cart_items);
                // window.location.reload();
            }
        } else {
            // Check if the response contains validation errors
            if (res.errors) {
                for (var field in res.errors) {
                    if (res.errors.hasOwnProperty(field)) {
                        for (var i = 0; i < res.errors[field].length; i++) {
                            toastr.error(res.errors[field][i]);
                        }
                    }
                }
            } else {
                toastr.error(res.msg || 'An error occurred while processing your request.');
            }
        }

              },
              error: function (xhr, status, error) {
                  toastr.error('An error occurred while processing your request.');
              }
          });
      }

      // ... other functions ...


   });
   $(document).ready(function() {
              $('.popup-link').magnificPopup({
                  type: 'image', // Set the content type to 'image'
                  gallery: {
                      enabled: true // Enable gallery mode
                  }
              });
          });
   
    $('#regions .region').on('click', function(){
      $('#regions .region').removeClass('active');
      $(this).addClass('active');
      let value = $(this).attr('value');
    //   alert(value);
      let varregion = $(this).data('varregion');
    //   alert(varregion);

      $('#select_region').text('Selected region : '+varregion);


      // Assuming you have retrieved the selected variation price somehow
    //   let variationPrice = parseFloat($(this).data('varprice'));

      $.ajax({
          type: 'get',
          url: '{{ route("front.product.get-variation_region") }}',
          data: {
              varregion,
            	value,
            //   variationPrice, // Pass variation price to the server
          },
          success: function(res) {
             console.log(res)
            //   $('.current-price-product').text('' + res.name);
            	$('#region_value').val();
              $('#name_val').val(res.name);
           
             
          }
      });

      $("#region_value").val(varregion);
      $("#region_variation_id").val(value);
   });   
   
   
   
   $('#sims .sim').on('click', function(){
      $('#sims .sim').removeClass('active');
      $(this).addClass('active');
      let value = $(this).attr('value');
    //   alert(value);
      let varSim = $(this).data('varsim');
    //   alert(varSim);

      $('#select_sim').text('Selected sim : '+varSim);


      // Assuming you have retrieved the selected variation price somehow
    //   let variationPrice = parseFloat($(this).data('varprice'));

      $.ajax({
          type: 'get',
          url: '{{ route("front.product.get-variation_sim") }}',
          data: {
              varSim,
            	value,
            //   variationPrice, // Pass variation price to the server
          },
          success: function(res) {
             console.log(res)
            //   $('.current-price-product').text('' + res.name);
            	$('#sim_value').val();
              $('#name_val').val(res.name);
             
              console.log(res);
          }
      });

      $("#sim_value").val(varSim);
      $("#sim_variation_id").val(value);
   });      
          
          

   $('#sizes .size').on('click', function(){
      $('#sizes .size').removeClass('active');
      $(this).addClass('active');
      let value = $(this).attr('value');
      let varSize = $(this).data('varsize');

      $('#select_size').text('Selected storage : '+varSize);


      // Assuming you have retrieved the selected variation price somehow
      let variationPrice = parseFloat($(this).data('varprice'));

      $.ajax({
          type: 'get',
          url: '{{ route("front.product.get-variation_price") }}',
          data: {
              varSize,
            	value,
              variationPrice, // Pass variation price to the server
          },
          success: function(res) {
              $('.current-price-product').text('' + res.price);
            	$('#size_value').val();
              $('#price_val').val(res.price);
              $('#pro_price').val(res.price);
              console.log(res);
          }
      });

      $("#size_value").val(varSize);
      $("#size_variation_id").val(value);
   });


   let imageClick = false;

   $('#colors .color').on('click', function(){
      $('#colors .color').removeClass('active');
      $(this).addClass('active');
      let value = $(this).attr('value');
      let varColor = $(this).data('varcolor');
      let product_id = $(this).data('proid');
      let color_id = $(this).data('colorid');

      $('#select_color').text('Select Color : '+varColor);

      // Assuming you have retrieved the selected variation price somehow
      let variationColor = parseFloat($(this).data('varcolor'));

      $.ajax({
          type: 'get',
          url: '{{ route("front.product.get-variation_color") }}',
          data: {
              varColor,
            	value,
              variationColor,
            	product_id,
              color_id
            // Pass variation price to the server
          },
          success: function(res) {
              //$('.current-price-product').text('' + res.price);
            	$('.testslide-image').html(res.var_images);

            	$('#color_value').val();
              //$('#price_val1').val(res.price);
              console.log(res);

              imageClick = true;
          }
      });

      $("#color_value").val(varColor);
      $("#color_value1").val(value);
   });

   $(document).on('click', '.slider-container', function() {
      if (imageClick) {

      }
   });


   // JavaScript function to change the big image
//   function changeImage(imageUrl) {
//         $('#big-image').attr('src', imageUrl);
//         $(this).addClass('active');
//     }
    $(document).ready(function(){
        $('.thumbnail-container .thumbnail').click(function(){
            var image = $(this).attr('change_image');
            $('#big-image').attr('src', image);
            $('.thumbnail-container .thumbnail').removeClass('active');
            $(this).addClass('active');
        })
    })


    function changeImage(newImageSrc) {
        // Get the "big-image" element by its ID
        var bigImage = document.getElementById("big-image");

        // Update the source of the big image with the new image source
        bigImage.src = newImageSrc;
    }



</script>

    <script>
        $(document).ready(function(){
            $(".product-slider-main").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                draggable:false,
                asNavFor: '.product-slider-nav'
            });
            $(".product-slider-nav").slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.product-slider-main',
                centerMode: true,
                focusOnSelect: true,
                margin: 20,
            });
    //         $('.product-slider-nav').on('beforeChange', function(event, slick, currentSlide, nextSlide){
    // console.log('Before slide change: Current Slide - ', currentSlide, 'Next Slide - ', nextSlide);
    // });
        })
    </script>
@endpush