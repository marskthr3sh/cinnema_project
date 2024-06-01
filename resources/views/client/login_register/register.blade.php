<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="container">
        <h1>Register</h1>

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <label>Name</label>
            <input name="name" type="text" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <div class="error">
                    {{ $errors->first('name') }}
                </div>
            @endif

            <label>Email</label>
            <input name="email" type="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
                <div class="error">
                    {{ $errors->first('email') }}
                </div>
            @endif

            <label>Password</label>
            <input name="password" type="password">

            <label>Confirm Password</label>
            <input name="password_confirmation" type="password">
            @if ($errors->has('password'))
                <div class="error">
                    {{ $errors->first('password') }}
                </div>
            @endif
            <button type="submit">Register</button>
            <div class="link">Already a member? <a href="/login">Login here</a></div>
        </form>
    </div>

</body>

</html>
<style>
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to right, #20002c, #cbb4d4);
    }

    .container {
        width: 350px;
        padding: 20px;
        border-radius: 4px;
        background: rgba(255, 255, 255, 0.25);
        border: 1px solid rgba(255, 255, 255, 0.18);
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    .container .close-btn {
        position: absolute;
        right: 20px;
        top: 15px;
        font-size: 25px;
        cursor: pointer;
    }


    h1 {
        text-align: center;
        color: white;
        text-transform: uppercase;
    }

    form {
        margin: 20px;
    }

    label {
        display: block;
        color: white;
        font-size: 18px;
        margin-top: 10px;
    }

    input {
        display: block;
        width: 90%;
        background: transparent;
        border: none;
        outline: none;
        border-bottom: 1px solid white;
        padding: 10px;
        color: white;
    }

    button {
        display: block;
        width: 95%;
        padding: 8px;
        border: none;
        outline: none;
        background: linear-gradient(to right, #cbb4d4, #20002c);
        color: white;
        font-size: 18px;
        cursor: pointer;
        margin-top: 20px;
    }

    a {
        text-decoration: none;
        color: #20002c;
    }

    .link {
        margin-top: 30px;
        text-align: center;
        color: white;
    }

    a:hover {
        text-decoration: underline;
    }
    .error {
        color: rgb(0, 0, 0);
    }
</style>
