<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/png" href="{{ url('frontend/img/favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" href="{{ url('frontend/img/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" href="{{ url('frontend/img/favicon/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" href="{{ url('frontend/img/favicon/android-chrome-512x512.png') }}">
    <title>
        {{ $title }}
    </title>
    <style>
        #preloader {
            background: linear-gradient(90deg,
                    rgb(205, 245, 245),
                    rgb(159, 193, 255),
                    rgb(250, 216, 214));
            height: 100vh;
            width: 100%;
            z-index: 10000;
            position: fixed;
            display: flex;
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
        }

        .imgContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            /* Center vertically */
        }

        .loadingLogo {
            width: 50%;
            animation: loading 1.5s infinite alternate;
            /* Added animation */
        }

        @keyframes loading {
            from {
                transform: scale(1);
            }

            to {
                transform: scale(1.1);
            }
        }
    </style>
</head>

<body style="">
    <div class="preloader" id="preloader">
        <div class="imgContainer">
            <img src="{{ 'frontend/img/evePlannerLogo.png' }}" alt="loading..." class="loadingLogo">
        </div>
    </div>
</body>

</html>
