<!DOCTYPE html>
<html>
    <head>
        <title>Stars Profile</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="{{ asset('/css/layout.css') }}" rel="stylesheet">
    </head>
    <body>
        
    <div class="container">
        <div class="row justify-content-between mt-2">
            <div class="col-7">
                <a href="{{route('stars.index')}}" class="hidden-link"><h1>Profile Browser</h1></a>
            </div>
            <div class="col-4">
                <div class="text-end">
                    @auth
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-light">Logout</button>
                    </form>
                    @endauth
                    @guest
                    <form action="{{ route('login') }}" method="GET">
                        <button type="submit" class="btn btn-light">Login</button>
                    </form>
                    @endguest
                </div>
            </div>
        </div>
        @yield('content')
    </div>
        
    </body>
</html>