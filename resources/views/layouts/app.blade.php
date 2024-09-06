
<!DOCTYPE html >
<html lang="{{ app()->getLocale() }}" dir="{{ in_array(app()->getLocale(), config('laravellocalization.rtl_locales')) ? 'rtl' : 'ltr' }}" class="{{ session('theme') === 'dark' ? 'dark' : '' }}">

{{-- <html class="no-js" lang="en"> --}}

<head>
    <meta charset="utf-8">
<title>Fashon</title>
<meta http-equiv="x-ua-compatible" content="ie=edge">
<meta name="description" content="">
{{-- <link rel="stylesheet" href="{{ asset(session('direction') === 'rtl' ? 'css/rtl.css' : 'css/app.css') }}"> --}}

@if (session('direction') === 'rtl')
<link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@else
<link rel="stylesheet" href="{{asset('css/app.css')}}">
@endif
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="og:title" content="">
<meta property="og:type" content="">
<meta property="og:url" content="">
<meta property="og:image" content="">
<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/imgs/theme/favicon.ico')}}">
<link rel="stylesheet" href="{{asset('assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
@livewireStyles




</head>

<body>
    <header class="header-area header-style-1 header-height-2">


        <div class="header-top header-top-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info">
                            <ul>
                                <li>
                                    <a class="language-dropdown-active" href="#">
                                        <i class="fi-rs-world"></i> English <i class="fi-rs-angle-small-down"></i>
                                    </a>
                                    <ul class="language-dropdown">
                                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                            <li>
                                                <a rel="alternate" hreflang="{{ $localeCode }}"
                                                   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                                   dir="{{ in_array($localeCode, config('laravellocalization.rtl_locales')) ? 'rtl' : 'ltr' }}">
                                                    {{ $properties['native'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                        {{-- Optionally, you can keep or remove the commented out languages --}}
                                        {{-- <li><a href="#"><img src="assets/imgs/theme/flag-fr.png" alt="">Français</a></li> --}}
                                        {{-- <li><a href="#"><img src="assets/imgs/theme/flag-dt.png" alt="">العربية</a></li> --}}
                                    </ul>
                                </li>
                            </ul>

                        </div>

                    </div>
                    <div class="col-xl-6 col-lg-4">
                        <div class="text-center">
                            <div id="news-flash" class="d-inline-block">
                                <ul>
                                    <li>Get great devices up to 50% off <a href="{{ route('shop') }}">View details</a></li>
                                    <li>Supper Value Deals - Save more with coupons</li>
                                    <li>Trendy 25silver jewelry, save up 35% off today <a href="{{ route('shop') }}">Shop now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="header-info header-info-right">
                     @auth
                     {{-- @livewire('notification-icon-component') --}}

                        <ul>
                                <li><i class="fi-rs-user"></i>{{Auth::user()->name}}  /
                                <form method="post" action="{{route('logout')}}"in>
                                    @csrf
                                    <a href="{{route('logout')}}" onclick="event.preventDefult(); this.closest('form').submit();">logout</a>
                                  </form>
                            </li>
                        </ul>
                        @else
                            <ul>
                                <li><i class="fi-rs-key"></i><a href="{{route('login')}}">Log In </a>  / <a href="{{route('register')}}">Sign Up</a></li>
                            </ul>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="/"><img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
                    </div>

                        @livewire('header-search-component')

                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a href="shop-wishlist.php">
                                        <img class="svgInject" alt="Fashon Media" src="{{asset('assets/imgs/theme/icons/icon-heart.svg')}}">
                                        <span class="pro-count blue">0</span>
                                    </a>
                                </div>
                                @livewire('notification-icon-component')

                                  @livewire('cart-icon-component')

                                  <livewire:theme-switcher />

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @livewire('header-component')

        {{-- @livewire('chat-g-p-t-component') --}}

        {{-- <livewire:chat-gpt-component /> --}}

    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="index.html"><img src="{{asset('assets/imgs/logo/logo.png')}}" alt="logo"></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="#">
                        <input type="text" placeholder="Search for items…">
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <div class="main-categori-wrap mobile-header-border">
                        <a class="categori-button-active-2" href="#">
                            <span class="fi-rs-apps"></span> Browse Categories
                        </a>
                        <div class="categori-dropdown-wrap categori-dropdown-active-small">
                            <ul>
                                <li><a href="shop.html"><i class="surfsidemedia-font-dress"></i>Women's Clothing</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-tshirt"></i>Men's Clothing</a></li>
                                <li> <a href="shop.html"><i class="surfsidemedia-font-smartphone"></i> Cellphones</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-desktop"></i>Computer & Office</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-cpu"></i>Consumer Electronics</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-home"></i>Home & Garden</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-high-heels"></i>Shoes</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-teddy-bear"></i>Mother & Kids</a></li>
                                <li><a href="shop.html"><i class="surfsidemedia-font-kite"></i>Outdoor fun</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="index.html">Home</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="shop.html">shop</a></li>
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Our Collections</a>
                                <ul class="dropdown">
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Women's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Dresses</a></li>
                                            <li><a href="product-details.html">Blouses & Shirts</a></li>
                                            <li><a href="product-details.html">Hoodies & Sweatshirts</a></li>
                                            <li><a href="product-details.html">Women's Sets</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Men's Fashion</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Jackets</a></li>
                                            <li><a href="product-details.html">Casual Faux Leather</a></li>
                                            <li><a href="product-details.html">Genuine Leather</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Technology</a>
                                        <ul class="dropdown">
                                            <li><a href="product-details.html">Gaming Laptops</a></li>
                                            <li><a href="product-details.html">Ultraslim Laptops</a></li>
                                            <li><a href="product-details.html">Tablets</a></li>
                                            <li><a href="product-details.html">Laptop Accessories</a></li>
                                            <li><a href="product-details.html">Tablet Accessories</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            {{--  <li class="menu-item-has-children"><span class="menu-expand"></span><a href="blog.html">Blog</a></li>  --}}
                            <li class="menu-item-has-children"><span class="menu-expand"></span><a href="#">Language</a>
                                <ul class="dropdown">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                    <li><a href="#">Spanish</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap mobile-header-border">
                    <div class="single-mobile-header-info mt-30">
                        <a href="contact.html"> Our location </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="{{route('login')}}">Log In </a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="register.html">Sign Up</a>
                    </div>
                    <div class="single-mobile-header-info">
                        <a href="#">(+1) 0000-000-000 </a>
                    </div>
                </div>
                <div class="mobile-social-icon">
                    <h5 class="mb-15 text-grey-4">Follow Us</h5>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-facebook.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-twitter.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-instagram.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-pinterest.svg" alt=""></a>
                    <a href="#"><img src="assets/imgs/theme/icons/icon-youtube.svg" alt=""></a>
                </div>
            </div>
        </div>
    </div>


    {{ $slot }}

    @livewire('footer-component')
    <!-- Vendor JS-->
<script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
<script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>

<script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/slick.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/wow.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
<script src="{{asset('assets/js/plugins/perfect-scrollbar.js')}}"></script>
<script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
<script src="{{asset('assets/js/plugins/select2.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/waypoints.js')}}"></script>
<script src="{{asset('assets/js/plugins/counterup.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/js/plugins/images-loaded.js')}}"></script>
<script src="{{asset('assets/js/plugins/isotope.js')}}"></script>
<script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.vticker-min.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.theia.sticky.js')}}"></script>
<script src="{{asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script>
{{-- <script src="{{asset('assets/js/plugins/jquery.elevatezoom.js')}}"></script> --}}
<!-- Template  JS -->
<script src="{{asset('assets/js/main.js?v=3.3')}}"></script>
<script src="{{asset('assets/js/shop.js?v=3.3')}}"></script>


  <script>
 function toggleDarkMode() {
    document.documentElement.classList.toggle('dark');
    console.log("Toggle Dark Mode Button Clicked");

    if (document.documentElement.classList.contains('dark')) {
        localStorage.setItem('theme', 'dark');
        console.log("Dark mode enabled");
    } else {
        localStorage.setItem('theme', 'light');
        console.log("Light mode enabled");
    }
}

// Load the preferred theme on page load
document.addEventListener('DOMContentLoaded', () => {
    if (localStorage.getItem('theme') === 'dark') {
        document.documentElement.classList.add('dark');
        console.log("Loaded dark mode");
    } else {
        document.documentElement.classList.remove('dark');
        console.log("Loaded light mode");
    }
});

    </script>


@livewireScripts
@stack('scripts')



{{-- <script>
    Echo.channel('notifications')
        .listen('NotificationSent', (event) => {
            alert('New notification: ' + event.notification);
            // Update your Livewire component here if needed
        });
</script> --}}


{{-- <script src="https://js.pusher.com/latest/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('3c6e097681e91b35515d', {
    cluster: 'mt1'
  });

  var channel = pusher.subscribe('notifications');
  channel.bind('NotificationSent', function(data) {
    alert(JSON.stringify(data));
  });
</script> --}}

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('3c6e097681e91b35515d', {
    cluster: 'mt1'
  });

  var channel = pusher.subscribe('notifications');
  channel.bind('NotificationSent', function(data) {
    // Use SweetAlert2 for modern notification UI
    Swal.fire({
  title: 'Success!',
  text: data.message,
  icon: 'success',
  timer: 8000,
  showConfirmButton: false,
  toast: true,
  position: 'top-end'
});
  });
</script>








</body>

</html>
