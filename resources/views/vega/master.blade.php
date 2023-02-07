<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vega Web</title>
    <link rel="stylesheet" href="{{ asset('vegaasset/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('vegaasset/css/all.css') }}" />
    <link rel="stylesheet" href="{{ asset('vegaasset/css/animate.css') }}" />
    <link rel="stylesheet" href="{{asset('vegaasset/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('vegaasset/css/hover-min.css') }}" />
    <link rel="stylesheet" href="{{ asset('vegaasset/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />

</head>
<body>
<header class="header">
    <div class="container">
        <div class="logo">
            <img src="{{ asset('vegaasset/images/logo without words.svg') }}" alt="" />
        </div>
        <div class="nav">
            <a id="links" href="index.html" class="hvr-float-shadow">Home</a>
            <a id="links" href="#services" class="hvr-float-shadow">Services</a>
            <a id="links" href="#about" class="hvr-float-shadow">About Us</a>
            <a id="links" href="#contact" class="hvr-float-shadow">Contact Us</a>
        </div>
        <button><i class="fab fa-whatsapp"></i><span>Lets Talk</span></button>
    </div>
</header>
   @yield('content')
<footer>
    <div class="container">
        <div class="foot">
            <div class="logo_foot">
                <img src="{{ asset('vegaasset/images/logo without words.svg') }}" alt="">
            </div>
            <div class="two_div">
                <div class="links_social">
                    <a href=""><i class="fab fa-facebook-square"></i></a>
                    <a href=""><i class="fab fa-instagram-square"></i></a>
                    <a href=""><i class="fab fa-twitter-square"></i></a>
                    <a href=""><i class="fab fa-github-square"></i></a>
                </div>
                <div class="description">
                    <p>Providing unparalleled IT business solution to maximum satisfaction</p>
                    <p><span>VEGA</span> Team is professional in building systems, web</p>
                </div>
            </div>
            <a class="topbtn" href="#home"><i class="fas fa-arrow-circle-up"></i></a>
        </div>
        <div class="foot_btm">
            <p>© All Rights Reserved 2022</p>
            <div class="lnks">
                <a href="">Privacy Policy</a><a href="">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
<script src="{{ asset('vegaasset/js/jquery-3.6.0.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->
<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
<script src="{{ asset('vegaasset/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vegaasset/js/wow.min.js') }}"></script>
<script src="{{ asset('vegaasset/js/myscript.js') }}"></script>
@yield('js')
</body>
</html>
