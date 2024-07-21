@extends('frontlayout')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link href="{{ asset('/bs5/bootstrap.min.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
        <title>Home Page</title>
    </head>

    <body>

        {{-- slider section start --}}
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/Banner1.JPG') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/Banner4.JPG') }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/Banner2.JPG') }}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        {{-- slider section end --}}


        {{-- service section start --}}
        <div class="container my-4">
            <h1 class="text-center border-bottom">Services</h1>
            @foreach ($services as $service)
                <div class="row my-4">
                    <div class="col-md-4">
                        <a href="{{ url('service/' . $service->id) }}"><img class="img-thumbnail" width="100%"
                                src="{{ asset('storage/' . $service->photo) }}"></a>
                    </div>
                    <div class="col-md-8">
                        <h3>{{ $service->title }}</h3>
                        <p>{{ $service->small_detail }}</p>
                        <p>
                            <a href="{{ url('service/' . $service->id) }}" class="btn btn-primary">Read More</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- services section end-->

        <!--Rooms Gallery section start -->
        <div class="gallery-section-flex">
            <div class="container my-4">
                <h2 class="text-center border-bottom">Rooms Gallery</h2>
                <div class="row my-4">
                    @foreach ($rtypes as $rtype)
                        <div class="col-md-3">
                            <div class="card">
                                <h5 class="card-header">{{ $rtype->title }}</h5>
                                <div class="card-body">
                                    @foreach ($rtype->roomtypeimages as $img)
                                        <a href="{{ asset('storage/images/' . $img->img_src) }}"
                                            data-lightbox="{{ $rtype->title }}" data-title="{{ $rtype->title }}">
                                            <img src="{{ asset('storage/images/' . $img->img_src) }}" class="d-block w-100"
                                                alt="">
                                        </a>
                                    @endforeach
                                    <p class="card-text">Price: {{ $rtype->price }} Rs</p>
                                    <p class="card-text details-paragraph">Details: {{ $rtype->detail }}</p>
                                    <a href="{{ url('/booking') }}" class="btn btn-primary">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Room Gallery section end -->

        {{-- testimonial section start --}}
        <h1 class="text-center mt-5" id="gallery">Testimonial</h1>
        <div id="testimonials" class="carousel slide p-5 mb-2 bg-dark text-white border">
            <div class="carousel-inner">
            @foreach ($testimonials as $index => $testi)
                <div class="carousel-item @if($index==0) active @endif">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                          <p>{{$testi->testimonial_content}}</p>
                        </blockquote>
                        <figcaption class="blockquote-footer">
                          <p>{{$testi->customer->name}}</p>
                        </figcaption>
                      </figure>
                </div>
            @endforeach
        </div>         
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonials"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonials"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        {{-- testimonial section end --}}

        <link rel="stylesheet" href="{{ asset('vender') }}/lightbox2-2.11.3/dist/csslightbox.min.css">
        <script type="text/javascript" src="{{ asset('vendor') }}/lightbox2-2.11.3/dist/csslightbox.min.js"></script>
    @endsection
