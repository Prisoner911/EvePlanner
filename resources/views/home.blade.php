@extends('layouts.main')



@section('main-section')
    @if (session('success'))
        <script>
            alert('{{ session('success') }}');
        </script>
    @endif
    <div class="vidDiv" id="vidDiv">
        <div class="vid">
            <video src="{{ url('frontend/img/EventMngLow.mp4') }}" autoplay loop muted plays-inline class="backgroundVideo"
                id="topVideo"></video>
        </div>
    </div>


    <div class="banner_div">
        <div class="innerBanner">
            <img src="https://i.postimg.cc/rFq8yQmC/logo.png" alt="" class="banner_logo">
            <img src="https://i.postimg.cc/W3nVz2K5/eveplannerbg.png" alt="" class="bannerNamePic">
            <div class="visionDiv">
                <p class="vision">Envisioning a world where every gathering becomes a cherished memory, crafted with
                    innovation, passion, and seamless precision.</p>
            </div>

        </div>
    </div>

    <div class="offers">
        <p class="offertxt"><span class="discount">10% OFF</span> if you choose one of our affiliated venues!</p>
        <p class="offertxt" style="text-decoration: underline;">Some of our popular venues</p>
        <div class="venueCarouseldiv">
            <div id="venueCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active carouselVenue" data-bs-interval="3000">
                        <img src="{{ url('frontend/img/venues/venue1.png') }}" class="venueImg d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item carouselVenue" data-bs-interval="3000">
                        <img src="{{ url('frontend/img/venues/venue2.png') }}" class="venueImg d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item carouselVenue" data-bs-interval="3000">
                        <img src="{{ url('frontend/img/venues/venue3.png') }}" class="venueImg d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item carouselVenue" data-bs-interval="3000">
                        <img src="{{ url('frontend/img/venues/venue4.png') }}" class="venueImg d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item carouselVenue" data-bs-interval="3000">
                        <img src="{{ url('frontend/img/venues/venue5.png') }}" class="venueImg d-block w-100"
                            alt="...">
                    </div>
                    <div class="carousel-item carouselVenue" data-bs-interval="3000">
                        <img src="{{ url('frontend/img/venues/venue6.png') }}" class="venueImg d-block w-100"
                            alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#venueCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#venueCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

    </div>

    <div class="events" id="services">
        <div class="txt">
            <p class="evetxt">WHAT WE OFFER</p>
        </div>
        <div class="cards">

            <a href="{{ url('WeddingEvent') }}" style="text-decoration: none;">
                <div class="eventCard">

                    <div class="Wedding">

                        <div class="hoveringCard">
                            <img src="https://i.postimg.cc/LXwxSTSz/wedding-BG.png" alt="" class="eventCardLogo">
                        </div>
                        <h3>Weddings</h3>
                        <hr>
                        <p>Explore our wedding venues and services. Make your dream wedding come true.</p>

                    </div>

                </div>
            </a>


            <a href="{{ url('PrivateEvent') }}" style="text-decoration: none;">
                <div class="eventCard">

                    <div class="Private">
                        <div class="hoveringCard">
                            <img src="https://i.postimg.cc/jdST1mXL/confetti-BG.png" alt="" class="eventCardLogo1">
                        </div>
                        <h3>Private</h3>
                        <hr>
                        <p>Check out some of the best places and services for your private events.</p>
                    </div>

                </div>
            </a>


            <a href="{{ url('CorporateEvent') }}" style="text-decoration: none;">
                <div class="eventCard">

                    <div class="Corporate">
                        <div class="hoveringCard">
                            <img src="https://i.postimg.cc/rppjtbF1/corporate-BG.png" alt="" class="eventCardLogo2">
                        </div>
                        <h3>Corporate</h3>
                        <hr>
                        <p>Hold your meetings, office parties, send-offs, etc., and create memories with us.</p>

                    </div>

                </div>
            </a>

        </div>
    </div>




    <div class="raterDiv">
        <h1 class="raterHead">Our top 3 recent ratings</h1>
        <div class="containerDivRate text-center">
            <div class="row rowRate">
                @foreach ($ratings as $index => $rating)
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 g-3 ratings slideRating{{ $index + 1 }}"
                        id="column{{ $index + 1 }}">
                        <div class="header">
                            <p style="font-weight: bold;" class="userName">{{ $rating->Name }}</p>
                            <p style="color: grey; font-weight: bold;" class="dateP">
                                {{ $rating->created_at->format('d/m/y') }}</p>
                        </div>
                        <div class="divBody">
                            <div class="ratings1">

                                @php
                                    $stars = $rating->Rating;
                                @endphp
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $stars)
                                        <span class="stars">&#9733;</span>
                                    @else
                                        <span class="stars">&#9734;</span>
                                    @endif
                                @endfor
                                <p>{{ $rating->Comments }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>


    </div>





    {{--
    <div class="toTop">
        <button class="ToTopBtn"><a href="#vidDiv" style="text-decoration: none; color: red;">&#8593;</a></button>
    </div> --}}


    <script>
        if (window.innerWidth > 768) {
            window.addEventListener('scroll', function() {
                const ratings = document.querySelector('.ratings');
                const ratingsClass1 = document.querySelector('.slideRating1');
                const ratingsClass2 = document.querySelector('.slideRating2');
                const ratingsClass3 = document.querySelector('.slideRating3');
                const ratingsPosition = ratings.getBoundingClientRect().top;
                const windowHeight = window.innerHeight;

                if (ratingsPosition < windowHeight) {
                    ratingsClass1.classList.add('slideRateLeft');
                    ratingsClass2.classList.add('appearRate');
                    ratingsClass3.classList.add('slideRateRight');
                }
            });
        }
    </script>
@endsection
