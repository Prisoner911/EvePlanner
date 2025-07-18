@extends('ManagerLayouts.ManagerPage')




@section('company-main')
    <!doctype html>
    <html lang="en">

    <head>
        <title>Manager's Page</title>
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
                width: 100%;
                padding: 2rem;
                box-shadow: 0px 0px 15px 5px black, 0px 0px 50px 2px rgb(144, 233, 255) inset;
                border-radius: 10px;
                backdrop-filter: blur(3px);

            }

            .inputOTP {
                border: 1px solid black;
                background-color: transparent;
                width: 100%;
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
                <h2 style="text-align: center;">Add manager.</h2>
                <form action="/managerAccess/addManager" method="post">
                    @csrf
                    <div class="content">
                        <div class="mb-3">
                            <label for="managerName">Name</label>
                            <input type="text" class="form-control" name="managerName" id="managerName"
                                placeholder="Name" value="{{ old('managerName') }}" />
                            <span class="text-danger">
                                @error('managerName')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="managerPhone">Phone no.</label>
                            <input type="text" class="form-control inputOTP" name="managerPhone" id="managerPhone"
                                placeholder="Enter Phone Number" maxlength="10" value="{{ old('managerPhone') }}" />
                            <span class="text-danger">
                                @error('managerPhone')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="managerEmail">Email</label>
                            <input type="email" class="form-control inputOTP" name="managerEmail" id="managerEmail"
                                placeholder="Enter email" value="{{ old('managerEmail') }}" />
                            <span class="text-danger">
                                @error('managerEmail')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="managerAddress">Manager's Address</label>
                            <textarea name="managerAddress" id="managerAddress" cols="10" rows="3">{{ old('managerAddress') }}</textarea>
                            <span class="text-danger">
                                @error('managerAddress')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="managerPassword">Password</label>
                            <input type="password" class="form-control inputOTP" name="managerPassword" id="managerPassword"
                                placeholder="Enter password" value="{{ old('managerPassword') }}" />
                            <span class="text-danger">
                                @error('managerPassword')
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
