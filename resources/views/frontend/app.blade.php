<!DOCTYPE html>
<html lang="en">
    @include('frontend.partials.head')

    <style>
        .fixed-cart-bottom1 {
    position: fixed;
    bottom: 5rem;
    right: 4px;
    background: #F17E23;
    border-radius: 50px;
    height: 60px;
    width: 60px;
    cursor: pointer;
    box-shadow: 2px 2px 8px #F17E23;
    text-align: center;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.5s;
    z-index: 9999;
    border : #F17E23;
}

.fixed-compare-bottom {
  position: fixed;
  bottom: 10rem;
  right: 11px;
  border-radius: 5px;
  height: 60px;
  width: 60px;
  cursor: pointer;
  text-align: center;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: 0.5s;
  z-index: 9999;
  border: #F17E23;
  border: 2px solid #F17E23;
  height: 50px;
  width: 50px;
  font-size: 22px;
}
    </style>
<body>

    @include('frontend.partials.header')
    @php $cart = session()->get('cart', []); @endphp
    
    <a href="{{ route('front.product.compare-product') }}"
    class="fixed-compare-bottom"
    type="button"><i class="fa-solid fa-code-compare"></i></a>
    
    
    <a href="{{ route('front.checkout.index') }}"
    class="btn pmd-btn-fab pmd-ripple-effect btn-primary fixed-cart-bottom1"
    type="button"> @if($cart !== null) <span style="color: white;position: absolute;top: 4px;right: 17px;" class="cart_items">{{ count($cart) }}</span>  @endif<i class="fas fa-shopping-cart"></i></a>
    @yield('content')

    @include('frontend.partials.footer')

