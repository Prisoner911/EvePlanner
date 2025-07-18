<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Password Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @if (session('message'))
        <script>
            alert("{{ session('message') }}");
        </script>
    @endif
    <div class="container">
        <h2>Set New Password</h2>
        <form action="/newPassword" method="post">
            @csrf
            <div class="form-group">
                <label for="password">New Password</label>
                <input type="password" id="password" name="password" required>
                <span style="color: red;">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
            </div>
            <div class="form-group">
                <label for="confirm-password">Confirm Password</label>
                <input type="password" id="confirm-password" name="password_confirmation" required>
                <span style="color: red;">
                    @error('CnfPassword')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </div>
</body>

</html>
