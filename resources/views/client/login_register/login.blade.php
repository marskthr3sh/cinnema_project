<span style="font-family: verdana, geneva, sans-serif;">
    <!DOCTYPE html>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Marsk</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container">
            <h1>Welcome</h1>
            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <strong>{{ $message }}</strong>

                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <label>Email</label>
                <input name="email" id="email" type="text" >
                <label>Password</label>
                <input name="password" id="password" type="password" >
                <a href="#">Forgot Password?</a>
                <button type="submit">Submit</button>
                <div class="link">Not a member? <a href="/register">Signup here</a></div>
            </form>
        </div>
        </div>
    </body>

    </html>
</span>
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


    .close-btn:hover {
        color: red;
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
</style>

</span>
