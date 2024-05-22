{{-- <style>
    /* Remove or adjust the margin and padding to decrease white space */
    .mega-menu {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    .sub-mega-menu {
        margin-bottom: 10px; /* Adjust as needed */
        padding: 0;
    }
    .menu-title {
        display: block;
        margin: 0;
        padding: 0px 0; /* Adjust as needed */
    }
    .sub-mega-menu ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    .sub-mega-menu li {
        margin: 0;
        padding: 0px 0; /* Adjust as needed */
    }
</style> --}}
<div class="header-bottom header-bottom-bg-color sticky-bar">
    <div class="container">
        <div class="header-wrap header-space-between position-relative">
            <div class="logo logo-width-1 d-block d-lg-none">
                <a href="index.html"><img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
            </div>
            <div class="header-nav d-none d-lg-flex">

                <div class="main-categori-wrap d-none d-lg-block">
                    <a class="categori-button-active" href="#">
                        <span class="fi-rs-apps"></span> Browse Categories
                    </a>

                    <div class="categori-dropdown-wrap categori-dropdown-active-large">
                        <ul>
                            @foreach ($categories as $category)
                                <li class="has-children">
                                    <a href="shop.html"><i class="surfsidemedia-font-dress"></i>{{ $category->name }}</a>
                                    <div class="dropdown-menu">
                                        <ul class="mega-menu d-lg-flex">
                                            <li class="mega-menu-col col-lg-7">
                                                <ul class="d-lg-flex">
                                                    @if ($category->subCategories && count($category->subCategories) > 0)
                                                        @foreach ($category->subCategories as $subcategory)
                                                            <li class="mega-menu-col col-lg-6">
                                                                <ul>
                                                                    <li><span class="submenu-title">{{ $subcategory->name }}</span></li>
                                                                    <!-- Here you would list items within the subcategory if needed -->
                                                                    <li><a class="dropdown-item nav-link nav_item" href="#">{{ $subcategory->name }}</a></li>
                                                                </ul>
                                                            </li>
                                                        @endforeach
                                                    @else
                                                        <li class="mega-menu-col col-lg-12">
                                                            <ul>
                                                                <li>No subcategories available</li>
                                                            </ul>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </li>
                                            <li class="mega-menu-col col-lg-5">
                                                <div class="header-banner2">
                                                    <img src="{{asset('assets/imgs/banner/menu-banner-2.jpg')}}" alt="menu_banner1">
                                                    <div class="banne_info">
                                                        <h6>10% Off</h6>
                                                        <h4>New Arrival</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                                <div class="header-banner2">
                                                    <img src="{{asset('assets/imgs/banner/menu-banner-3.jpg')}}" alt="menu_banner2">
                                                    <div class="banne_info">
                                                        <h6>15% Off</h6>
                                                        <h4>Hot Deals</h4>
                                                        <a href="#">Shop now</a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>



                <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block">
                    <nav>
                        <ul>
                            <li><a  href="/">{{ trans('home.Home') }} </a></li>
                            <li><a href="{{ route('about') }}">{{ trans('home.About') }}</a></li>
                            <li><a href="{{ route('shop') }}">{{ trans('home.Shop') }}</a></li>
                            <li class="position-static"><a href="#">{{ trans('home.Our Collections') }} <i class="fi-rs-angle-down"></i></a>
                                <ul class="mega-menu">
                                    @foreach($categories as $category)
                                        <li class="sub-mega-menu ">
                                            <a class="menu-title" href="#">{{ $category->name }}</a>
                                            <ul>
                                                @foreach($category->subcategories as $subcategory)
                                                    <li><a href="#">{{ $subcategory->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            {{--  <li><a href="blog.html">Blog </a></li>  --}}
                            <li><a href="{{Route('contact') }}">{{ trans('home.Contact') }}</a></li>
                            <li><a href="#">{{ trans('home.My Account') }}<i class="fi-rs-angle-down"></i></a>
                                @auth
                               @if(Auth::user()->utype=='ADM')
                                <ul class="sub-menu">
                                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                                    <li><a href="{{route('admin.products')}}">Products</a></li>
                                    <li><a href="{{route('admin.categories')}}">Categories</a></li>
                                    <li><a href="{{route('admin.home.slider')}}">Home Slider</a></li>
                                    <li><a href="{{route('admin.contact')}}">Contact message</a></li>
                                    <li><a href="#">Coupons</a></li>
                                    <li><a href="{{route('admin.orders')}}">Orders</a></li>
                                    <li><a href="#">Customers</a></li>
                                    <li><a href="#">Logout</a></li>
                                </ul>
                                @else
                                <ul class="sub-menu">
                                    <li><a href="{{route('user.dashboard')}}">Dashboard</a></li>
                                    <li><a href="{{route('user.orders')}}">My order</a></li>
                                </ul>
                                 @endif
                            @endif
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="hotline d-none d-lg-block">
                <p><i class="fi-rs-smartphone"></i><span>Toll Free</span> (+20) 011-000-000 </p>
            </div>
            <p class="mobile-promotion">Happy <span class="text-brand">Mother's Day</span>. Big Sale Up to 40%</p>
            <div class="header-action-right d-block d-lg-none">
                <div class="header-action-2">
                    <div class="header-action-icon-2">
                        <a href="shop-wishlist.php">
                            <img alt="Fashon Media" src="{{asset('assets/imgs/theme/icons/icon-heart.svg')}} ">
                            <span class="pro-count white">4</span>
                        </a>
                    </div>
                    <div class="header-action-icon-2">
                        <a class="mini-cart-icon" href="cart.html">
                            <img alt="Fashon Media" src="{{asset('assets/imgs/theme/icons/icon-cart.svg ')}}">
                            <span class="pro-count white">2</span>
                        </a>
                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                            <ul>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="product-details.html"><img alt="Fashon Media" src="{{asset('assets/imgs/shop/thumbnail-3.jpg ')}}"></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="product-details.html">Plain Striola Shirts</a></h4>
                                        <h3><span>1 × </span>$800.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                                <li>
                                    <div class="shopping-cart-img">
                                        <a href="product-details.html"><img alt="Fashon Media" src="{{asset('assets/imgs/shop/thumbnail-4.jpg')}} "></a>
                                    </div>
                                    <div class="shopping-cart-title">
                                        <h4><a href="product-details.html">Macbook Pro 2022</a></h4>
                                        <h3><span>1 × </span>$3500.00</h3>
                                    </div>
                                    <div class="shopping-cart-delete">
                                        <a href="#"><i class="fi-rs-cross-small"></i></a>
                                    </div>
                                </li>
                            </ul>
                            <div class="shopping-cart-footer">
                                <div class="shopping-cart-total">
                                    <h4>Total <span>$383.00</span></h4>
                                </div>
                                <div class="shopping-cart-button">
                                    <a href="cart.html">View cart</a>
                                    <a href="shop-checkout.php">Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
