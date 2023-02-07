@extends('vega.master')
@section('content')


    <div class="popup">
        <div class="modal_">
            <button class="close"><i class="fas fa-times"></i></button>
            <img src="{{  asset('vegaasset/images/new/Group 43084.png') }}" alt="">
            <form id="comment_form" action="" method="post">
                <div class="form-group">
                    <label for="#n">Enter Your Name</label>
                    <input type="text" name="name" placeholder="Enter Your Name" id="n">
                </div>
                <div class="form-group">
                    <label for="#m">Enter Your Message</label>
                    <textarea name="message" id="m" placeholder="Enter Your Message" cols="30" rows="5"></textarea>
                </div>
                <button type="button" id="button_">Send</button>
        </div>
        <div class="ok">
            <p>Are you sure to send your request?</p>
            <div class="buttons">
                <button type="submit" >submit</button>
                <button type="button" id="button_canc">cancle</button>
            </div>
            </form>
        </div>

    </div>
    <section id="home" class="sec1 sec col-lg-12">
        <div class="container">
            <div class="vega_det">
                <p class="wow bounceInDown"><img src="{{ asset('vegaasset/images/logo without words.svg') }}" alt=""> EGA WEB</p>
                <p class="wow bounceInLeft">VEGA Team
                    A software team specializing in web development and creating unique and distinctive web pages
                    Our team has a high level of professionalism in executing clients' projects and providing great user experience</p>
                <p class="wow bounceInLeft"><span>VEGA</span> Team is professional in building systems, web</p>
            </div>
        </div>

    </section>
    <section id="services" class="sec2 sec col-lg-12">
        <div class="container">
            <h1>Our Services</h1>
            <p>Our services are part of the creative plan to satisfy our customers and meet their needs</p>
            <div class="cards_sec2 col-lg-12">
                <div class="card_first_design">
                    <img class=" bounceInDown" src="{{ asset('vegaasset/images/new/Group 42973.png') }}" alt="">
                    <h3>UI/UX Design</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In, minus nesciunt! Quaerat eius blanditiis quae facere totam aperiam, omnis molestiae aspernatur minus officiis, praesentium eos repellat enim tempora fugit doloribus?</p>
                </div>
                <div class="card_first_design">
                    <img class=" bounceInDown" src="{{ asset('vegaasset/images/new/svgexport-7 (2).svg') }}" alt="">
                    <h3>UI/UX Design</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In, minus nesciunt! Quaerat eius blanditiis quae facere totam aperiam, omnis molestiae aspernatur minus officiis, praesentium eos repellat enim tempora fugit doloribus?</p>
                </div>
                <div class="card_first_design">
                    <img class=" bounceInDown" src="{{ asset('vegaasset/images/new/Group 42972.svg') }}" alt="">
                    <h3>UI/UX Design</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In, minus nesciunt! Quaerat eius blanditiis quae facere totam aperiam, omnis molestiae aspernatur minus officiis, praesentium eos repellat enim tempora fugit doloribus?</p>
                </div>
            </div>
        </div>
    </section>
    <section id="about" class="next_sec sec">
        <div class="container">
            <h2>Why did you choose us?</h2>
            <p>Providing unparalleled IT business solution to maximum satisfaction</p>
            <div class="lists">
                <div class="list wow bounceInLeft" data-wow-delay="0.1s" >
                    <div class="item">
                        <img src="{{ asset('vegaasset/images/logo without words.svg') }}" alt="">
                    </div>
                    <div class="sentenceses">
                        <h3>Didicated team</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo, non provident quo, ad dolore cupiditate enim alias pariatur harum libero nihil sit praesentium.</p>
                    </div>
                </div>
                <div class="list wow bounceInLeft" data-wow-delay="0.2s" >
                    <div class="item">
                        <img src="{{ asset('vegaasset/images/logo without words.svg') }}" alt="">
                    </div>
                    <div class="sentenceses">
                        <h3>Respect the time</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo, non provident quo, ad dolore cupiditate enim alias pariatur harum libero nihil sit praesentium.</p>
                    </div>
                </div>
                <div class="list wow bounceInLeft" data-wow-delay="0.3s" >
                    <div class="item">
                        <img src="{{ asset('vegaasset/images/logo without words.svg') }}" alt="">
                    </div>
                    <div class="sentenceses">
                        <h3>Customer satisfaction</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo, non provident quo, ad dolore cupiditate enim alias pariatur harum libero nihil sit praesentium.</p>
                    </div>
                </div>
                <div class="list wow bounceInLeft" data-wow-delay=".4s" >
                    <div class="item">
                        <img src="{{ asset('vegaasset/images/logo without words.svg') }}" alt="">
                    </div>
                    <div class="sentenceses">
                        <h3>Work accuracy</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illo, non provident quo, ad dolore cupiditate enim alias pariatur harum libero nihil sit praesentium.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                <a href="{{route('all_project')}}" class="vall" id="contact">View All</a>
    </section>
    <div class="container">
        <div id="alreat">

        </div>
        <section  class="sec4 sec">
            <div class="dont">
                <img src="{{ asset('vegaasset/images/Group 42743.png') }}" alt="" />
                DON'T BE SHY
            </div>
            <p>What are you waiting for !! Contact us now</p>
            <form id="message-form">
                <div class="input-group">
                    <input id="one" type="text" class="inp" name="name" placeholder="Enter Your Name" />
                    <input id="tow" type="email" class="inp" name="email" placeholder="Enter Your Email" />
                </div>
                <textarea id="three" name="message" cols="30" rows="5" placeholder="Enter Your Message"></textarea>
                <input type="submit" value="Send Massage" />
            </form>
        </section>
    </div>
    <section class="sec5 ">
        <div class="container">
            <h1>Testimonials</h1>
            <p>Check what client say</p>
            <div class="contain_ mb-3">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="box_">
                                <span></span>
                                <div class="content_">
                                    <h3>Ahmed Bassam</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="box_">
                                <span></span>
                                <div class="content_">
                                    <h3>Ahmed Bassam</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="box_">
                                <span></span>
                                <div class="content_">
                                    <h3>Ahmed Bassam</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="box_">
                                <span></span>
                                <div class="content_">
                                    <h3>Ahmed Bassam</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="box_">
                                <span></span>
                                <div class="content_">
                                    <h3>Ahmed Bassam</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                        eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="swiper-pagination "></div>
                </div>

            </div>
        </div>
    </section>
    <div class="load">
        <div class="parent">
            <div class="light"></div>
            <div class="center_logo">
                <img class="l2" src="{{ asset('images/logo without words.svg') }}" alt="" />
            </div>
        </div>
    </div>

    <button class="comment"><i class="fas fa-comment"></i> <span>Add Comment</span></button>
@stop
@section('js')
    <script>
        new WOW().init();
        window.onscroll = function(){
            var len =array.length;
            while (--len && window.scrollY + 200 < array[len].offsetTop) {}
            arraylink.forEach(el=> el.classList.remove('act'))
            arraylink[len].classList.add('act')
            if(window.scrollY >= 50){
                header.style.background = "black"
                header.style.transition = "1s"
                btn_comment.style.opacity = "1"

            }else{
                btn_comment.style.opacity = "0"
                header.style.background = "transparent"
            }
        }
        btn_comment.onclick =function () {
            popup.style.display = "flex"
            modal.style.display = 'block'
            ok.style.display = "none"
        }
        send_btn.onclick =function () {
            modal.style.display = 'none'
            ok.style.display = "block"
        }
        button_canc.onclick =function () {
            popup.style.display = "none"
        }
        close.onclick = ()=>{
            popup.style.display = "none"
        }
    </script>
    <script>
        $('#message-form').submit(function(e){
            e.preventDefault();
            console.log('Error');
            $.ajax({
                    type : 'post',
                    url  : '{{route("contactpost")}}',
                    data : {
                        _token:'{{csrf_token()}}',
                        name :$('#one').val(),
                        email : $('#tow').val(),
                        message : $('#three').val(),
                    },
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            $('#alreat').text('sent succesfully').removeClass('alert alert-danger').addClass('alert alert-success');
                            $('#one').val('');
                            $('#tow').val('');
                            $('#three').val('');
                            console.log('true:', data);
                            $(".alert").fadeTo(2000, 500).slideUp(500, function(){
                                $(".alert").slideUp(500);
                            });
                        }else{
                            $('#alreat').val('');
                            $('#alreat').text(data.error.errorInfo).removeClass('alert alert-success').addClass('alert alert-danger');
                            console.log('error:', data);
                            $("#alreat").fadeTo(2000, 500).slideUp(500, function(){
                                $("#alreat").slideUp(500);
                            });}

                    },
                    error: function (data) {
                        console.log('error:', data);
                    }
                }

            )}
        )

    </script>

    <script>
        $('#comment_form').submit(function(e){
            e.preventDefault();
            $.ajax({
                    type : 'post',
                    url  : '{{route("commentpost")}}',
                    data : {
                        _token:'{{csrf_token()}}',
                        name :$('#n').val(),
                        message : $('#m').val(),
                    },
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            alert('sent successflly')
                            $('#n').val('');
                            $('#m').val('');


                        }else{
                            alert('sent Fail')

                        }

                    },
                    error: function (data) {
                        console.log('error:', data);
                    }
                }

            )}
        )

    </script>
@stop

