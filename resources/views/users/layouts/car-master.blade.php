<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
   {{-- // <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" /> --}}

    <title>Car Booking</title>

    <!--=== Bootstrap CSS ===-->
    <link href="{{asset('/assets/user/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/user/assets/css/plugins/vegas.min.css')}}" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="{{asset('/assets/user/assets/css/plugins/slicknav.min.css')}}" rel="stylesheet">
  
    <!--=== Magnific Popup CSS ===-->
    <link href="{{asset('/assets/user/assets/css/plugins/magnific-popup.css')}}" rel="stylesheet">
     <link href="{{asset('/assets/user/assets/css/plugins/owl.carousel.min.css')}}" rel="stylesheet">
    
    <!--=== Gijgo CSS ===-->
    <link href="{{asset('/assets/user/assets/css/plugins/gijgo.css')}}" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="{{asset('/assets/user/assets/css/font-awesome.css')}}" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="{{asset('/assets/user/assets/css/reset.css')}}" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="{{asset('/assets/user/assets/css/style.css')}}" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="{{asset('/assets/user/assets/css/responsive.css')}}" rel="stylesheet">
     <link href="{{asset('/assets/user/assets/css/animate.css')}}" rel="stylesheet">

    {{-- page css start --}}
    @yield('page-css')



    <link href="{{ asset('/assets/user/assets/css/plugins/vegas.min.css') }}" rel="stylesheet">
<!-- Text Animated CSS -->
   {{-- // <link href="user/assets/coustom/animate.css" rel="stylesheet"> --}}
</head>

<body class="loader-active">

    <!--== Preloader Area Start ==-->
    <div class="preloader">
        <div class="preloader-spinner">
            <div class="loader-content">
                <img src="{{ asset('/assets/user/assets/img/preloader.gif') }}" alt="JSOFT">
            </div>
        </div>
    </div>
    <!--== Preloader Area End ==-->

    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-left">
                        <i class="fa fa-map-marker"></i> 802/2, Mirpur, Dhaka
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> +1 800 345 678
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-clock-o"></i> Mon-Fri 09.00 - 17.00
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Social Icons Start ==-->
                    <div class="col-lg-3 text-right">
                        <div class="header-social-icons">
                            <a href="#"><i class="fa fa-behance"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!--== Social Icons End ==-->
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom" class="py-0"> 
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-4 bordered imagelogo">
                        <a href="{{ route('car_booking.dashboard') }}" class="logo">
                            <img src="{{ asset('/assets/user/assets/img/cpbit.png') }}" alt="JSOFT" class="rounded mx-auto d-block p-0" height="50" width="50" >
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-8 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <li class=""><a href="{{ route('car_booking.dashboard') }}">Home</a>
                                </li>
                                <li class=""><a href=""> <img class="rounded-circle" src="{{ asset('/assets/user/assets/img/team/team-mem-1.png') }}" alt="JSOFT" height="30" width="30" style="padding: 2px; border:3px solid white;"></a>
                                     <ul>
                                        <li><a href="">User Profile</a></li>
                                        <li><a href="">Logout</a></li>
                                       
                                    </ul>
                                </li>

                                 <li class=""><a href="#">Car List</a>
                                    <ul>
                                        <li><a href="{{ route('car.view.regular') }}">Regular Car</a></li>
                                        <li><a href="{{ route('car.view.temporary') }}">Temporary Car</a></li>
                                       
                                    </ul>
                                </li>
                               
                                
                               
                                <li><a href="{{ route('login.index') }}">Log Out</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->

    <!--== Page Title Area Start ==-->
   
    @yield('top_content')
    <!--== Page Title Area End ==-->
 {{-- @yield('page-js1') --}}
    <!--== About Page Content Start ==-->

   
        
     @yield('content')
           
 
    <!--== About Page Content End ==-->


    <!--== Footer Area Start ==-->
    <section id="footer-area">

        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved CPBIT <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">IT</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </section>
    <!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="{{ asset('/assets/user/assets/img/scroll.png') }}" alt="JSOFT" height="40" width="40">
    </div>
    <!--== Scroll Top Area End ==-->

    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/jquery-3.2.1.min.js')}}"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/jquery-migrate.min.js')}}"></script>
    <!--=== Popper Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/popper.min.js')}}"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/bootstrap.min.js')}}"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/plugins/gijgo.js')}}"></script>
    <!--=== Vegas Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/plugins/vegas.min.js')}}"></script>
    <!--=== Isotope Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/plugins/isotope.min.js')}}"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/plugins/owl.carousel.min.js')}}"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/plugins/waypoints.min.js')}}"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/plugins/counterup.min.js')}}"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/plugins/mb.YTPlayer.js')}}"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/plugins/magnific-popup.min.js')}}"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="{{asset('/assets/user/assets/js/plugins/slicknav.min.js')}}"></script>

    <!--=== Mian Js ===-->
    <script src="{{asset('/assets/user/assets/js/main_for_car.js')}}"></script>
    

    {{-- single page js --}}
    @yield('page-js')
    

</body>

</html>