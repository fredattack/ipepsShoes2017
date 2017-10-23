<div class="header_top"><!--header_top-->
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <div class="contactinfo">
                    <ul class="nav nav-pills">
                        <li><a href="#"><i class="fa fa-phone"></i> +2 95 01 88 821</a></li>
                        <li><a href="#"><i class="fa fa-envelope"></i> info@ScarpeFine.be</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="social-icons pull-right">
                    <ul class="nav navbar-nav">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header_top-->

<div class="header-middle"><!--header-middle-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4">

            </div>
            <div class="col-sm-8">
                <div class="shop-menu pull-right">
                    <ul class="nav navbar-nav">
                        @if (Auth::check())
                            {{--//show logged in navbar--}}
                             @if(Auth::user()->role=='admin')
                                <li><a href="{{ route('admin') }}">admin</a></li>

                            @elseif(Auth::user()->role=='client')
                                <li><a href="#"><i class="fa fa-user"></i> Account</a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>

                                {{--<li><a href="#">Panier</a></li>--}}
                            @elseif(Auth::user()->role=='seller')
                                <li><a href="#">Commande</a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>

                            @endif
                        @endif

                            @guest
                            <li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                            <li><a href="#"><i class="fa fa-lock"></i> Login</a></li>


                            {{--<li><a href="#"><i class="fa fa-star"></i> Wishlist</a></li>--}}
                            {{--<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>--}}
@endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-middle-->

<div class="header-bottom"><!--header-bottom-->
    <div class="container">
        <div class="row">
            <div class="col-sm-9">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="mainmenu pull-left">
                    <ul class="nav navbar-nav collapse navbar-collapse">
                        <li><a href="{{route('shop')}}" class="active">Home</a></li>
                        <li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="{{route('shopFemme')}}">Femme</a></li>
                                <li><a href="{{route('shopEnfant')}}">Enfant</a></li>
                                <li><a href="{{route('shopHomme')}}">Homme</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="#">Promos<i class="fa fa-angle-down"></i></a>
                            <ul role="menu" class="sub-menu">
                                <li><a href="shop.html">Femme</a></li>
                                <li><a href="product-details.html">Enfant</a></li>
                                <li><a href="checkout.html">Homme</a></li>
                            </ul>
                        </li>
                        <li><a href="contact-us.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->