<html>
    <head>
        <title>Brian Jackson - @yield('title')</title>
        <style>
            .body {
                margin: 0;
                padding: 0;
            }
            .container {
                display: flex;
                flex-direction: column;
                margin: 20;
            }
            .navbarContainer {
                display: flex;
                flex-direction: row-reverse;
                width: 100%;
                height: 70;
                padding: 0;
                margin: 0;
                background-color: white;
            }
            .navbarList {
                margin: 20;
                margin-right: 40;
            }
            .navbarList a{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 16pt;
                padding: 16;
                color: rgb(40, 40, 40);
                text-decoration: inherit;
            }
        </style>
        @yield('head')
    </head>
    <body class='body'>
        @section('navbar')
            <div class="navbarContainer">
                <ul class="navbarList">
                    <a href="/">About Me</a>
                    <a href="/">Projects</a>
                    <a href="/">Contact</a>
                    <a href="/crosser">Crosser</a>
                </ul>
            </div>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>