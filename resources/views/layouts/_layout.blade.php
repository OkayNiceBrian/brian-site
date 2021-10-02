<html>
    <head>
        <title>Brian Jackson - @yield('title')</title>
        @yield('head')
    </head>
    <body>
        @section('navbar')
            <div>
                <ul>
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