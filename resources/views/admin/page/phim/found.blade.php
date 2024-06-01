<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found! 404</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            color: #5f99ba;
            font-family: Arial, sans-serif;
        }
        .container {
            text-align: center;
        }
        .container h1 {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        .container p {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        .container a {
            color: #007bff;
            text-decoration: none;
        }
        .container a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Page Not Found! 404</h1>
        <p>Sorry, the page you are looking for could not be found.</p>
        <p><a href="{{ url('/') }}">Go back to Home</a></p>
    </div>
</body>
</html>

