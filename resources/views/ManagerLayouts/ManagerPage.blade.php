<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ url('frontend/CSS/managerPage.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/CSS/customerDetails.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        body {
            font-family: "Lato", sans-serif;
            transition: background-color .5s;

        }

        .menuBTN {
            background-color: rgb(104, 190, 240);
            border-radius: 10px;
            padding: 5px 10px;
            box-shadow: 0px 2px 15px 2px black;
            position: fixed;
            font-size: 22px;

        }

        .Imgcontainer {
            display: flex;
            justify-content: center;
        }

        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #2b2e38;
            color: #fff;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav .glow {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav .glow:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            color: rgba(255, 0, 0, 0.815);
        }

        .sidenav .closebtn:hover {
            color: red;
        }


        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }
    </style>
</head>

<body>



    <div id="mySidenav" class="sidenav">
        <a href="/managerAccess" style="color: #f1f1f1; text-decoration: none;">
            <h3 class="Heading3">Manager's Page</h3>
        </a>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>


        <a class="glow" href="{{ url('managerAccess/showCustomer') }}">Customer</a>
        <a class="glow" href="{{ url('/managerAccess/Agents') }}">Agents</a>
        <a class="glow" href="{{ url('/managerAccess/addAccess') }}">Add Agent</a>
        <a class="glow" href="{{ url('/managerAccess/showManager') }}">Managers</a>
        <a class="glow" href="{{ url('/managerAccess/addManager') }}">Add Manager</a>
        <a class="glow" href="{{ url('/forgetPassword') }}">Forget Password</a>
        @if (session()->has('id'))
            <a class="glow" href="{{ url('/Logout') }}">Log out</a>
        @endif
    </div>

    <div id="main">
        <span class="menuBTN" style="cursor:pointer" onclick="openNav()">&#9776; More Options</span>
        <div class="main_content">@yield('company-main')
        </div>

    </div>

    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("main").style.marginLeft = "250px";
            document.body.style.backgroundColor = "white";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
            document.body.style.backgroundColor = "white";
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        window.addEventListener('beforeunload', function() {
            // Send an AJAX request to clear the session
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/clear-session', false); // Change the URL as per your route
            xhr.send();
        });
    </script>


</body>

</html>
