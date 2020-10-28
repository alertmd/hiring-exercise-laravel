<html>
    <head>
        <title>TTTaaS - @yield('title')</title>

        @include('shared.assets')
    </head>
    <body>
        @section('header')
            <div class="header">
                <div class="title">Tic-Tac-Toe</div>
            </div>
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
