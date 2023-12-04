 @php
use App\Models\Information;
 $information = Information::first();
@endphp
 
 
 <!-- header Start  -->
 <header>
    <nav class="navbar fixed_menu py-3">
        <div class="mcontainer col-12 m-auto row justify-content-between align-items-center">
            <div class="col-4 d-block d-lg-none d-md-block">
                <button class="d-none shadow-none text-light btn btn-outline-light" type="button" data-bs-toggle="collapse" data-bs-target="#middlenav" aria-controls="middlenav"
                aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>

            </button>
            <div class="container sidebar_toggler">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
              </div>
            </div>
            <div class="col-lg-1 col-md-3 col-4 text-lg-start text-center">
                <a href="{{ route('front.home') }}" class="navbar-brand">
                    <img src="{{ asset(siteInfo()->logo) }}" alt="logo">
                </a>
            </div>
            <div class="col-lg-1 col-md-3 col-4 m-auto text-end d-block d-lg-none d-md-none">
                <div class="primary searchBarToggler">
                    <h3 class="fa-solid fa-magnifying-glass m-0 lh-0"></h3>
                </div>
            </div>
            <div class="col-lg-4 col-md-9 col-12 searchBar">
                <div class="search-container search_four">
                    <form action="#">
                        <div class="search_box m-auto">
                            <input placeholder="Search entire store here ..." type="text">
                            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="navbar navbar-expand-lg justify-content-between p-0">
                    <div class="col-lg-3">
                        <a class="" href="{{ route('front.offer_product') }}">
                            <div class="d-flex align-items-center">
                                <div class="col-54 primary text-end">
                                    <h3 class="fa fa-gift m-0"></h3>
                                </div>
                                <div class="col-8 text-light ps-3">
                                    <div class="bold font-13">Offers</div>
                                    <div class="font-12">Latest Offers</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a class="" href="{{ route('front.cart.index') }}">
                            <div class="d-flex align-items-center">
                                <div class="col-54 primary text-end">
                                    <h3 class="fas fa-cart-arrow-down m-0"></h3>
                                </div>
                                <div class="col-8 text-light ps-3">
                                    <div class="bold font-13">Cart</div>
                                    <div class="font-12">Add Items</div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-3">
                        <a class="" href="#">
                            <div class="d-flex align-items-center">
                                <div class="col-54 primary text-end">
                                    <h3 class="fas -thin fa-desktop"></h3>
                                </div>
                                <div class="col-8 text-light ps-3">
                                    <div class="bold font-13" style="color:white">PC Builder</div>
                                    <div class="font-12">

                                        <a style="color: #848B90;font-size: 11px;" href="{{url('pc-builder')}}">
                                            PC Builder
                                            </a>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-3">
                        <a class="" href="#signin" data-bs-toggle="modal">
                            <div class="d-flex align-items-center">
                                <div class="col-54 primary text-end">
                                    <h3 class="fa fa-user m-0"></h3>
                                </div>
                                <div class="col-8 text-light ps-3 flex-grow-1">
                                    <div class="bold font-13" style="color: #ffffff;">Account</div>
                                    @guest
                                    <div class="font-12" >
                                        <a href="{{url('login-user')}}" style="color: #ffffff;"> Register or Login </a>
                                    </div>
                                    @else
                                    <div class="font-12">
                                        <a class="" href="{{url('order')}}" style="color: #ffffff;">{{ auth()->user()->name }}</a>
                                        <a class="" href="{{url('logout')}}" style="color: #ffffff;">Logout</a>

                                    </div>
                                    @endguest
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
      </nav>
      <div class="navbar_fixed_menu"></div>
      <div class="overlay"></div>
      <div class="menu-sidebar">
        <ul class="navbar-nav">
            @forelse(categories() as $key => $item)
            <li class="nav-item"><a href="{{ route('front.shop', [
                'slug'=> $item->slug
            ] ) }}" class="nav-link">{{ $item->name }}</a>
            </li>
            @empty
            <div>
                <strong class="text-center text-danger">
                    No
                </strong>
            </div>
            @endforelse
        </ul>
      </div>
      <div class="fixed_bottom">
        <div class="row">
            <div class="col">
                <a class="" href="{{ route('front.offer_product') }}">
                    <div class="text-center">
                        <div class="col-12 primary">
                            <h3 class="fa fa-gift m-0"></h3>
                        </div>
                        <div class="col-12 text-light pt-2">
                            <div class="bold font-13">Offers</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="" href="{{ route('front.checkout.index') }}">
                    <div class="text-center">
                        <div class="col-12 primary">
                            <h3 class="fas fa-cart-arrow-down m-0"></h3>
                        </div>
                        <div class="col-12 text-light pt-2">
                            <div class="bold font-13">Cart</div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="" href="{{ route('front.home') }}">
                    <div class="text-center">
                        <div class="col-12 primary">
                            <h3 class="fa fa-home"></h3>
                        </div>
                        <div class="col-12 text-light pt-2">
                            <div class="bold font-13 text-nowrap">
                                <a style="color: #ffffff;font-size: 11px;" href="{{ route('front.home') }}">
                                   Home
                                </a>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="" href="#signin" data-bs-toggle="modal">
                    <div class="text-center">
                        <div class="col-12 primary">
                            <h3 class="fa fa-user m-0"></h3>
                        </div>
                        <div class="col-12 text-light pt-2 flex-grow-1">
                            @guest
                            <div class="bold font-13">
                                <a href="{{url('login-user')}}" style="color: #ffffff;">Account</a>
                            </div>
                            @else

                            <div class="bold font-13">
                                <a class="" href="{{url('order')}}" style="color: #ffffff;">{{ auth()->user()->name }}</a>
                            <a class="" href="{{url('logout')}}" style="color: #ffffff;">Logout</a>
                            </div>

                            @endguest
                        </div>
                    </div>
                </a>
            </div>
            <div class="col">
                <a class="" href="#">
                    <div class="text-center">
                        <div class="col-12 primary">
                        <a href="tel: {{ $information->owner_phone }}">
                            <h3 class="fa fa-phone m-0" style="color: #F17E23;"></h3>
                        </a>
                            
                        </div>
                        <div class="col-12 text-light pt-2">
                            <div class="bold font-13">Call</div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light bg-white bg-light p-0 pt-lg-3 pb-lg-1 middlenavb">
          <div class="container-fluid">
            <div class="collapse navbar-collapse middlenav" id="middlenav">
                <ul class="navbar-nav m-auto mt-2 mt-lg-0 justify-content-center w-100 flex-wrap">
                    @forelse(categories() as $key => $item)
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="{{ route('front.shop', [
                            'slug'=> $item->slug
                        ] ) }}" role="button" data-bs-toggle="" aria-expanded="false">
                          {{ $item->name }}
                        </a>
                        @if($item->activeSubCategories->count())
                        <ul class="dropdown-menu">
                            @foreach($item->activeSubCategories as $key => $item)
                          <li class="dropend">
                            <a class=" dropdown-item" href="{{ route('front.shop', [
                                'slug'=> $item->slug
                            ] ) }}" role="button" data-bs-toggle="" aria-expanded="false">
                              {{ $item->name }}
                            </a>
                            {{-- <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="#">Action</a></li>
                            </ul> --}}
                          </li>
                          @endforeach
                        </ul>
                        @endif
                      </li>

                      @empty
                            <div>
                                <strong class="text-center text-danger">
                                    No
                                </strong>
                            </div>
                            @endforelse



                </ul>
            </div>
        </div>
      </nav>
      <div class="page_loading">
          <div class="sphere-container">
          <div class="sphere sphere1"></div>
          <div class="sphere sphere2"></div>
          <div class="sphere sphere3"></div>
        </div>
      </div>
        <style>
            .page_loading{
                height: 100vh;
                width: 100%;
                position: fixed;
                z-index: 999;
                background: white;
                top: 0;
                left: 0;
            }
            .sphere-container {
              align-items: center;
              display: flex;
              height: 100vh;
              justify-content: center;
            }
            
            .sphere {
              background: radial-gradient(circle at 30% 30%, #ffc034, #c8a00f, #961d00);;
              border-radius: 50%;
              box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
              height: 40px;
              margin: 0 10px;
              width: 40px;
            }
            
            .sphere1 {
              animation: sphere 1.2s 0.2s ease-in-out infinite;
            }
            .sphere2 {
              animation: sphere 1.2s 0.5s ease-in-out infinite;
            }
            .sphere3 {
              animation: sphere 1.2s 0.8s ease-in-out infinite;
            }
            
            @keyframes sphere {
              0% {
                transform: scale(1.3);
                box-shadow: 0 0 0 rgba(0, 0, 0, 0.7);
              }
              50% {
                transform: translate(0, 50px);
                box-shadow: 0 7px 10px rgba(0, 0, 0, 0.5);
              }
              100% {
                transform: scale(1.3);
                box-shadow: 0 0 20px rgba(0, 0, 0, 0);
              }
            }

        </style>

</header>
