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
                <source src="{{ url('frontend/img/WeddingVideo.mp4') }}" type="video/mp4" />
            </video>
        </div>
    </div>

    <div class="top_container">
        <!--  card on Video -->
        <div class="innerContainer">
            <div class="on-video">
                <h1>Wedding</h1>

                <div class="imgLogo">
                    <img class="logoImg" src="https://i.postimg.cc/LXwxSTSz/wedding-BG.png" />
                </div>

                <div>
                    <p class="card-title">PLAN YOUR DREAM DESTINATION WEDDINGS</p>
                    <br />
                </div>
                <p class="card-text">
                    Your premier event planning destination, dedicated to crafting
                    unforgettable moments.
                </p>
                <p class="card-text">
                    Whether it's an intimate home wedding or a grand celebration, we
                    specialize in bringing your dreams to life. With meticulous
                    attention to detail, EvePlanner guarantees that every moment
                    reflects your unique style and preferences.
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
        );">
            <h1 class="topic" style="font-weight: bold;">Wedding Events Service Offerings</h1>
        </div>
        <div class="slidingImg">
            <div class="slider">
                <!-- list of items -->
                <div class="list sliderList">
                    <div class="item active">
                        <img src="https://i.postimg.cc/hGj6kMFP/img-card.jpg" alt="" />
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
                        <img src="https://i.postimg.cc/2STg9MKK/img-venue.jpg" alt="" />
                        <div class="content">
                            <h2>Venue Selection</h2>
                            <p>
                                "Let us find the perfect venue for your event, ensuring the
                                setting is just right for your occasion, whether it's an
                                intimate gathering or a grand celebration."
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="https://i.postimg.cc/5tRTbv15/img-decor.jpg" alt="" />
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
                        <img src="https://i.postimg.cc/htKHrcpm/img-food.jpg" alt="" />
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
                                "Brighten up your event with our expert lighting and
                                audio-visual touches, creating an atmosphere that captivates and
                                adds an extra layer of magic."
                            </p>
                        </div>
                    </div>

                    <div class="item">
                        <img src="https://i.postimg.cc/CMqTMvRR/img-photoss.jpg" alt="" />
                        <div class="content">
                            <h2>Photography & <br> Videography</h2>
                            <p>
                                "Capture the moments that matter with our skilled photographers
                                and videographers, turning your special occasions into cherished
                                memories to relive again and again."
                            </p>
                        </div>
                    </div>
                </div>

                <!-- servive cards thumbnail -->
                <div class="thumbDiv">
                    <div class="thumbnail">
                        <div class="item active" id="img1">
                            <img src="https://i.postimg.cc/hGj6kMFP/img-card.jpg" alt="" />
                            <div class="content">Invitation Card Designing</div>
                        </div>

                        <div class="item" id="img2">
                            <img src="https://i.postimg.cc/2STg9MKK/img-venue.jpg" alt="" />
                            <div class="content">Venue Selection</div>
                        </div>

                        <div class="item" id="img3">
                            <img src="https://i.postimg.cc/5tRTbv15/img-decor.jpg" alt="" />
                            <div class="content">Wedding Decoration</div>
                        </div>

                        <div class="item" id="img4">
                            <img src="https://i.postimg.cc/htKHrcpm/img-food.jpg" alt="" />
                            <div class="content">Food and Beverages</div>
                        </div>

                        <div class="item" id="img5">
                            <img src="https://i.postimg.cc/gJL5JJkC/img-light.jpg" alt="" />
                            <div class="content">Lighting & Audio Visual</div>
                        </div>

                        <div class="item" id="img6">
                            <img src="https://i.postimg.cc/kXPr2xSf/img-photos.jpg" alt="" />
                            <div class="content">Photo/Video</div>
                        </div>
                    </div>
                </div>

                <div class="btnArrow">
                    <div class="arrows">
                        <button id="prev">
                            < </button>
                                <button id="next">></button>
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
                            <img src="https://i.postimg.cc/yNyttd8B/wed9.jpg" loading = "lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/9Mf8kYkt/wed10.jpg" loading = "lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/Kzcw221T/wed7.jpg" loading = "lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/5NQG1p2s/wed2.jpg" loading = "lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/QC968xhF/wed5.png" loading = "lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/KjRW1Drv/wed4.jpg" loading = "lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/h4rr6t74/wed8.jpg" loading = "lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/Hnhfzhsy/wed3.jpg" loading = "lazy" class="card-img-top"
                                alt="..." />
                        </div>
                        <div class="grid_item">
                            <img src="https://i.postimg.cc/FRPqFBSB/wed11.jpg" loading = "lazy" class="card-img-top"
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
