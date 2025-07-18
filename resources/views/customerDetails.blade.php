@extends('ManagerLayouts.ManagerPage')




@section('company-main')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form</title>
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=WindSong&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


        <link href="https://fonts.googleapis.com/css2?family=Allura&family=Lato&display=swap" rel="stylesheet">
        <style>
            .toastMessage {
                position: fixed;
                bottom: 20px;
                left: 50%;
                transform: translateX(-50%);
                background-color: #4CAF50;
                color: white;
                padding: 15px 20px;
                border-radius: 5px;
                display: none;
                z-index: 111111111;
            }
        </style>
    </head>


    <div id="toastMessage" class="toastMessage">Details updated successfully</div>

    <div class="FormDiv">
        <div class="Form-container">
            <h1 class="title">Customer Details</h1>
            <div class="user-details">
                <form action="/customerDetails/update" method="post">
                    @csrf
                    <div class="two-elements-in-one-line">
                        <div class="input-half">
                            <label class="details">ID</label>
                            <input type="text" name="id" id="id" value="{{ $customer->id }}" readonly>
                        </div>

                        <div class="input-half">
                            <label class="details">Application No.</label>
                            <input type="text" name="ApplicationNo" id="ApplicationNo"
                                value="{{ $customer->ApplicationNo }}" readonly>
                        </div>
                    </div>
                    <div class="two-elements-in-one-line">
                        <div class="input-half">
                            <label class="details">First Name</label>
                            <input type="text" name="firstName" id="firstName" value="{{ $customer->FirstName }}">
                        </div>

                        <div class="input-half">
                            <label class="details">Last Name</label>
                            <input type="text" name="lastName" id="lastName" value="{{ $customer->LastName }}">
                        </div>
                    </div>
                    <div class="two-elements-in-one-line">
                        <div class="input-half">
                            <label class="details">Email</label>
                            <input type="email" name="email" id="userEmail" value="{{ $customer->email }}">
                        </div>

                        <div class="input-half">
                            <label class="details">Phone Number</label>
                            <input type="tel" name="phoneNumber" id="userPhone" value="{{ $customerPhone }}">
                        </div>
                    </div>
                    <div class="two-elements-in-one-line">
                        <div class="input-half">
                            <label for="evetype" class="details">Event Type</label>
                            <select name="evetype" id="evetype">
                                <option value="select" {{ $customer->EventType == 'select' ? 'selected' : '' }}>Select
                                </option>
                                <option value="wedding" {{ $customer->EventType == 'wedding' ? 'selected' : '' }}>Wedding
                                </option>
                                <option value="private" {{ $customer->EventType == 'private' ? 'selected' : '' }}>Private
                                </option>
                                <option value="corporate" {{ $customer->EventType == 'corporate' ? 'selected' : '' }}>
                                    Corporate
                                </option>
                            </select>
                        </div>

                        <div class="input-half">
                            <label for="venue" class="details">Venue</label>
                            <select name="venue" id="venue">
                                <option value="select" {{ $customer->Venue == 'select' ? 'selected' : '' }}>Select</option>
                                <option value="own" {{ $customer->Venue == 'own' ? 'selected' : '' }}>Own</option>
                                <option value="affiliated" {{ $customer->Venue == 'affiliated' ? 'selected' : '' }}>
                                    Affiliated
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="input-box">
                        <label for="date" class="details">Date</label>
                        <input type="date" name="eventDate" id="eventDate" value="{{ $customer->EventDate }}">
                    </div>

                    <div class="input-box">
                        <label for="guests" class="details">Number of Guests</label>
                        <input type="number" name="numberOfGuests" id="numberOfGuests"
                            value="{{ $customer->GuestsAmount }}">
                    </div>

                    <div class="input-half">
                        <label for="communication" class="details">Communication Method</label>
                        <select name="communication" id="Communication">
                            <option value="select" {{ $customer->CommunicationMethod == 'select' ? 'selected' : '' }}>
                                Select
                            </option>
                            <option value="VideoConference"
                                {{ $customer->CommunicationMethod == 'VideoConference' ? 'selected' : '' }}>Video
                                Conference
                            </option>
                            <option value="MeetingAtOffice"
                                {{ $customer->CommunicationMethod == 'MeetingAtOffice' ? 'selected' : '' }}>Meeting at our
                                Office</option>
                            <option value="OnSiteMeeting"
                                {{ $customer->CommunicationMethod == 'OnSiteMeeting' ? 'selected' : '' }}>On-Site Meeting
                            </option>
                        </select>
                    </div>

                    <div class="two-elements-in-one-line">
                        <div class="input-half">
                            <label for="startTime" class="details">Start Time</label>
                            <input type="time" id="startTime" name="startTime" id="startTime"
                                value="{{ $customer->StartTime }}">
                        </div>
                        <div class="input-half">
                            <label for="endTime" class="details">End Time</label>
                            <input type="time" name="endTime" id="endTime" value="{{ $customer->EndTime }}">
                        </div>
                    </div>

                    <div class="input-box">
                        <label for="services" class="details" id="Services">Services</label>
                        <div class="checkbox-group">
                            <label><input type="checkbox" name="service[]" id="invitations"
                                    {{ in_array('Invitations', $checkboxData, true) ? 'checked' : '' }}
                                    value="Invitations">Invitations</label>
                            <label><input type="checkbox" name="service[]" id="decoration"
                                    {{ in_array('Decoration', $checkboxData, true) ? 'checked' : '' }}
                                    value="Decoration">Decoration</label>
                            <label><input type="checkbox" name="service[]" id="light_audio"
                                    {{ in_array('Light & Audio', $checkboxData, true) ? 'checked' : '' }}
                                    value="Light & Audio">Light &
                                Audio</label>
                            <label><input type="checkbox" name="service[]" id="food_beverage"
                                    {{ in_array('Food & Beverage', $checkboxData, true) ? 'checked' : '' }}
                                    value="Food & Beverage">Food &
                                Beverage</label>
                            <label><input type="checkbox" name="service[]" id="photography"
                                    {{ in_array('Photography & Videography', $checkboxData, true) ? 'checked' : '' }}
                                    value="Photography & Videography">Photography
                                & Videography</label>
                        </div>
                    </div>

                    <div class="input-box">
                        <label for="additionalComments" class="details">Additional Comments</label>
                        <textarea name="additionalComments" id="additionalComments" cols="60" rows="5">{{ $customer->AdditionalComments }}</textarea>
                    </div>

            </div>
            <div class="two-buttons-in-one-line">
                <button id="submitButton" class="submitButton" type="submit">Update</button>
            </div>

        </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="{{ url('frontend/JS/submission.js') }}"></script>
@endsection
