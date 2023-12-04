<script src="{{asset('frontend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('frontend/assets/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('frontend/assets/silck/slick.min.js')}}"></script>
<script src="{{asset('frontend/assets/js/main.js')}}"></script>
 
    <script src="{{asset('frontend/assets/js/migrate.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    // Function to show a toaster message
    function showToasterMessage(message, type) {
        toastr.options = {
            closeButton: true,
            progressBar: true,
            positionClass: "toast-top-right",
            timeOut: 8000 // Display time in milliseconds
        };

        toastr[type](message);
    }

    // Add to Cart button click event
    // $(".add-to-cart").on("click", function() {
    //     var productId = $(this).data("id");
    //     var url = $(this).data("url");

    //     // Perform your logic to add the item to the cart

    //     // Show toaster message
    //     showToasterMessage("Item added to cart!", "success");
    // });

    // AJAX request for checkout
    $("#checkout-form").on("submit", function (e) {
        e.preventDefault();

        var form = $(this);
        var url = form.attr("action");

        $.ajax({
            url: url,
            type: "POST",
            data: form.serialize(),
            success: function (response) {
                if (response.status) {
                    // Clear the cart or perform other actions

                    // Show success message
                    showToasterMessage(response.msg, "success");

                    // Redirect to a specific URL if needed
                    window.location.href = response.url;
                } else {
                    // Show error message
                    showToasterMessage(response.msg, "error");
                }
            },
            error: function (error) {
                // Show error message
                showToasterMessage("An error occurred. Please try again later.", "error");
            }
        });
    });
</script>



<script type="text/javascript">

var csrfToken = $('meta[name="csrf-token"]').attr('content');

$.ajax({
    headers: {
        'X-CSRF-TOKEN': csrfToken
    },
    // ... other AJAX settings ...
});


</script>

<script>
   $(document).on('click', '.remove-item', function (e) {
    e.preventDefault();

    let id = $(this).data('id');
    let url = '{{ route('front.cart.destroy', ['id' => ':id']) }}'; // Adjust the route name as needed

    url = url.replace(':id', id); // Replace the placeholder with the actual id

    $.ajax({
        type: 'GET', // Use GET or POST based on your route definition
        url: url,
        success: function (res) {
            if (res.status) {
                toastr.success(res.msg);
                window.location.reload(); // Refresh the page or update the cart UI
            } else {
                toastr.error(res.msg);
            }
        },
        error: function (xhr, status, error) {
            toastr.error('An error occurred while processing your request.');
        }
    });
});


</script>

<script>
$(document).ready(function() {
    $('.page_loading').hide();
    $(document).on('click', '.inc', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let quantityInput = $('.quantity-value[data-id="' + id + '"]');
        let newQuantity = parseInt(quantityInput.val()) + 1;
        quantityInput.val(newQuantity);
        updateSubtotal(id, newQuantity);
    });

    $(document).on('click', '.dec', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let quantityInput = $('.quantity-value[data-id="' + id + '"]');
        let newQuantity = parseInt(quantityInput.val()) - 1;
        if (newQuantity >= 1) {
            quantityInput.val(newQuantity);
            updateSubtotal(id, newQuantity);
        }
    });

    $(document).on('click', '.remove-item', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        $(this).closest('tr').remove();
        updateSubtotal(id, 0);
        // Update cart in session or perform AJAX request to update server-side cart
    });

    // Add event listener for the "Update" button
    $(document).on('click', '.update-cart', function(e) {
        e.preventDefault();
        let id = $(this).data('id');
        let quantityInput = $('.quantity-value[data-id="' + id + '"]');
        let newQuantity = parseInt(quantityInput.val());

        $.ajax({
            type: 'POST',
            url: '{{ route("front.cart.update", ["id" => "__id__"]) }}'.replace('__id__', id),
            data: {
                _token: '{{ csrf_token() }}',
                quantity: newQuantity
            },
            success: function(response) {
                // Update subtotal
                let subtotal = response.totalAmount.toFixed(2);
                $('#subtotal-' + id).text(subtotal);

                // Update total amount
                $('#total-amount').text(response.totalAmount.toFixed(2));
            },
            error: function(xhr, textStatus, errorThrown) {
                // Handle error response, if needed
            }
        });
    });

    function updateSubtotal(id, quantity) {
        let price = parseFloat($('#subtotal-' + id).data('price'));
        let subtotal = price * quantity;
        $('#subtotal-' + id).text(subtotal.toFixed(2));
        updateCart(id, quantity);
    }

    function updateTotalAmount() {
        let totalAmount = 0;
        $('.subtotal').each(function() {
            totalAmount += parseFloat($(this).text());
        });
        $('#total-amount').text(totalAmount.toFixed(2));
    }

    function updateCart(id, quantity) {
        $.ajax({
            type: 'POST',
            url: '{{ route("front.cart.update", ["id" => "__id__"]) }}'.replace('__id__', id),
            data: {
                _token: '{{ csrf_token() }}',
                quantity: quantity
            },
            success: function(response) {
                // Handle success response, if needed
            },
            error: function(xhr, textStatus, errorThrown) {
                // Handle error response, if needed
            }
        });
    }
});

$(document).ready(function(){
    $('.feature_product_url a').click(function(e){
        e.preventDefault();
        $('.feature_products .product-box').hide();
        $('.feature_product_url a').removeClass('active');
        $(this).addClass('active');
        var getLink = $(this).attr('get_link');
        $('.feature_products .product-box.'+getLink).show();
        $('.feature_products .product-box.' + getLink + ' .product_slider').slick('unslick');
        $('.feature_products .product-box.' + getLink + ' .product_slider').slick({
            dots: false,
            arrows: true,
            infinite: true,
            slidesToShow: 6, 
            slidesToScroll: 6,
            margin: '10px',
            responsive: [
              {
                breakpoint: 1200,
                settings: {
                  slidesToShow: 5,
                  slidesToScroll: 5,
                  infinite: true,
                  dots: false
                }
              },
              {
                breakpoint: 1070,
                settings: {
                  slidesToShow: 4,
                  slidesToScroll: 4,
                  infinite: true,
                  dots: false
                }
              },
              {
                breakpoint: 870,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: false
                }
              },
              {
                breakpoint: 770,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 500,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 390,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]

    })
    })
});



$(document).ready(function(){
    $('.feature_product_url a').click(function(e){
        e.preventDefault();
        $('.feature_products .product-box').hide();
        $('.feature_product_url a').removeClass('active');
        $(this).addClass('active');
        var getLink = $(this).attr('get_link');
        $('.feature_products .product-box.'+getLink).show();
        $('.feature_products .product-box.' + getLink + ' .product_slider').slick('unslick');
        $('.feature_products .product-box.' + getLink + ' .product_slider').slick({
            dots: false,
            arrows: true,
            infinite: true,
            slidesToShow: 6, 
            slidesToScroll: 6,
            margin: '10px',
            responsive: [
              {
                breakpoint: 1200,
                settings: {
                  slidesToShow: 5,
                  slidesToScroll: 5,
                  infinite: true,
                  dots: false
                }
              },
              {
                breakpoint: 1070,
                settings: {
                  slidesToShow: 4,
                  slidesToScroll: 4,
                  infinite: true,
                  dots: false
                }
              },
              {
                breakpoint: 870,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: false
                }
              },
              {
                breakpoint: 770,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 500,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 390,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]

    })
    })
});


$(document).ready(function(){
    $('.brand_product_url a').click(function(e){
        e.preventDefault();
        console.log('Tab clicked!');
        $('.brand_products .product-item').hide();
        $('.brand_product_url a').removeClass('active');
        $(this).addClass('active');
        var getLink = $(this).attr('get_link');
        $('.brand_products .product-item.'+getLink).show();
        $('.brand_products .product-item.' + getLink + ' .product_slider').slick('unslick');
        $('.brand_products .product-item.' + getLink + ' .product_slider').slick({
            dots: false,
            arrows: true,
            infinite: true,
            slidesToShow: 6, 
            slidesToScroll: 6,
            margin: '10px',
            responsive: [
              {
                breakpoint: 1200,
                settings: {
                  slidesToShow: 5,
                  slidesToScroll: 5,
                  infinite: true,
                  dots: false
                }
              },
              {
                breakpoint: 1070,
                settings: {
                  slidesToShow: 4,
                  slidesToScroll: 4,
                  infinite: true,
                  dots: false
                }
              },
              {
                breakpoint: 870,
                settings: {
                  slidesToShow: 3,
                  slidesToScroll: 3,
                  infinite: true,
                  dots: false
                }
              },
              {
                breakpoint: 770,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 500,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 390,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1
                }
              }
            ]

    })
    })
})


$(document).ready(function () {
    $('.brand_product_url a').click(function (e) {
        e.preventDefault();

        // Get the brand slug from the clicked link
        var brandSlug = $(this).attr('get_link');

        // Perform an AJAX request to get brand-wise products
        $.ajax({
            type: 'GET',
            url: '/brand-wise-product/' + brandSlug,
            success: function (data) {
                // Update the product content with the received data
                updateProductContent(data.brandProducts, data.brand);
            },
            error: function (error) {
                console.error('Error fetching brand-wise products:', error);
            }
        });
    });

    function updateProductContent(products, brand) {
        // Update the product content on the page with the received products
        // You may need to adjust this based on your HTML structure
        $('.product-item .product_slider').html(''); // Clear existing content

        $.each(products, function (index, product) {
            var productItemHtml = '<div>...'; // Build the HTML for each product item
            // Append the product item HTML to the product slider
            $('.product-item .product_slider').append(productItemHtml);
        });

        // Update any other elements on the page based on the selected brand (if needed)
        // For example, you might want to update the brand name in a heading
        $('.section_title h4').text('Top Brand Products - ' + brand.name);
    }
});

</script>


@stack('js')


