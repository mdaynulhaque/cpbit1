
<!DOCTYPE html>
<html lang="en" class="loading">
  <!-- BEGIN : Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Apex admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Apex admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Car Dashboard</title>
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('assets/admin/app-assets/img/ico/apple-icon-60.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/admin/app-assets/img/ico/apple-icon-76.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/admin/app-assets/img/ico/apple-icon-120.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/admin/app-assets/img/ico/apple-icon-152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/admin/app-assets/img/cpbit.png') }}">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets/admin/app-assets/img/ico/favicon-32.png')}}">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900|Montserrat:300,400,500,600,700,800,900')}}" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/fonts/feather/style.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/fonts/simple-line-icons/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css/perfect-scrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css/core/bootstrap.min.css')}}">
   {{--  <link rel="stylesheet" type="text/css" href="{{assets/admin/asset('app-assets/vendors/css/chartist.min.css')}}"> --}}
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->

    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/room/app.css')}}">
     {{--   --}}
    <!-- END APEX CSS-->
     BEGIN Page Level CSS
    <!-- END Page Level CSS-->


    @yield('page-css')




  </head>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body data-col="2-columns" class=" 2-columns ">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">


      <!-- main menu-->
      <!--.main-menu(class="#{menuColor} #{menuOpenType}", class=(menuShadow == true ? 'menu-shadow' : ''))-->
      <div data-active-color="white" data-background-color="man-of-steel" data-image="{{ asset('assets/admin/app-assets/img/sidebar-bg/01.jpg') }}" class="app-sidebar">
        <!-- main menu header-->
        <!-- Sidebar Header starts-->
        <div class="sidebar-header">
          <div class="logo clearfix"><a href="{{ route('room.dashboard') }}" class="logo-text float-left">
              <div class="logo-img"><img src="{{ asset('/assets/admin/app-assets/img/cpbit.png') }}" height="50" width="50" /></div><span class="text align-middle">Car Pool</span></a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i data-toggle="expanded" class="toggle-icon ft-toggle-right"></i></a><a id="sidebarClose" href="javascript:;" class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-x"></i></a></div>
        </div>
        <!-- Sidebar Header Ends-->
        <!-- / main menu header-->
        <!-- main menu content-->
        <div class="sidebar-content">
          <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" data-scroll-to-active="true" class="navigation navigation-main">
              <li class=""><a href=""><i class="fa fa-dashboard"></i><span data-i18n="" class="menu-title">Dashboard</a>
                <ul class="menu-content">
        
              </li>
             

            </ul>
             <li class="has-sub nav-item"><a href="#"><i class="text-info ft-home"></i><span data-i18n="" class="menu-title">Car Section</span></a>
                <ul class="menu-content">
                  <li class=""><a href="{{ route('car.show') }}" class="menu-item">All Car</a>
                  </li>
             </ul>
             </li>

              <li class=""><a href="{{ route('driver.index') }}"><i class="text-info ft-home"></i><span data-i18n="" class="menu-title">All Driver</span></a>
             </li>
             <li class=""><a href="{{ route('destination.index') }}"><i class="text-info ft-home"></i><span data-i18n="" class="menu-title">All Destination</span></a>
             </li>
            
          </div>
        </div>



        {{-- room section satrt here --}}

         

        {{-- room section end here --}}
        <!-- main menu content-->
        <div class="sidebar-background"></div>
        <!-- main menu footer-->
        <!-- include includes/menu-footer-->
        <!-- main menu footer-->
      </div>
      <!-- / main menu-->


      <!-- Navbar (Header) Starts-->
      <nav class="navbar navbar-expand-lg navbar-light bg-faded header-navbar">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-left"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a aria-controls="navbarSupportedContent" href="javascript:;" class="open-navbar-container black"><i class="ft-more-vertical"></i></a></span>
            <form role="search" class="navbar-form navbar-right mt-1">
              <div class="position-relative has-icon-right">
                <input type="text" placeholder="Search" class="form-control round"/>
                <div class="form-control-position"><i class="ft-search"></i></div>
              </div>
            </form>
          </div>
          <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
              <ul class="navbar-nav">
                <li class="nav-item mr-2 d-none d-lg-block"><a id="navbar-fullscreen" href="javascript:;" class="nav-link apptogglefullscreen"><i class="ft-maximize font-medium-3 blue-grey darken-4"></i>
                    <p class="d-none">fullscreen</p></a></li>
               
              
                <li class="dropdown nav-item"><a id="dropdownBasic3" href="#" data-toggle="dropdown" class="nav-link position-relative dropdown-toggle"><i class="ft-user font-medium-3 blue-grey darken-4"></i>
                    <p class="d-none">User Settings</p></a>
                  <div ngbdropdownmenu="" aria-labelledby="dropdownBasic3" class="dropdown-menu text-left dropdown-menu-right"><a href="../../../html/html/ltr/user-profile-page.html" class="dropdown-item py-1"><i class="ft-edit mr-2"></i><span>Edit Profile</span></a>
                    <div class="dropdown-divider"></div><a href="../../../html/html/ltr/login-page.html" class="dropdown-item"><i class="ft-power mr-2"></i><span>Logout</span></a>
                  </div>
                </li>
                <li class="nav-item d-none d-lg-block"><a href="javascript:;" class="nav-link position-relative notification-sidebar-toggle"><i class="ft-align-left font-medium-3 blue-grey darken-4"></i>
                    <p class="d-none">Notifications Sidebar</p></a></li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- Navbar (Header) Ends-->

      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-wrapper">

            @yield('content')



          </div>
        </div>
        <!-- END : End Main Content-->

        <!-- BEGIN : Footer-->
        <footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; 2020 <a href="" id="pixinventLink" target="_blank" class="text-bold-800 primary darken-2">CPBIT </a>, All rights reserved. </span></p>
        </footer>
        <!-- End : Footer-->

      </div>
    </div>
   
    <!-- BEGIN VENDOR JS-->
    <script src=" {{asset('assets/admin/app-assets/vendors/js/core/jquery-3.2.1.min.js')}}" type="text/javascript"></script>
    <script src=" {{asset('assets/admin/app-assets/vendors/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src=" {{asset('assets/admin/app-assets/vendors/js/core/bootstrap.min.js')}}" type="text/javascript"></script>
    <script src=" {{asset('assets/admin/app-assets/vendors/js/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
    <script src=" {{asset('assets/admin/app-assets/vendors/js/prism.min.js')}}" type="text/javascript"></script>
    <script src=" {{asset('assets/admin/app-assets/vendors/js/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
    <script src=" {{asset('assets/admin/app-assets/vendors/js/screenfull.min.js')}}" type="text/javascript"></script>
    <script src=" {{asset('assets/admin/app-assets/vendors/js/pace/pace.min.js')}}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    {{-- <script src=" {{asset('assets/admin/app-assets/vendors/js/chartist.min.js')}}" type="text/javascript"></script> --}}
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src=" {{asset('assets/admin/app-assets/js/app-sidebar.js')}}" type="text/javascript"></script>
   {{--  <script src=" {{asset('assets/admin/app-assets/js/notification-sidebar.js')}}" type="text/javascript"></script> --}}
    {{-- <script src=" {{asset('assets/admin/app-assets/js/customizer.js')}} " type="text/javascript"></script> --}}
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    {{-- <script src="{{asset('assets/admin/app-assets/js/dashboard1.js')}}" type="text/javascript"></script> --}}


    {{-- datatables  start --}}
     <!-- BEGIN PAGE VENDOR JS-->
 
    <!-- END PAGE LEVEL JS-->

    @yield('page-js')


  </body>
  <!-- END : Body-->

</html>