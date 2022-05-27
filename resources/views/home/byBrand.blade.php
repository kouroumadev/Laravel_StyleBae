@extends('layouts.app')

@section('content')


<div class="row">
    @foreach ($prods as $prod)
        <div class="col-md-3 col-6 text-center">
            <div class="card mb-1">
                <img class="card-img-top img-thumbnail" src="{{ asset('storage/images/'. $prod->logo) }}" alt="" style="width: 100%; height: 20vh; object-fit: cover;">
            </div>
            <p class="card-text font-italic text-truncate">{{ $prod->name }}</p>
            <a href="{{ route('home.show', $prod->id) }}" class="btn btn-primary btn-block">See Details <i class="fa fa-eye" aria-hidden="true"></i></a>
        </div>
    @endforeach



</div>












@endsection
