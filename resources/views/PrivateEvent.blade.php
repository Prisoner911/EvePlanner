@extends('layouts.main')



@section('main-section')

    <head>
        <link rel="stylesheet" href="{{ url('frontend/CSS/Events.css') }}" />

    </head>
    <!-- VIDEO -->
    <div class="vidContainer">
        <div class="videoDiv">
            <video autoplay loop muted plays-inline class="back-video" id="topVideo">
                <source src="{{ url('frontend/img/PrivateVideo.mp4') }}" type="video/mp4" />
            </video>
        </div>
    </div>

    <div class="top_container">
        <!--  card on Video -->
        <div class="innerContainer">
            <div class="on-video">
                <h1>Private</h1>

                <div class="imgLogo">
                    <img class="logoImg" src="https://i.postimg.cc/Pf74vKBZ/confetti.png" />
                </div>

                <div>
                    <p class="card-title"> WE CRAFT YOUR MEMORABLE PRIVATE CELEBRATIONS</p>
                    <br />
                </div>
                <p class="card-text">
                    At EvePlanner, we specialize in organizing all kinds of private events – from
                    birthdays and parties to anniversaries, baby showers, graduations, farewells, and seasonal
                    festivities.Our focus is on making event planning easy for our clients.
                </p>
                <p class="card-text">
                    Whether it's a big or small gathering, we take care of
                    each details. We create memorable experiences within your
                    budget, turning your events into cherished memories.
                </p>
            </div>
        </div>
    </div>

    <div class="mainBodyContent">


        <div class="heading text-center"
            style="
        background: linear-gradient(
          90deg,
          #e4fff6 0%,
          #e4fff6 20%,
          #bd95ee 100%,
          #cdd3ff 80%,
          #ffdcf1 100%
        );

      ">
            <h1 class="topic" style="font-weight: bold;">Private Events Service Offerings</h1>
        </div>
        <div class="slidingImg">
            <div class="slider">
                <!-- list of items -->
                <div class="list">
                    <div class="item active">
                        <img src="https://i.postimg.cc/y8FP0MSt/pricard.jpg" alt="" />
                        <div class="content">
                            <h2>Invitation Card</h2>
                            <p>
                                "Turn your invitations into works of art with our unique
                                designs, adding a touch of personalization to make your event
                                truly special."
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <img src="https://i.postimg.cc/Nf2bj9Gg/prideco.jpg" alt="" />
                        <div class="content">
                            <h2>Wedding Decoration</h2>
                            <p>
                                "Transform your wedding venue into a dreamland with our décor
                                services, creating a beautiful and personalized atmosphere that
                                reflects your love story."
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="https://i.postimg.cc/BbL5bk0h/prifood.jpg" alt="" />
                        <div class="content">
                            <h2>Food & Beverages</h2>
                            <p>
                                "Enjoy delicious cuisine tailored to your taste, with our
                                catering services making sure every bite is a delight, enhancing
                                the overall experience of your event."
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="https://i.postimg.cc/gJL5JJkC/img-light.jpg" alt="" />
                        <div class="content">
                            <h2>Lighting & Audio Visual</h2>
                            <p>
                                "Brighten up your event with our expert lighting and audio visuals."
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="https://i.postimg.cc/2SpGbk3n/priphoto.jpg" alt="" />
                        <div class="content">
                            <h2>Photography & <br> Videography</h2>
                            <p>
                                "Capture the moments that matter so that stay with you forever."
                            </p>
                        </div>
                    </div>
                </div>

                <!-- servive cards thumbnail -->
                <div class="thumbDiv">
                    <div class="thumbnail">
                        <div class="item active" id="img1">
                            <img src="https://i.postimg.cc/y8FP0MSt/pricard.jpg" alt="" />
                            <div class="content">Invitation Card Designing</div>
                        </div>

                        <!-- <div class="item" id="img2">
                                                                                                                                                <img src="https://i.postimg.cc/2STg9MKK/img-venue.jpg" alt="" />
                                                                                                                                                <div class="content">Venue Selection</div>
                                                                                                                                            </div> -->

                        <div class="item" id="img3">
                            <img src="https://i.postimg.cc/Nf2bj9Gg/prideco.jpg" alt="" />
                            <div class="content">Wedding Decoration</div>
                        </div>

                        <div class="item" id="img4">
                            <img src="https://i.postimg.cc/BbL5bk0h/prifood.jpg" alt="" />
                            <div class="content">Food and Beverages</div>
                        </div>

                        <div class="item" id="img5">
                            <img src="https://i.postimg.cc/gJL5JJkC/img-light.jpg" alt="" />
                            <div class="content">Lighting & Audio Visual</div>
                        </div>

                        <div class="item" id="img6">
                            <img src="https://i.postimg.cc/2SpGbk3n/priphoto.jpg" alt="" />
                            <div class="content">Photo/Video</div>
                        </div>
                    </div>
                </div>

                <div class="btnArrow">
                    <div class="arrows">
                        <button id="prev">
                            <i class="fa fa-angle-left"></i> </button>
                        <button id="next"><i class="fa fa-angle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="backFilter">
            <div class="card-body text-center p-4 registerdiv">
                <h5 class="card-title vision" style="color: white;">Your Vision, Our Creation</h5>
                <p class="card-text text-center visionTxt" style="color: white;">
                    "Let our creativity and expertise transform your events into
                    extraordinary experiences."
                </p>
                <div class="bookDiv">
                    <a href="{{ url('bookingpage') }}" class="bookBtn"><button>Book Now</button></a>
                </div>
            </div>
        </div>

        <section class="gallary" id="gallary">
            <h2 class="topic" style="color: white;">Photo Gallery</h2>
            <div class="galleryDiv">


                <div class="galleryPhotos">
                    <div class="grid_container">
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/GtD8r00d/pri1.jpg" class="card-img-top" alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/ZqDCdY4J/pri4.jpg" class="card-img-top" alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/nV9QqmXg/pri0.jpg" class="card-img-top" alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/VNNJv0y7/pri3.jpg" class="card-img-top" alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/NM52J9py/2.jpg" class="card-img-top" alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/RF6qQrZK/pri6.jpg" class="card-img-top" alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/WbRq84r3/pri5.jpg" class="card-img-top" alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/qRSh9J51/pri7.jpg" class="card-img-top" alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/t4pZ0mBG/steptodown-com826457.jpg" class="card-img-top"
                                alt="..." />
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- <div class="toTop">
        <button class="ToTopBtn"><a href="#videoDiv" style="text-decoration: none; color: red;">&#8593;</a></button>
    </div> --}}

    </div>

    <script src="{{ url('frontend/JS/videoControl.js') }}"></script>
    <script src="{{ url('frontend/JS/slider.js') }}"></script>
@endsection
