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
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> Votre Compte <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('admin') }}">admin</a></li>
                            @elseif(Auth::user()->role=='client')

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> Votre Compte <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a  class="dropdown-item" href="{{route('showFront',['id' => Auth::user()->id])}}">
                                                votre profil
                                            </a>
                                        </li>
                                        <li>
                                            <a  class="dropdown-item" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                 @php($itemsInCart= \App\TempOrderLine::where('idUser','=',Auth::user()->id)->count())
                                <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i>Panier&nbsp;
                                        @if($itemsInCart!=0)
                                        <small class="badge pull-right bg-red">{{$itemsInCart}}</small></a></li>
                                 @else
                                 </a></li>
                                        @endif

                            @elseif(Auth::user()->role=='seller')
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-user"></i> Votre Compte <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="">Vos Commandes</a></li>

                                <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i>Panier</a></li>
                            @endif
                        @endif
                        @guest
                        {{--<li><a id="cartLink" class="" href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Cart</a></li>--}}
                            <li><a href="{{route('login')}}"><i class="fa fa-lock"></i>connecter</a></li>
                            <li><a href="{{route('register')}}"><i class="fa fa-lock"></i>enregistrer</a></li>
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
                        <li><a href="{{route('shop')}}" >Home</a></li>
                        <li class="dropdown"><a href="{{route('shop')}}" id="shopLink" class="">Shop<i class="fa fa-angle-down"></i></a>
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
                                <li><a href="#">Homme</a></li>
                            </ul>
                        </li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div><!--/header-bottom-->