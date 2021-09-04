<?php
use App\Http\Controllers\ProductsController;
$total = 0;
if (Session::has('user')) {
    $total = ProductsController::cartitem();    
}
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Laravel Ecommerce</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">
    

    <!-- All css files are included here. -->
    <!-- Bootstrap fremwork main css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Owl Carousel min css -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!-- This core.css file contents all plugings css file. -->
    <link rel="stylesheet" href="{{ asset('css/core.css') }}">
    <!-- Theme shortcodes/elements style -->
    <link rel="stylesheet" href="{{ asset('css/shortcode/shortcodes.css') }}">
    <!-- Theme main style -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!-- Responsive css -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!-- User style -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">


    <!-- Modernizr JS -->
    <script src="{{ url('js/vendor/modernizr-3.5.0.min.js') }}"></script>
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper">
        <!-- Start Header Style -->
        <header id="htc__header" class="htc__header__area header--one">
            <!-- Start Mainmenu Area -->
            <div id="sticky-header-with-topbar" class="mainmenu__wrap sticky__header">
                <div class="container">
                    <div class="row">
                        <div class="menumenu__container clearfix">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-5"> 
                                <div class="logo">
                                     <a href="/"><img src="{{ url('images/logo/4.png') }}" alt="logo images"></a>
                                </div>
                            </div>
                            <div class="col-md-7 col-lg-8 col-sm-5 col-xs-3">
                                <nav class="main__menu__nav hidden-xs hidden-sm">
                                    <ul class="main__menu">
                                        <li class="drop"><a href="/">Home</a></li>
                                        <li class="drop"><a href="/addProduct">Add Product</a></li>
                                        <li><a href="/myorders">Order</a></li>
                                        
                                    </ul>
                                </nav>

                                <div class="mobile-menu clearfix visible-xs visible-sm">
                                    <nav id="mobile_dropdown">
                                        <ul>
                                            <li><a href="/">Home</a></li>
                                            <li><a href="/addProduct">Add Product</a></li>
                                            <li><a href="/myorders">Order</a></li>
                                            
                                        </ul>
                                    </nav>
                                </div>  
                            </div>
                            <div class="col-md-3 col-lg-2 col-sm-4 col-xs-4">
                                <div class="header__right">
                                    <div class="header__search search search__open">
                                        <a href="#"><i class="icon-magnifier icons"></i></a>
                                    </div>
                                    <div class="header__account">
                                        @if(Session::has('user') && session('loggedin') == true)
                                            <ul class="main__menu" style="display:block;">
                                                <li class="drop" style="margin:0px;"><a href="#" style="display:unset;"><i class="icon-user icons"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="/logout">Logout</a></li>
                                                    </ul>
                                                </li> 
                                            </ul>
                                        @else
                                            <ul class="main__menu" style="display:block;">
                                                <li class="drop" style="margin:0px;"><a href="#" style="display:unset;"><i class="icon-user icons"></i></a>
                                                    <ul class="dropdown">
                                                        <li><a href="/login">Login</a></li>
                                                    </ul>
                                                </li> 
                                            </ul>

                                        @endif
                                        
                                    </div>
                                    <div class="htc__shopping__cart ">
                                        <a class="cart__menu" href="/cart"><i class="icon-handbag icons"></i></a>
                                        <a href="#"><span class="htc__qua">{{$total}}</span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mobile-menu-area"></div>
                </div>
            </div>
            <!-- End Mainmenu Area -->
        </header>
        <!-- End Header Area -->