<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: #585454;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            width: 300px;
            max-width: 100%;
        }

        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 100px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-style {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        .btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @if (session('message'))
        <script>
            alert("{{ session('message') }}")
        </script>
    @endif
    <div class="container">
        <div class="card">
            <img src="https://i.postimg.cc/nLbfq3hq/inverter-Logo.png" alt="Logo" class="logo">
            <form action="{{ url()->current() }}" method="POST">
                @csrf
                <div class="form-group">
                    <select name="IDType" id="IDType" class="form-style">
                        <option value="0">Select ID type</option>
                        <option value="ManagerID">Manager ID</option>
                        <option value="AgentID">Agent ID</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-style" id="ID" name="ID"
                        placeholder="Manager ID / Agent ID">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-style" id="passwordInput" placeholder="Password">
                </div>
                <button class="btn" type="submit">Login</button>
                <a href="/forgetPassword"><button class="btn" type="button">Forgot Password</button></a>
            </form>
        </div>
    </div>
</body>

</html>
