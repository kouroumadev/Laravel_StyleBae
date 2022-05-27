@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 30px;">
                    <a href="{{ route('home.brand') }}" class="btn btn-warning mb-2"><i class="fa fa-arrow-left" aria-hidden="true"></i> Prev</a>
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner" style=" height: 300px;">
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/images/'. $product->image1) }}" style="height: 100%; width: 100%; object-fit: contain;" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{asset('storage/images/'. $product->image2) }}" style="height: 100%; width: 100%; object-fit: contain;" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset(asset('storage/images/'. $product->logo)) }}" style="height: 100%; width: 100%; object-fit: contain;" class="d-block w-100" alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" onclick="$('#carouselExampleControls').carousel('prev')">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" onclick="$('#carouselExampleControls').carousel('next')">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                                </a>
                            </div>

                            <h2 class="text-bold">{{ $product->name }}</h2>
                            <p> <i class="fa fa-map" aria-hidden="true"></i> {{ $product->location }}</p>
                            <hr>
                            <p class="text-bold"><i class="fa fa-user" aria-hidden="true"></i> {{ $product->gender }}</p>
                            <p class=""><i class="fa fa-clock" aria-hidden="true"></i> {{ $product->date1 }} - {{ $product->date2 }} </p>
                            <hr>
                            <h4 class="text-decoration-underline">Owner Details...</h4>
                            <div class="row">
                                <div class="col-md-4 col-4" style="">
                                    <img src="{{ asset('storage/images/'. $user->image) }}"
                                    style="width: 100%; height: 10vh; object-fit: cover;"
                                    alt="img" class="img-thumbnail">
                                </div>
                                <div class="col-md-8 col-8">
                                    <h6 class=""><i class="fa fa-user" aria-hidden="true"></i> {{ $user->name }}</h6>
                                    <h6 class=""><i class="fa fa-at" aria-hidden="true"></i> {{ $user->email }}</h6>
                                    <h6> <i class="fa fa-phone" aria-hidden="true"></i> {{ $user->phone }}</h6>
                                    <h6><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $user->location }}</h6>
                                </div>
                            </div>
                            <hr>
                            <h4 class="text-decoration-underline">Saloon Details...</h4>
                            <p>{{ $product->detail }}</p>
                            <hr>
                            <h4 class="text-decoration-underline">Provided Services...</h4>

                                @foreach ($services as $service)
                                    <div class="row">
                                        <div class="col-md-4 col-5">
                                            <img src="{{ asset('storage/images/'. $service->image) }}"
                                            style="width: 100%; height: 10vh; object-fit: cover;"
                                            alt="here image" class="rounded-3 img-thumbnail">
                                        </div>
                                        <div class="col-md-8 col-7">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 col-6">
                                                    <h6 class="text-bold">{{ $service->type }} </h6>
                                                    <p class="text-truncate font-italic small">Rs {{ $service->price }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <hr>

                                <a href="{{ route('appointment.create', $product->id) }}" class="btn btn-block btn-primary">Book Appointment <i class="fa fa-calendar" aria-hidden="true"></i></a>
                                <a href="{{ route('home.brand') }}" class="btn btn-block btn-warning"> <i class="fa fa-arrow-left" aria-hidden="true"></i> Cancel and go back</a>
                                <a href="{{ route('appointment.index') }}" class="btn btn-block btn-success">All appointment</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
