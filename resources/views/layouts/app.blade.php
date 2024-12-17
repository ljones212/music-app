<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Music App - @yield('title')</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                margin: 0;
                padding: 0;
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

            .header-container {
                position: relative;
                padding: 20px;
                z-index: 1;
                margin-top: 100px;
            }
        </style>
    </head>
    <body>

        <div class="top-bar">
            <h1><font color="white">MusiVerse</font> - @yield('title')</h1>

            <form action="{{route('logout')}}" method="POST">
                @csrf
                <button type="submit" class="logout-button">Log Out</button>
            </form>
        </div>

        @if ($errors->any())
        <div>
            Errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if (session('message'))
            <p><b>{{session('message')}}</b></p>
        @endif

        <div class="header-container">
            @yield('content')
        </div>
    </body>
</html>
