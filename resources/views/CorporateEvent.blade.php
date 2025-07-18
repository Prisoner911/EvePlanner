@extends('layouts.main')



@section('main-section')

    <head>
        <link rel="stylesheet" href="{{ url('frontend/CSS/Events.css') }}" />
        <link rel="icon" type="image/png" href="{{ url('frontend/img/favicon/favicon-16x16.png') }}">
        <link rel="icon" type="image/png" href="{{ url('frontend/img/favicon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" href="{{ url('frontend/img/favicon/android-chrome-192x192.png') }}">
        <link rel="icon" type="image/png" href="{{ url('frontend/img/favicon/android-chrome-512x512.png') }}">

    </head>
    <!-- VIDEO -->
    <div class="vidContainer">
        <div class="videoDiv">
            <video autoplay loop muted plays-inline class="back-video" id="topVideo">
                <source src="{{ url('frontend/img/CooporateVideo.mp4') }}" type="video/mp4" />
            </video>
        </div>
    </div>

    <div class="top_container">
        <!--  card on Video -->
        <div class="innerContainer">
            <div class="on-video">
                <h1>Corporate</h1>

                <div class="imgLogo">
                    <img class="logoImg" src="https://i.postimg.cc/rppjtbF1/corporate-BG.png" />
                </div>

                <div>
                    <p class="card-title">WE EXECUTE YOUR BUSINESS VISSION</p>
                    <br />
                </div>
                <p class="card-text">
                    Organising and managing all the requirements for Corporate Events consisting of Meetings, Incentive
                    Programs and Conferences including Exhibitions and Expo’s.
                </p>
                <p class="card-text">
                    Right from understanding the objective of the
                    corporate event to finding the ideal venue, finest event tech support and supervising all the other
                    event related things, EvePlanner will cater and handle your Corporate Events with flawless
                    perfection.
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
            <h1 class="topic" style="font-weight: bold;">Corporate Events Service Offerings</h1>
        </div>


        <div class="slidingImg">
            <div class="slider">
                <!-- list of items -->
                <div class="list">
                    <div class="item active">
                        <img src="https://i.postimg.cc/mDKtRfxV/cor1.jpg" alt="" />
                        <div class="content">
                            <h2>Product Launches</h2>
                            <p>
                                Make a lasting impression with impactful product launches that showcase your brand's
                                innovation
                                and excellence.
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="https://i.postimg.cc/sgCDw4yQ/cor2.jpg" alt="" />
                        <div class="content">
                            <h2>Professional Seminars</h2>
                            <p>
                                Engage your audience and industry experts through insightful seminars designed for
                                knowledge-sharing and networking.
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="https://i.postimg.cc/xT4F26q8/cor3.jpg" alt="" />
                        <div class="content">
                            <h2>Strategic Conferences</h2>
                            <p>
                                Elevate your business gatherings with meticulously planned conferences that align with your
                                corporate objectives.
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="https://i.postimg.cc/FRCbkg1z/cor5.jpg" alt="" />
                        <div class="content">
                            <h2>Milestone Celebrations</h2>
                            <p>
                                Celebrate your company's achievements and milestones in style, creating memorable moments
                                for
                                your team and stakeholders.
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="https://i.postimg.cc/SsgJP2V0/cor4.jpg" alt="" />
                        <div class="content">
                            <h2>Exhibitions</h2>
                            <p>
                                Showcase your products and services to a wider audience through
                                flawlessly executed exhibitions.
                            </p>
                        </div>
                    </div>

                </div>

                <!-- servive cards thumbnail -->
                <div class="thumbDiv">
                    <div class="thumbnail">
                        <div class="item active" id="img1">
                            <img src="https://i.postimg.cc/mDKtRfxV/cor1.jpgs" alt="" />
                            <div class="content">Product Launches</div>
                        </div>

                        <div class="item" id="img2">
                            <img src="https://i.postimg.cc/sgCDw4yQ/cor2.jpg" alt="" />
                            <div class="content">Professional Seminars</div>
                        </div>

                        <div class="item" id="img3">
                            <img src="https://i.postimg.cc/xT4F26q8/cor3.jpg" alt="" />
                            <div class="content">Strategic Conferences</div>
                        </div>

                        <div class="item" id="img4">
                            <img src="https://i.postimg.cc/FRCbkg1z/cor5.jpg" alt="" />
                            <div class="content">Milestone Celebrations</div>
                        </div>

                        <div class="item" id="img5">
                            <img src="https://i.postimg.cc/SsgJP2V0/cor4.jpg" alt="" />
                            <div class="content">Exhibitions</div>
                        </div>
                    </div>
                </div>

                <div class="btnArrow">
                    <div class="arrows">
                        <button id="prev">
                            < </button>
                                <button id="next"> > </button>
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
                            <img src="https://i.postimg.cc/brLpSZRx/cor11.jpg" loading="lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/SxHq9Fcv/cor12.jpg" loading="lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/gcVvqjc5/cor13.png" loading="lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/8cFN0wKp/cor14.jpg" loading="lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/5t192B0g/cor15.jpg" loading="lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/MKL5c19D/cor17.jpg" loading="lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/VsFYVhcJ/cor18.jpg" loading="lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/hj1qNX6k/cor19.jpg" loading="lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/s2FdXPrF/cor20.jpg" loading="lazy" class="card-img-top"
                                alt="..." />
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <script src="{{ url('frontend/JS/videoControl.js') }}"></script>
    <script src="{{ url('frontend/JS/slider.js') }}"></script>
    <script src="{{ url('frontend/JS/navslide.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
