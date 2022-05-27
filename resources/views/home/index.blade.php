@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6" style="margin-bottom: 50px;">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <form action="" method="post">
                        @csrf
                        <div class="row justify-content-center no-gutters ml-1">
                            <div class="col-md-10 col-10">
                                <input type="text" class="form-control" placeholder="Search by brand...">
                            </div>
                            <div class="col-md-2 col-2">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="row no-gutters">
                    <p class="font-weight-bold">Select Saloon Type</p>
                    <div class="col-md-4 col-4 text-center">
                        <div style="height: 100px;" class="mb-1">
                            <img src="{{ asset('theme/assets/male.jpg') }}"
                            style="height: 100%; width: 100%; object-fit: contain;"
                            alt="" srcset="">
                        </div>
                        <a href="{{ route('home.showByGender', 'Mens Only') }}" class="btn btn-primary">Search <i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-4 col-4 text-center">
                        <div style="height: 100px;" class="mb-1">
                            <img src="{{ asset('theme/assets/female.jpg') }}"
                            style="height: 100%; width: 100%; object-fit: contain;"
                            alt="" srcset="">
                        </div>
                        <a href="{{ route('home.showByGender', 'females Only') }}" class="btn btn-primary">Search <i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-4 col-4 text-center">
                        <div style="height: 100px;" class="mb-1">
                            <img src="{{ asset('theme/assets/unisex.jpg') }}"
                            style="height: 100%; width: 100%; object-fit: contain;"
                            alt="" srcset="">
                        </div>
                        <a href="{{ route('home.showByGender', 'Unisex') }}" class="btn btn-primary">Search <i class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <p class="font-weight-bold">Popular Brands</p>
                    @foreach ($prods as $prod)
                        <div class="col-md-4 col-4 text-center">
                            <div style="" class="">
                                <img src="{{ asset('storage/images/'. $prod->logo) }}"
                                style="width: 100%; height: 10vh; object-fit: cover;"
                                alt="" srcset="">
                            </div>
                            <p class="font-italic">{{$prod->name }}</p>
                        </div>
                    @endforeach
                   <span class="text-end"><a href="{{ route('home.brand') }}">See All Brands <i class="fa fa-arrow-alt-circle-right" aria-hidden="true"></i></a></span>
                </div>
                <hr>
                <div class="row">
                    <p class="font-weight-bold">Search By Services</p>
                    <div class="col-md-4 col-4 text-center">
                        <div style="" class="mb-1">
                            <img src="{{ asset('storage/images/Facial.jpg') }}"
                            style="width: 100%; height: 10vh; object-fit: cover;"
                            alt="" srcset="" class="img-thumbnail">
                        </div>
                        <a href="{{ route('home.showByType', 'Facial') }}">Facial <i class="fa fa-arrow-alt-circle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-4 col-4 text-center">
                        <div style="" class="mb-1">
                            <img src="{{ asset('storage/images/Hair Cut.jpg') }}"
                            style="width: 100%; height: 10vh; object-fit: cover;"
                            alt="" srcset="" class="img-thumbnail">
                        </div>
                        <a href="{{ route('home.showByType', 'Hair Cut') }}">Hair Cut <i class="fa fa-arrow-alt-circle-right" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-md-4 col-4 text-center">
                        <div style="" class="mb-1">
                            <img src="{{ asset('storage/images/Body Massage.jpg') }}"
                            style="width: 100%; height: 10vh; object-fit: cover;"
                            alt="" srcset="" class="img-thumbnail">
                        </div>
                        <a href="{{ route('home.showByType', 'Body Massage') }}">Massage <i class="fa fa-arrow-alt-circle-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
