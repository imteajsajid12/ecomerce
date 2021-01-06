 <!-- Page Preloder -->
 <div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__option">
        <div class="offcanvas__links">

        </div>
        <div class="offcanvas__top__hover">
            @guest
            <i class="fa fa-user" style="font-size:19px; color:rgb(19, 18, 18)"></i>  <a href="{{  route('login') }}"><span>Sign in<i class="arrow_carrot-down"></i></span></a>
            @else
            <a href="{{ route('login') }}" role="button"  class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre ></a><i class="fa fa-user" style="font-size:19px; color:rgb(12, 12, 12)">


                {{ Auth::user()->name }}   </i>

            <ul>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                 {{ __('Logout') }}
             </a>

             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                 @csrf
             </form>
              </li>

            </ul>
            @endguest
        </div>
    </div>
    <div class="offcanvas__nav__option">
        <a href="#" class="search-switch"><img src="{{ asset('img/icon/search.png') }}" alt=""></a>
        <a href="#"><img src="img/icon/heart.png" alt=""></a>
        <a href="{{ asset('/cart') }}"><img src="{{ asset('img/icon/cart.png') }}" alt=""> <span></span></a>
        <div class="price">{{App\Models\Cart::total()}}</div>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__text">
        <p>Free shipping, 30-day return or refund guarantee.</p>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="header__top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-7">
                    <div class="header__top__left">
                        <p>Free shipping, 30-day return or refund guarantee.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5">
                    <div class="header__top__right">
                        <div class="header__top__links">

                        </div>
                        <div class="header__top__hover">
                            @guest
                            <i class="fa fa-user" style="font-size:19px; color:rgb(243, 237, 237)"></i>  <a href="{{  route('login') }}"><span>Sign in<i class="arrow_carrot-down"></i></span></a>
                            @else
                            <a href="{{ route('login') }}" role="button"  class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre ></a><i class="fa fa-user" style="font-size:19px; color:rgb(243, 237, 237)">


                                {{ Auth::user()->name }}   </i>

                            <ul>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                             </a>

                             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                             </form>
                              </li>

                            </ul>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="header__logo">
                    <a href="{{ asset('/home') }}"><img src="{{ asset('') }}img/logo.png" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <nav class="header__menu mobile-menu">
                    <ul>
                        <li class="active"><a href="{{ asset('/home') }}">Home</a></li>
                        <li><a href="{{ asset('/shop') }}">Shop</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="{{ asset('/about') }}">About Us</a></li>
                         
                                <li><a href="{{ asset('/cart') }}">Shopping Cart</a></li>
                              ]
                            </ul>
                        </li>
                        <li><a href="{{ asset('/blog') }}">Blog</a></li>
                        <li><a href="{{ asset('/contacts') }}">Contacts</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3 col-md-3">
                <div class="header__nav__option">
                    <a href="#" class="search-switch"><img src="{{ asset('img/icon/search.png') }}" alt=""></a>
                    <a href="#"><img src="img/icon/heart.png" alt=""></a>
                    <a href="{{ asset('/cart') }}"><img src="{{ asset('img/icon/cart.png') }}" alt=""> <span></span></a>
                    <div class="price">{{App\Models\Cart::total()}}</div>
                </div>
            </div>
        </div>
        <div class="canvas__open"><i class="fa fa-bars"></i></div>
    </div>
</header>
<!-- Header Section End -->


















