<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .selectBox {
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        .container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .reset-form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 50%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
    <div class="container">
        <form action="{{ url()->current() }}" method="POST" class="reset-form">
            @csrf
            <h2>Password Reset</h2>
            <h3>OTP will be sent on your registered mobile number.</h3>
            <div class="form-group">
                <select name="IDType" id="IDType" class="selectBox">
                    <option value="0">Select ID type</option>
                    <option value="ManagerID">Manager ID</option>
                    <option value="AgentID">Agent ID</option>
                </select>
                <input type="text" id="agent-id" name="ID" required>
            </div>
            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </div>
</body>

</html>
