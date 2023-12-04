@extends('frontend.app')
@section('title', 'Shop Product List')
@push('css')


@endpush
@section('content')
 <div class="main-wrapper">
        <div class="overlay-sidebar"></div>
        <div class="category-page mcontainer p-0 m-auto mt-2 mb-2">
            
            <div class="row">
                <section class="products-box col-lg-12 col-md-12 flex-grow-1">
                    <div class="bg-white pt-0">
                        <div class="product-bar rounded-3">
                            <div class="btn-list">
                                <button class="filter-btn btn d-block d-md-block d-lg-none">
                                   <i class="fas fa-filter"></i> Filter
                                </button>
                                <button class="compare-btn btn d-none d-md-none border-0 d-lg-block font-20 bold">
                                    
                                </button>
                            </div>
                            <div class="filter-sort d-flex align-items-center">
                                <div class="d-flex align-items-center me-2">
                                  <label for="" class="form-label me-2 mb-0 semi" style="white-space: nowrap;">Sort By: </label>
                                  <select name="" id="" class="form-select shadow-none">
                                    <option value="">Select One</option>
                                    <option value="">High to Low</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        <div class="product-box shop_page py-1 justify-content-lg-start row">
                            
                            @forelse($products  as $key => $product)
                            <div class="col-lg-3 product_col col-md-4 col-6">
                                <div class="product-item">
                                    <div class="product_thumb">
                                        <a class="primary_img" href="{{ route('front.product.show', [ $product->id ] ) }}"><img src="{{ asset('uploads/custom-images2/'.$product->thumb_image) }}" alt=""></a>
                                         @if($product->offer_price > 0)
                                        <div class="label_product">
                                            <span class="label_sale ">
                                                 {{ calculateDiscountPercent($product) }} % OFF
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
                                            <a href="{{ route('front.product.show', [ $product->id ] ) }}" class="name regular">{{ \Illuminate\Support\Str::limit($product->name, 30)}}</a>
                                        </h4>
                                        <div class="price_box ps-1 pt-3">
                                             @if(empty($product->offer_price))
                                            <span class="current_price">{{$product->price}} Tk</span>
                                            @else
                                            <span class="current_price">{{$product->offer_price}} Tk</span>
                                            <span class="old_price">{{$product->price}} Tk</span>
                                            @endif
                                        </div>
                                        <div class="rounded-0 d-flex justify-content-center product_buttons">
                                              @if($product->type == 'variable' || $product->prod_color == 'varcolor')

                                     <a href="{{ route('front.product.show', [ $product->id ] ) }}"

                                        class=" btn btn-sm semi buy_now"
                                        >
                                    Buy Now
                                     </a>

                                     <a href="{{ route('front.product.show', [ $product->id ] ) }}"  class="add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @else
                                     <a href="{{ route('front.check.single', ['product_id' => $product->id]) }}"

                                        class="btn btn-sm btn-warning semi buy-now  semi buy_now"
                                        data-url="{{ route('front.cart.store') }}">
                                   Buy Now
                                     </a>

                                     <a data-id="{{ $product->id }}" data-url="{{ route('front.cart.store') }}"  class=" add_cart btn btn-sm semi   add-to-cart">
                                        Add to cart
                                        </a>
                                     @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div align="center">
                                <strong class="text-center text-danger">No products are available</strong>
                            </div>
                            @endforelse
                            
                            
                        </div>
                    </div>
                </section>
            <!-- Products -->
            </div>
        </div>
        
    </div>
@endsection

@push('js')
<script>
$(document).ready(function () {
    
    $(document).on('click', '.add-to-cart', function (e) {
        let id = $(this).data('id');
        let url = $(this).data('url');
        addToCart(url, id);
    });

    // ... other click event handlers ...

    function addToCart(url, id, variation = "", quantity = 1) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: "POST",
            url: url,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            data: { id, quantity, variation},
            success: function (res) {
                if (res.status) {
                        //  toastr.success(res.msg);
                         window.location.reload();
                         
                } else {
                    toastr.error(res.msg);
                }
            },
            error: function (xhr, status, error) {
                toastr.error('An error occurred while processing your request.');
            }
        });
    }
    
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
$(document).ready(function () {
    
});

</script>


@endpush











