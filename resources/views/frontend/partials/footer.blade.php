 @php
    $infos = DB::table('informations')->first(); 
 @endphp
 
 <style>
 
 @media only screen and (min-width: 768px) {
  /* Your styles for screens with a minimum width of 768 pixels */
  .pages {
    text-align: center !important;
  }
}
 </style>
 
    <!-- Optional: Place to the bottom of scripts -->
    
    <footer class="pb-0">
        <div class="mcontainer m-auto my-3">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer">
                    <div class="text-orange text-cap font-18">Support</div>
                    <div class="footer_num_box mt-3 mb-3">
                        <div class="num_box d-flex align-items-center">
                            <h5 class="fa mb-0 fa-phone-alt"></h5><h4 class="mb-0 px-2">|</h4>
                            <h5 class="mb-0">{{ $infos->owner_phone}}</h5>
                        </div>
                    </div>
                    <div class="footer_num_box mt-3 mb-3">
                        <div class="num_box d-flex align-items-center">
                            <h5 class="fa mb-0 fa-map-marked"></h5><h4 class="mb-0 px-2">|</h4>
                            <h5 class="mb-0"><span class="font-12">Store Location: </span> <br> {{$infos->address}}</h5>
                        </div>
                    </div>
                    @php
                        $socials = DB::table('footer_social_links')->get();
                    @endphp
                    <div class="d-flex social-link flex-wrap">
                       @foreach($socials as $social)
                        <a href="{{$social->link}}"><i class="fa-brands {{$social->icon}}"></i></a>
                       @endforeach
                    </div>


                </div>
                <div class="col-lg-6 col-md-6 footer pages">
                    
                    @php $custom_pages = DB::table('custom_pages')->where('status', 1)->get();  @endphp
                    
                    <div class="text-orange text-cap font-18">Pages</div>
                    <div class="navbar-nav">
                        
                        @foreach($custom_pages as $pages)
                        <a class="nav-link nav-item" href="{{route('front.customPages', $pages->slug)}}">
                            {{$pages->page_name}}
                        </a>
                        @endforeach
                    </div>

                </div>
                <!--<div class="col-lg-3 col-md-6 footer">-->
                <!--    <div class="text-orange text-cap font-18">Support</div>-->
                <!--    <div class="navbar-nav">-->
                <!--        <a class="nav-link nav-item" href="#">-->
                <!--            About Us-->
                <!--        </a>-->
                <!--        <a class="nav-link nav-item" href="#">-->
                <!--            About Us-->
                <!--        </a>-->
                <!--        <a class="nav-link nav-item" href="#">-->
                <!--            About Us-->
                <!--        </a>-->
                <!--        <a class="nav-link nav-item" href="#">-->
                <!--            About Us-->
                <!--        </a>-->
                <!--        <a class="nav-link nav-item" href="#">-->
                <!--            About Us-->
                <!--        </a>-->
                <!--        <a class="nav-link nav-item" href="#">-->
                <!--            About Us-->
                <!--        </a>-->
                <!--    </div>-->

                <!--</div>-->
                <div class="col-lg-3 col-md-6 footer">
                    <div class="text-orange text-cap font-18">Stay Connected</div>
                    <div class="navbar-nav">
                        <a class="nav-link nav-item" href="#">
                            Apple Gadgets Ltd.
                        </a>
                        <a class="nav-link nav-item" href="#">
                            Shop 2D, 2nd Floor,
Rupayan Latifa Shamsuddin Square, Mirpur 1
                        </a>
                        <a class="nav-link nav-item" href="#">
                            Apple Gadgets Ltd.
                        </a>
                        <a class="nav-link nav-item" href="#">
                            Shop 2D, 2nd Floor,
Rupayan Latifa Shamsuddin Square, Mirpur 1
                        </a>
                        <a class="nav-link nav-item" href="#">
                            Apple Gadgets Ltd.
                        </a>
                        <a class="nav-link nav-item" href="#">
                            Shop 2D, 2nd Floor,
Rupayan Latifa Shamsuddin Square, Mirpur 1
                        </a>
                    </div>

                </div>

            </div>
        </div>
        <div class="bg-dark text-center">
            <p class="m-0 text-light font-17 p-2">{{$infos->copyright}}</p>
        </div>
    </footer>



 @include('frontend.partials.js')


 <!--{!!\App\Models\SitePixel::value('pixel_id')!!}-->
</body>
</html>
