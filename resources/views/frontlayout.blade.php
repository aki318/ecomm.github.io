<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="{{asset('bs5/bootstrap.min.css')}}" rel="stylesheet" />
        <script type="text/javascript" src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('customer.login')}}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-success btn-sm" href="{{route('booking')}}">Booking</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @yield('content')
        </main>
    </body>
</html>