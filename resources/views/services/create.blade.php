@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white text-uppercase">
               {{ isset($service) ? __('Update Service') : __('Add New Services') }}
            </div>
            <div class="card-body">
                <h5 class="card-title">
                    @if (session('yes'))
                        <div class="alert alert-success" role="alert">
                            {{ session('yes') }}
                        </div>
                    @endif
                </h5>

                <form action="{{ isset($service) ? route('service.update', $service->id) : route('service.store') }}" method="post">
                    @csrf

                    @isset($service)
                        @method('patch')
                    @endisset

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select service</label>
                        <select class="form-control" name="type" id="exampleFormControlSelect1" required>
                            @isset($service)
                                <option selected value="{{ $service->type }}">{{ $service->type }}</option>
                            @endisset

                            @foreach ($datas as $data )
                                @if(!in_array($data, $services))
                                    <option value="{{ $data }}">{{ $data }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Price in Rs</label>
                        <input type="text" name="price" class="form-control" id="exampleFormControlInput1" required
                            @isset($service)
                                value="{{ $service->price }}"
                            @else
                                placeholder="700"
                            @endisset
                        >
                    </div>
                    <input type="hidden" name="product_id"
                        @isset($service)
                            value="{{ $service->product_id }}"
                        @else
                            value="{{ session('prod_id') }}"
                        @endisset
                    >
                    <hr>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <a href="{{ route('product.show', session('prod_id')) }}" class="btn btn-warning btn-block">
                                    {{ __('Cancel and go back') }}
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block float-end">
                                   {{ isset($service) ? __('Save Changes') : __('Create Service') }}
                                </button>
                            </div>
                        </div>
                </form>

            </div>
        </div>
    </div>
</div>






@endsection
