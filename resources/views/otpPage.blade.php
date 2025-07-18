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
        body {
            background-image: url("frontend/img/logobg2.jpg");
            background-size: contain;
            background-repeat: no-repeat;
        }

        .mainContainer {
            display: flex;
            justify-content: center;

        }

        .containerDiv {
            width: 18%;
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


    <div class="mainContainer" style="margin-top: 2rem;">
        <div class="containerDiv">
            <form action="{{ url()->current() }}" method="POST">
                @csrf
                <div class="content">
                    <label for="userOTP" class="form-label">Enter OTP</label>
                    <input type="text" class="form-control inputOTP" name="userOTP" id="userOTP" placeholder=""
                        maxlength="6" style="text-align: center" />
                    <div class="errorMessage" id="error">
                        <span class="text-danger error">
                            @error('userOTP')
                                {{ $message }}
                            @enderror


                        </span>

                    </div>

                    @if (session('error'))
                        <p id="countdown" class=" countdown">{{ session('error') }}</p>
                    @else
                        <p id="countdown" class=" countdown">OTP is valid only for 2
                            minutes</p>
                    @endif


                </div>


                <div class="mainContainer">
                    <button class="btn btn-success subBtn" type="submit" onclick="validate()">Verify</button>
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

{{-- <script>
    var targetDate = new Date().getTime() + (1 * 60 * 1000);
    var countdownInterval = setInterval(function() {
        // Get the current date and time
        var currentDate = new Date().getTime();

        // Calculate the remaining time (in milliseconds)
        var remainingTime = targetDate - currentDate;

        // Calculate minutes and seconds
        var minutes = Math.floor((remainingTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((remainingTime % (1000 * 60)) / 1000);

        // Display the countdown
        document.getElementById("countdown").innerHTML = "OTP expires in " + minutes + "m " + seconds + "s ";

        // If the countdown is over, stop the timer
        if (remainingTime < 0) {
            // clearInterval(countdownInterval);
            document.getElementById("countdown").innerHTML = "OTP has EXPIRED";
        }
    }, 1000)
</script> --}}
