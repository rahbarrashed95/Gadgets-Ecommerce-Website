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