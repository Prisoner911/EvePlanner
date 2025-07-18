@extends('layouts.main')



@section('main-section')

    <head>
        <link rel="stylesheet" href="{{ url('frontend/CSS/bookingpage.css') }}">

    </head>

    <!-- FORM -->
    <div class="outerDiv">
        @if (session('success'))
            <script>
                alert("{{ session('success') }}")
            </script>
        @endif
        @if (session('error'))
            <script>
                alert("{{ session('error') }}")
            </script>
        @endif
        <div class="custom-container">
            <h1 class="title">Let's Make An Event</h1>
            <div>
                <p style="font-weight: 100; color: white">Please fill out this form, and we will get back to you shortly</p>
            </div>
            <form action="/bookingpage" method="post">
                @csrf
                <div class="user-details">

                    <div class="two-elements-in-one-line">
                        <div class="input-half">
                            <label class="details">First Name</label>
                            <input type="text" name="firstName" id="firstName">
                            <span class="text-danger">
                                @error('firstName')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="input-half">
                            <label class="details">Last Name</label>
                            <input type="text" name="lastName" id="lastName">
                            <span class="text-danger">
                                @error('lastName')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="two-elements-in-one-line">
                        <div class="input-half">
                            <label class="details">Email</label>
                            <input type="email" name="email" id="userEmail">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="input-half">
                            <label class="details">Phone Number</label>
                            <input type="tel" name="phoneNumber" id="userPhone" maxlength="10">
                            <span class="text-danger">
                                @error('phoneNumber')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>
                    <div class="two-elements-in-one-line">
                        <div class="input-half">
                            <label for="evetype" class="details">Event Type</label>
                            <select name="evetype" id="evetype">
                                <option value="select">Select</option>
                                <option value="wedding">Wedding</option>
                                <option value="private">Private</option>
                                <option value="corporate">Corporate</option>
                            </select>
                            @error('venue')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="input-half">
                            <label for="venue" class="details">Venue</label>
                            <select name="venue" id="venue">
                                <option value="select">Select</option>
                                <option value="own">Own</option>
                                <option value="affiliated">Affiliated</option>
                            </select>
                            @error('venue')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="input-box">
                        <label for="date" class="details">Date</label>
                        <input type="date" name="eventDate" id="eventDate">
                        <span class="text-danger">
                            @error('eventDate')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="input-box">
                        <label for="guests" class="details">Number of Guests</label>
                        <input type="number" name="numberOfGuests" id="numberOfGuests">
                        <span class="text-danger">
                            @error('numberOfGuests')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="input-half">
                        <label for="communication" class="details">Communication Method</label>
                        <select name="communication" id="Communication">
                            <option value="select">Select the way you want our agent to contact you</option>
                            <option value="VideoConference">Video Conference</option>
                            <option value="MeetingAtOffice">Meeting at Office</option>
                            <option value="OnSiteMeeting">On-Site Meeting</option>
                        </select>
                        <span class="text-danger">
                            @error('communication')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="two-elements-in-one-line">
                        <div class="input-half">
                            <label for="startTime" class="details">Event Start Time</label>
                            <input type="time" id="startTime" name="startTime" id="startTime">
                            <span class="text-danger">
                                @error('startTime')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="input-half">
                            <label for="endTime" class="details">Event End Time</label>
                            <input type="time" name="endTime" id="endTime">
                            <span class="text-danger">
                                @error('endTime')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="input-box">
                        <label for="services" class="details" id="Services">Services</label>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="service[]" value="Invitations"
                                    id="invitations">Invitations</label>
                            <label><input type="checkbox" name="service[]" value="Decoration"
                                    id="decoration">Decoration</label>
                            <label><input type="checkbox" name="service[]" value="Light & Audio" id="light_audio">Light
                                & Audio</label>
                            <label><input type="checkbox" name="service[]" value="Food & Beverage"
                                    id="food_beverage">Food & Beverage</label>
                            <label><input type="checkbox" name="service[]" value="Photography & Videography"
                                    id="photography">Photography & Videography</label>
                        </div>
                        <span class="text-danger">
                            @error('service')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                    <div class="input-box">
                        <label for="additionalComments" class="details">Additional Comments</label>
                        <textarea name="additionalComments" id="additionalComments" cols="60" rows="5"></textarea>
                        <span class="text-danger">
                            @error('additionalComments')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>

                </div>
                <div class="two-buttons-in-one-line">
                    <button type="reset" id="clearButton" class="clearButton btn btn-danger">Clear</button>
                    <button id="submitButton" class="submitButton btn btn-success" onclick="onSubmit()"
                        type="submit">Submit</button>
                </div>

        </div>
        </form>

    </div>
    </body>
    <script src="{{ url('frontend/JS/bookingpage.js') }}"></script>

    </html>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
