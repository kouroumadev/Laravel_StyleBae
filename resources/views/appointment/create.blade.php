@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="jumbotron">
                <h1 class="display-4">Appointment</h1>
                    @if (session('yes'))
                        <div class="alert alert-success" role="alert">
                            {{ session('yes') }}
                        </div>
                    @endif
                <p class="lead">Saloon name: {{ $prod->name }}</p>
                <hr class="my-4">

                <form action="{{ route('appointment.store') }}" method="post">
                    @csrf

                    <input type="hidden" name="product_id" value="{{ $prod->id }}">

                    <h4 class="text-decoration-underline">Select Service(s)...</h4>
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
                                    <div class="col-md-4 col-6 pt-1">
                                        <input type="checkbox" name="services[]" value="{{ $service->id }}" style="width: 20px; height: 20px;">
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <h4 class="text-decoration-underline">Select Date and Times...</h4>
                    <div class="row">
                        <div class="col-md-6 col-6">
                            <label for="">Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="col-md-6 col-6">
                            <label for="">Time</label>
                            <input type="time" name="time" class="form-control" required>
                        </div>
                    </div>
                    <hr>
                    <button type="submit" class="btn btn-block btn-primary">Make An Appointment Now</button>
                    <a href="{{ route('home.show',$prod->id) }}" class="btn btn-block btn-warning">Cancel and go back</a>

                </form>
            </div>
        </div>
    </div>

@endsection
