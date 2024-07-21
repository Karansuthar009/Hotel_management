<!DOCTYPE html>
<html lang="en">

<head>
    <link href="{{ asset('/bs5/bootstrap.min.css') }}" rel="stylesheet">
    {{-- <script href={{ asset('/bs5/bootstrap.bundle.min.css')}}></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <title>Home Page</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">A Hotel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
                    @if (Session::has('customerlogin'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('customer/add-testimonial') }}">Add Testimonial</a>
                    </li>     
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('logout') }}">Logout</a>
                        </li>     
                        <li class="nav-item">
                            <a class="nav-link btn-primary" style="border-radius: 5px;"  href="{{url('booking')}}">Booking</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('register') }}">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-primary" style="border-radius: 5px;"  href="{{url('booking')}}">Booking</a>
                        </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>

</html>
