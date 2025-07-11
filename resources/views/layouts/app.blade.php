<!DOCTYPE html>
<html lang="en">
    <head>
        <title>MusiVerse</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
                padding-top: 100px; /* Ensure there's space below the fixed top bar */
            }

            .logout-button {
                background-color: white;
                color: #ff5722;
                padding: 10px 20px;
                border: 2px solid #ff5722;
                cursor: pointer;
                font-size: 16px;
                border-radius: 5px;
                font-family: 'Arial', sans-serif;
            }

            .logout-button:hover {
                background-color: #e64a19;
                color: white;
            }

            .top-bar {
                background-color: #ff5722;
                height: 80px;
                width: 100%;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                z-index: 10;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0 20px;
                box-sizing: border-box;
            }

            .top-bar h1 {
                color: white;
                font-size: 24px;
                margin: 0;
                padding-left: 10px;
            }

            .home-button {
                background-color: white;
                color: #ff5722;
                padding: 10px 20px;
                border: 2px solid #ff5722;
                cursor: pointer;
                font-size: 16px;
                border-radius: 5px;
                font-family: 'Arial', sans-serif;
                text-decoration: none;
            }

            .home-button:hover {
                background-color: #e64a19;
                color: white;
            }

            .header-container {
                position: relative;
                padding: 20px;
                z-index: 1;
            }
            
            .messages {
                background-color: #f8d7da;
                color: #721c24;
                padding: 10px;
                margin: 10px 0;
                border-radius: 5px;
            }

            .messages.success {
                background-color: #d4edda;
                color: #155724;
            }

            .messages ul {
                margin: 0;
                padding-left: 20px;
            }

            .messages ul li {
                list-style-type: disc;
            }
        </style>
    </head>
    <body>

        <div class="top-bar">
            <!-- Home Button -->
            <a href="{{route('posts.index')}}" class="home-button">Home</a>

            <h1><font color="white">MusiVerse</font></h1>

            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="logout-button">Log Out</button>
            </form>
        </div>

        @if ($errors->any())
            <div class="messages">
                <b>Errors:</b>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('message'))
            <div class="messages success">
                <b>{{session('message')}}</b>
            </div>
        @endif

        <div class="header-container">
            @yield('content')
        </div>
    </body>
</html>
