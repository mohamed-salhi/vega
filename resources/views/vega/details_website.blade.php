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
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
    />
    <style>
    </style>
</head>
<body>
<header class="header" style="top: 0">
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
<div class="load">
    <div class="parent">
        <div class="light"></div>
        <div class="center_logo">
            <img class="l2" src="images/logo without words.svg" alt="" />
        </div>
    </div>
</div>
<main>
    <div class="details">
        <div class="container">
            <div class="desc col-lg-3">
                <a href=""><i class="fas fa-play-circle"></i> See Our Video</a>
                <p>Application Development <br><span>{{$project->name}}</span></p>
                <p>
                    {{$project->dest}}
                </p>
                <div class="rate">
                    <span>Rate</span>
                    <div class="rate inputs">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" name="rate" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
            </div>
            <div class="panner col-lg-9" style="background-image: url({{asset('upload/images/'.$project->image)}})">
            </div>
        </div>

        <div class="Another_image col-lg-12">
            <div class="container">
                <h1>Another Image</h1>
                <div class="templates col-lg-12">

                  @foreach($alpum as $item)

                        <div class="card_template" style="background-image:  url({{asset('upload/images/'.$item)}})">

                        </div>
                    @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="sec3">
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
                        <button class="tab  {{$loop->index==0?'active':''}}">{{$item->name}}</button>
                    @endforeach
                </div>
                @php
                    $count=$Category->count();
                @endphp
                    <!-- Tab Content  -->

                @for($i=0;$i<$count;$i++)
                    <div class="tab-content  {{$i==0?'active':'hidden'}}">
                        <div class="cards_">

                            @foreach($Category[$i]->project as $ii)
                                @if($loop->index<=5)
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
                                @endif

                            @endforeach

                        </div>
                    </div>
        @endfor
    </section>

</main>
<footer>
    <div class="container">
        <div class="foot">
            <div class="logo_foot">
                <img src="{{asset('vegaasset/images/logo without words.svg')}}" alt="" />
            </div>
            <div class="two_div">
                <div class="links_social">
                    <a href=""><i class="fab fa-facebook-square"></i></a>
                    <a href=""><i class="fab fa-instagram-square"></i></a>
                    <a href=""><i class="fab fa-twitter-square"></i></a>
                    <a href=""><i class="fab fa-github-square"></i></a>
                </div>
                <div class="description">
                    <p>
                        Providing unparalleled IT business solution to maximum
                        satisfaction
                    </p>
                    <p>
                        <span>VEGA</span> Team is professional in building systems, web
                    </p>
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
<script src="{{asset('vegaasset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('vegaasset/js/wow.min.js')}}"></script>
<script src="{{asset('vegaasset/js/myscript.js')}}"></script>
<script>
    new WOW().init();
</script>
</body>
</html>
