<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vega Web</title>
    <link rel="stylesheet" href="{{asset('vegaasset/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('vegaasset/css/all.css')}}" />
    <link rel="stylesheet" href="{{asset('vegaasset/css/animate.css')}}" />
    <link rel="stylesheet" href="{{asset('vegaasset/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('vegaasset/css/hover-min.css')}}" />
    <link rel="stylesheet" href="{{asset('vegaasset/css/font-awesome.min.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/{{asset('vegaasset/css/all.min.css')}}" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.js')}}delivr.net/npm/swiper@8/swiper-bundle.min.css')}}" />

</head>
<body>
<header class="header" style="top: 0;">
    <div class="container">
        <div class="logo">
            <img src="{{asset('vegaasset/images/logo without words.svg')}}" alt="" />
        </div>
        <div class="nav">
            <a id="links" href="index.html" class="hvr-float-shadow">Home</a>
            <a id="links" href="#home" class="hvr-float-shadow">Services</a>
            <a id="links" href="#about" class="hvr-float-shadow">About Us</a>
            <a id="links" href="#contact" class="hvr-float-shadow">Contact Us</a>
        </div>
        <button>Lets Talk</button>
    </div>
</header>


<section class="sec3" style="margin-top: 150px;">
    <div class="container">
        <h1>Our Portfolio</h1>
        <p>
            A list of our works that we are proud to implement for our customers
            as required, with high accuracy and on time
        </p>

        <div class="tab-container col-lg-12">
            <!--  Tab Buttons  -->
            <div class="tabs">

                @foreach($Category as $item)
                    <button class="tab {{$loop->index==0?'active':''}}" >{{$item->name}}</button>
                @endforeach
            </div>
            @php
                $count=$Category->count();
            @endphp
                <!-- Tab Content  -->

            @for($i=0;$i<$count;$i++)
                <div class="tab-content {{$i==0?'active':'hidden '}}">
                    <div class="cards_">

                        @foreach($Category[$i]->project as $ii)
                                <div class="card_ card_1">
                                    <a href="{{route('DetailsProject',$ii->id)}}" class="layer_hov">
                                        <div class="one">
                                            <h5>Application Development</h5>
                                            <span>{{$ii->name}}</span>
                                        </div>
                                        <div class="two">
                                            <p>
                                                {{$ii->desc}}.
                                            </p>

                                            <i class="fa-solid fa-arrow-right-long"></i>
                                        </div>
                                    </a>
                                </div>


                        @endforeach

                    </div>
                </div>
            @endfor
            <a href="{{route('all_project')}}" class="vall" id="contact">View All</a>
</section>



<div class="load">
    <div class="parent">
        <div class="light"></div>
        <div class="center_logo">
            <img class="l2" src="images/logo without words.svg" alt="" />
        </div>
    </div>
</div>
<footer>
    <div class="container">
        <div class="foot">
            <div class="logo_foot">
                <img src="images/logo without words.svg" alt="">
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
            <a class="topbtn"><i class="fas fa-arrow-circle-up"></i></a>
        </div>
        <div class="foot_btm">
            <p>© All Rights Reserved 2022</p>
            <div class="lnks">
                <a href="">Privacy Policy</a><a href="">Terms of Service</a>
            </div>
        </div>
    </div>
</footer>
<script src="{{asset('vegaasset/js/jquery-3.6.0.min.js')}}"></script>
<script src="https://cdn.js')}}delivr.net/npm/swiper@8/swiper-bundle.min.js')}}"></script>

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
<script src="{{asset('vegaasset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vegaasset/js/wow.min.js')}}"></script>
<script src="{{asset('vegaasset/js/myscript.js')}}"></script>
<script>
    new WOW().init();
</script>
</body>
</html>
