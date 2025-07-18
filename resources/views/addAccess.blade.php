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
            .subBtn {
                padding: 5px 20px;
            }

            .mainContainer {
                display: flex;
                justify-content: center;

            }

            .containerDiv {
                width: 80%;
                padding: 2rem;
                box-shadow: 0px 0px 15px 5px black, 0px 0px 50px 2px rgb(144, 233, 255) inset;
                border-radius: 10px;
                backdrop-filter: blur(3px);

            }

            .inputOTP {
                border: 1px solid black;
                background-color: transparent;
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

        @if (session('status'))
            <script>
                alert("{{ session('status') }}")
            </script>
        @endif


        <div class="mainContainer" style="margin-top: 2rem;">
            <div class="containerDiv">
                <h2 style="text-align: center;">Add agent to the database.</h2>
                <form action="/managerAccess/addAccess" method="POST">
                    @csrf
                    <div class="content">
                        <div class="mb-3">
                            <input type="text" class="form-control inputOTP" name="agentName" id="agentName"
                                placeholder="Name" value="{{ old('agentName') }}" />
                            <span class="text-danger">
                                @error('agentName')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control inputOTP" name="agentPhone" id="agentPhone"
                                placeholder="Enter Phone Number" maxlength="10" value="{{ old('agentPhone') }}" />
                            <span class="text-danger">
                                @error('agentPhone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <input type="email" class="form-control inputOTP" name="agentEmail" id="agentEmail"
                                placeholder="Enter email" value="{{ old('agentEmail') }}" />
                            <span class="text-danger">
                                @error('agentEmail')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <input type="text" class="form-control inputOTP" name="agentSpecialty" id="agentSpecialty"
                                placeholder="What events do you specialize in?" value="{{ old('agentSpecialty') }}" />
                            <span class="text-danger">
                                @error('agentSpecialty')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="agentAddress">Agent's Address</label>
                            <textarea name="agentAddress" id="agentAddress" cols="2" rows="3">{{ old('agentAddress') }}</textarea>
                            <span class="text-danger">
                                @error('agentAddress')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <input type="password" class="form-control inputOTP" name="agentPassword" id="agentPassword"
                                placeholder="Enter Password" />
                            <span class="text-danger">
                                @error('agentPassword')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                        <div class="radioDiv" style="border: 2px black solid; width: 100%; padding: 10px;">
                            <h5 style="text-align: center;">Access rights to customer data.</h5>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="agentStatus" id="option1"
                                    value="no" />
                                <label class="form-check-label" for="option1">No</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="agentStatus" id="option2"
                                    value="yes" />
                                <label class="form-check-label" for="option2">Yes</label>
                            </div>
                            <span class="text-danger">
                                @error('agentStatus')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>
                    </div>

                    <div class="mainContainer">
                        <button class="btn btn-success subBtn" type="submit">ADD</button>
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
@endsection
