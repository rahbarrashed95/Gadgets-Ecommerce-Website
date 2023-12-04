
function AllSliders(){
  $(".product_slider").slick({
    dots: false,
    arrows: false,
    // autoplay: true,
    autoplaySpeed: 1000,
    infinite: true,
    slidesToShow: 6,
    slidesToScroll: 6,
    lazyLoad: 'ondemand',
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
      },
      {
        breakpoint: 320,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
  $(".brand-slider").slick({
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 1000,
    infinite: true,
    slidesToShow: 8,
    slidesToScroll: 8,
    margin: '10px',
    responsive: [
      {
        breakpoint: 1200,
        settings: {
          slidesToShow: 6,
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
        breakpoint: 770,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      },
      {
        breakpoint: 320,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3
        }
      }
    ]
  });
  


}

(function() {

  function category() {
    // Your code for category selection goes here.
    // Replace this function with your actual category functionality.
    console.log("Category function called");
  }

  var parent = document.querySelector(".range-slider");
  if (!parent) return;

  var rangeS = parent.querySelectorAll("input[type=range]"),
    numberS = parent.querySelectorAll("input[type=number]");

  rangeS.forEach(function(el) {
    el.oninput = function() {
      var slide1 = parseFloat(rangeS[0].value),
        slide2 = parseFloat(rangeS[1].value);

      if (slide1 > slide2) {
        [slide1, slide2] = [slide2, slide1];
      }

      numberS[0].value = slide1;
      numberS[1].value = slide2;

      // Call the category function after updating the range values
      category();
    };
  });

  numberS.forEach(function(el) {
    el.oninput = function() {
      var number1 = parseFloat(numberS[0].value),
        number2 = parseFloat(numberS[1].value);

      if (number1 > number2) {
        var tmp = number1;
        numberS[0].value = number2;
        numberS[1].value = tmp;
      }

      rangeS[0].value = number1;
      rangeS[1].value = number2;

      // Call the category function after updating the number values
      category();
    };
  });

})();
function accordion(){
  $('.accordion-box .accordion-title').click(function(){
    $(this).find('i').toggleClass('fa-plus fa-minus');
    $(this).closest('.accordion-box').find('.accordion-body').stop().slideToggle();
  })
}
function toggle(){
  $('.filter-btn').click(function(){
    $('.sidebar-filter').addClass('open');
    $('.overlay-sidebar').show();
  })
  $('.overlay-sidebar').click(function(){
    $('.sidebar-filter').removeClass('open');
    $('.overlay-sidebar').hide();
  })
  $('.searchBarToggler').click(function(){
    $('.searchBar').slideToggle(500);
  })
  $('.sidebar_toggler').click(function(){
    $('.menu-sidebar').toggleClass('active');
    $(this).toggleClass('change');
    $('.overlay').show();
  })
  $('.overlay').click(function(){
    $('.menu-sidebar').removeClass('active');
    $('.sidebar_toggler').removeClass('change');
    $(this).hide();
  })


}
$(document).ready(function(){
  AllSliders();
  accordion();
   toggle();
});

