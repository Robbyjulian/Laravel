    <!DOCTYPE html>
    <html lang="en">
    <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>@yield('title') - {{ config('app.name')}}</title>
    <!--favicon-->
    <link rel="icon" href="{{asset ('assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- simplebar CSS-->
    <link href="{{asset ('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet"/>
    <!-- Bootstrap core CSS-->
    <link href="{{asset ('assets/css/bootstrap.min.css')}}" rel="stylesheet"/>
    <!-- animate CSS-->
    <link href="{{asset ('assets/css/animate.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Icons CSS-->
    <link href="{{asset ('assets/css/icons.css')}}" rel="stylesheet" type="text/css"/>
    <!-- Sidebar CSS-->
    <link href="{{asset ('assets/css/sidebar-menu.css')}}" rel="stylesheet"/>
    <!-- Custom Style-->
    <link href="{{asset ('assets/css/app-style.css')}}" rel="stylesheet"/>
    
    @stack('page-styles')

    </head>

    <body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

    @include('layouts.sidebar')

    @include('layouts.header')

    <div class="clearfix"></div>
        
    <div class="content-wrapper">
        <div class="container-fluid">
        <!-- Breadcrumb-->
        <div class="card mt-3">
            <div class="card-content">
                <div class="row row-group m-0">
                    <div class="col-12 col-lg-6 col-xl-3 border-light">
                        <div class="card-body">
                          <h5 class="text-white mb-0">@yield('title')<span class="float-right"></span></h5>
                        </div>
                    </div>
                </div>
            </div>
         </div>  
        <!-- End Breadcrumb-->
        
        <!--  main-->
        
        @yield('content')
        
        <!-- End main-->
    
        <!--start overlay-->
        <div class="overlay toggle-menu"></div>
        <!--end overlay-->
        </div>
        <!-- End container-fluid-->

    </div>
    <!--End content-wrapper-->
    
    <!--Start Back To Top Button-->
        <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        <!--End Back To Top Button-->
        
        <!--Start footer-->
        <footer class="footer">
          <div class="container">
              <div class="text-center">
                Copyright © 2018 Dashtreme Admin
              </div>
          </div>
        </footer>
        <!--End footer-->
        
    <!--start color switcher-->
    <div class="right-sidebar">
        <div class="switcher-icon">
        <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
        </div>
        <div class="right-sidebar-content">

        <p class="mb-0">Gaussion Texture</p>
        <hr>
        
        <ul class="switcher">
            <li id="theme1"></li>
            <li id="theme2"></li>
            <li id="theme3"></li>
            <li id="theme4"></li>
            <li id="theme5"></li>
            <li id="theme6"></li>
        </ul>

        <p class="mb-0">Gradient Background</p>
        <hr>
        
        <ul class="switcher">
            <li id="theme7"></li>
            <li id="theme8"></li>
            <li id="theme9"></li>
            <li id="theme10"></li>
            <li id="theme11"></li>
            <li id="theme12"></li>
            <li id="theme13"></li>
            <li id="theme14"></li>
            <li id="theme15"></li>
        </ul>
        
        </div>
    </div>
    <!--end color switcher-->
        
    </div><!--End wrapper-->
    
    @stack('before-scripts')

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
     
    @stack('page-scripts')
    
    <!-- simplebar js -->
    <script src="{{asset('assets/plugins/simplebar/js/simplebar.js')}}"></script>
    <!-- sidebar-menu js -->
    <script src="{{asset('assets/js/sidebar-menu.js')}}"></script>
    
    @stack('mid-scripts')
    
    <!-- Custom scripts -->
    <script src="{{asset('assets/js/app-script.js')}}"></script>

    @stack('after-scripts')

    </body>
    </html>
