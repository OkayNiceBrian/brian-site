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
                font-family: 'Courier New', Courier, monospace;
                font-size: 12pt;
                padding: 16;
                color: rgb(40, 40, 40);
                text-decoration: inherit;
            }
        </style>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        @yield('head')
    </head>
    <body class='body'>
        @section('navbar')
            <div class="navbarContainer">
                <ul class="navbarList">
                    <a href="/">About Me</a>
                    <?php 
                        //<a href="/">Projects</a>
                        //<a href="/">Contact</a> 
                    ?>
                    <a href="/weather">Weather</a>
                    <a href="/crosser">Crosser</a>
                    <a href="/go">Go</a>
                </ul>
            </div>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>