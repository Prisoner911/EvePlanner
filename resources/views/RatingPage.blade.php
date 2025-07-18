<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rating</title>
    <link rel="stylesheet" href="{{ url('frontend/CSS/RatingPage.css') }}">
</head>
<link href="https://fonts.googleapis.com/css2?family=Allura&family=Lato&display=swap" rel="stylesheet">

<style>
    .rating input[type='radio'] {
        position: absolute;
        left: -9999px;
    }

    body {
        font-family: 'Lato', sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-family: 'Allura', cursive;
        letter-spacing: 4px;
    }
</style>

<body>
    @if (session('message'))
        <script>
            alert("{{ session('message') }}");
        </script>
    @endif
    <div class="container">
        <!-- LOGO -->
        <img src="https://i.postimg.cc/rFq8yQmC/logo.png" alt="Logo" class="logo">
        <h1>Feedback</h1>

        <form action="/rateUs" method="post">
            @csrf
            <input class='form-control' name="rateName" placeholder='Name' type='text'>
            <span style="color: red">
                @error('rateName')
                    {{ $message }}
                @enderror
            </span>
            <input class='form-control' name="ratePhone" placeholder='Phone Number' type='text' maxlength="10">
            <span style="color: red">
                @error('ratePhone')
                    {{ $message }}
                @enderror
            </span>
            <div class="rating">
                <input type='radio' name='rate' id='rating_5' value='5'>
                <label for='rating_5'></label>

                <input type='radio' name='rate' id='rating_4' value='4'>
                <label for='rating_4'></label>

                <input type='radio' name='rate' id='rating_3' value='3'>
                <label for='rating_3'></label>

                <input type='radio' name='rate' id='rating_2' value='2'>
                <label for='rating_2'></label>

                <input type='radio' name='rate' id='rating_1' value='1'>
                <label for='rating_1'></label>


            </div>
            <span style="color: red;">
                @error('rate')
                    {{ $message }}
                @enderror
            </span>
            <textarea class='form-control' id='fb-comment' name='rateComments' placeholder='Tell us what you think' maxlength="450"></textarea>
            <span style="color: red">
                @error('rateComments')
                    {{ $message }}
                @enderror
            </span>
            <input type="submit" value="Submit">
        </form>
    </div>

</body>

</html>
