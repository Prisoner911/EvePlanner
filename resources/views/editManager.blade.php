@extends('ManagerLayouts.ManagerPage')




@section('company-main')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />


        <!-- Bootstrap CSS v5.2.1 -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

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
            }

            .subBtn {
                padding: 5px 20px;
            }

            .mainContainer {
                display: flex;
                justify-content: center;

            }

            .containerDiv {
                width: 100%;
                padding: 2rem;
                box-shadow: 0px 0px 15px 2px black;
                border-radius: 10px;
            }

            .inputOTP {
                border: 1px solid black;
            }

            .errorMessage {
                height: 40px;
            }

            .error {
                font-size: 1vw;
            }

            .radioDiv {
                border-radius: 5px;
            }

            .content {
                margin-bottom: 10px;
            }

            .countdown {
                font-size: 0.93vw;
                font-weight: bold;
            }

            @media screen and (max-width: 1024px) {
                .containerDiv {
                    width: 45%;
                    padding: 2rem;
                    box-shadow: 0px 0px 15px 2px black;
                    border-radius: 10px;
                    font-size: 4.3vw;
                }

                .content {
                    margin-bottom: 0px;
                }

                .inputOTP {
                    font-size: 3.8vw;
                }

                .errorMessage {
                    margin-bottom: 5px;
                }

                .error {
                    font-size: 3.1vw;
                }

                .countdown {
                    font-size: 3.1vw;
                    font-weight: bold;
                }

                .subBtn {
                    width: max-content;
                    padding: 0.5rem 1.5rem;
                    font-size: 3.1vw
                }
            }

            @media only screen and (max-width: 480px) {
                .containerDiv {
                    width: 76%;
                    padding: 2rem;
                    box-shadow: 0px 0px 15px 2px black;
                    border-radius: 10px;
                    font-size: 6.3vw;
                    font-weight: bold;
                }

                .inputOTP {
                    font-size: 4.8vw;
                }

                .error {
                    font-size: 4.1vw;
                    text-align: left
                }

                .countdown {
                    font-size: 4.1vw;
                    font-weight: bold;
                    text-align: center
                }
            }
        </style>



    </head>

    <body>

        {{-- @if (session('message'))
            <script>
                alert("{{ session('message') }}")
            </script>
        @endif --}}

        <div id="toastMessage" class="toastMessage">Manager details updated</div>

        <div class="mainContainer" style="margin-top: 2rem;">
            <div class="containerDiv">
                <h2 style="text-align: center;">Edit manager details.</h2>
                <form action="{{ route('manager.update', ['id' => $manager->ManagerID]) }}" method="POST">
                    @csrf
                    <div class="content">
                        <div class="mb-3">
                            <label for="managerID">Manager ID</label>
                            <input type="text" class="form-control" name="managerID" id="managerID" placeholder="Name"
                                value="{{ $manager->ManagerID }}" readonly />
                        </div>
                        <div class="mb-3">
                            <label for="managerName">Name</label>
                            <input type="text" class="form-control" name="managerName" id="managerName"
                                placeholder="Name" value="{{ $manager->Name }} {{ old('managerName') }}" />
                            <span class="text-danger">
                                @error('managerName')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="managerPhone">Phone no.</label>
                            <input type="text" class="form-control inputOTP" name="managerPhone" id="managerPhone"
                                placeholder="Enter Phone Number" maxlength="10"
                                value=" {{ $managerPhone }} {{ old('managerPhone') }}" />
                            <span class="text-danger">
                                @error('managerPhone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="managerEmail">Email</label>
                            <input type="email" class="form-control inputOTP" name="managerEmail" id="managerEmail"
                                placeholder="Enter email" value=" {{ $manager->Email }} {{ old('managerEmail') }}" />
                            <span class="text-danger">
                                @error('managerEmail')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="managerAddress">Manager's Address</label>
                            <textarea name="managerAddress" id="managerAddress" cols="2" rows="3">{{ $manager->Address }} {{ old('managerAddress') }}</textarea>
                            <span class="text-danger">
                                @error('managerAddress')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="radioDiv" style="border: 2px black solid; width: 100%; padding: 10px;">
                            <h5 style="text-align: center;">Access rights to customer data.</h5>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="managerStatus" id="option1"
                                    value="no" {{ $manager->Access_Rights == 'no' ? 'checked' : '' }} />
                                <label class="form-check-label" for="option1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="managerStatus" id="option2"
                                    value="yes" {{ $manager->Access_Rights == 'yes' ? 'checked' : '' }} />
                                <label class="form-check-label" for="option2">Yes</label>
                            </div>
                            <span class="text-danger">
                                @error('mamagerStatus')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="mainContainer">
                        <button class="btn btn-success subBtn" type="submit">Update</button>
                    </div>
            </div>



            </form>
        </div>
        </div>



    </body>

    </html>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="{{ url('frontend/JS/submission.js') }}"></script>
@endsection
