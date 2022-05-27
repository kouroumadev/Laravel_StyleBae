@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dashboard of the user: '). auth()->user()->name }}</div>

                @if (session('yes'))
                    <div class="alert alert-success" role="alert">
                        {{ session('yes') }}
                    </div>
                @endif

                <div class="card-body" style="height:400px; overflow-y: scroll; overflow-x: none;">

                    @foreach ($prods as $prod )
                        <div class="row no-gutters mb-1 border">
                            <div class="col-md-2 col-3">
                                <img src="{{ asset('storage/images/'. $prod->logo) }}"
                                style="width: 100%; height: 100%; object-fit: cover;"
                                alt="here image" class="">
                            </div>
                            <div class="col-md-10 px-2 py-2 col-9 bg-light ">
                                <h6 class="text-bold">{{ $prod->name }} <a href="{{ route('product.show', $prod->id) }}"><i class="fas fa-arrow-circle-right"></i></a> <span class="badge badge-primary ml-2">{{ $prod->appointments->count() }}</span></h6>
                                <p class="text-truncate font-italic small">{{ $prod->detail }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>

                <div class="card-footer">
                    <a href="{{ route('product.create') }}" class="btn btn-primary text-uppercase">
                        {{ __('Add new bussiness') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
