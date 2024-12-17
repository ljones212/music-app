<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music App</title>
    <style>
        body {
            margin: 0;
            font-family: sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: #f8f9fa;
            color: #333;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 3rem;
            color: #ff5722;
        }


        a {
            display: block;
            width: 150px;
            margin: 10px;
            padding: 10px;
            background-color: #ff9800;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1.2rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #e68900;
        }
    </style>
</head>
<body>
    <h1>MusiVerse</h1>
    <a href="/login">Log In</a>
    <a href="/register">Sign Up</a>
</body>
</html>
