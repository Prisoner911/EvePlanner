@extends('layouts.main')

@section('main-section')
    <div class="AboutContainerDiv">
        <div class="centered">
            <h1>About Us</h1>
        </div>
    </div>

    <div class="content-wrapper">
        <div class="contentDiv" id="contentDivID">
            <div class="contentImg" id="contentImg">
                <img src="{{ url('frontend/img/pic2.jpg') }}" alt="pic1" class="about-image" />
            </div>
            <div class="aboutSectionDiv">
                <div class="about-section about-text" id="aboutContent">
                    <h2 class="about-title" style="text-align: center">About us</h2>
                    <p class="welcome-text">Welcome to Eve Planner</p>
                    <div class="contentText">
                        <p>
                            Immerse yourself in a wonderland of unique and creative
                            experiences with Eve-Planner, the ultimate event agency for
                            weddings, private parties and corporate events.
                        </p>
                        <p>
                            Indulge in an unparalleled experience with Eve-Planner, a creative
                            event agency specialized in orchestrating luxury parties and
                            corporate events. Our innovative approach goes beyond basic event
                            planning; we use your core objectives to infuse your brand values
                            into every detail, providing a unique live or digital experience
                            that will exceed all expectations. With our strong project
                            management, rigorous budgeting, and an exceptional technical
                            production team, we assure a beautifully executed event that
                            centres around an engaging theme and resonates with your vision.
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="{{ url('frontend/JS/script.js') }}"></script>
@endsection
