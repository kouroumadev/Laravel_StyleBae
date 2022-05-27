@extends('layouts.app')

@section('content')


<div class="row">
    <h4 class="text-center text-uppercase">Booked Appointmens</h4>
    @foreach ($product->appointments as $app )

    <div class="col-md-6">
        <div class="card border-primary mb-1" style="">
            <div class="card-header text-center font-weight-bold"><a href="{{ route('product.show', $product->id) }}" class="float-left text-primary"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></a> For: {{ $product->name }} <a href="" class="float-right text-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></div>
            <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-6">
                    <h5 class="text-decoration-underline">Services..</h5>
                    <ul class="list-unstyled">
                        @php($amt = 0)
                        @php($pID = "")
                        @foreach ($app->jobs as $job)
                            <li><small>{{ $job->service->type }}: Rs {{ $job->service->price }}</small></li>
                            @php($amt += $job->service->price)
                            @php($pName = $job->service->product->name)
                            @php($pID = $job->service->product->id)
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-6 col-6">
                    <h5 class="text-decoration-underline">Details..</h5>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-user" aria-hidden="true"></i> <a href="">{{ $app->user->name }}</a></li>
                        <li><i class="fa fa-calendar" aria-hidden="true"></i> {{ $app->date }}</li>
                        <li><i class="fa fa-clock" aria-hidden="true"></i> {{ $app->time }}</li>
                        <li><i class="fa fa-money-bill" aria-hidden="true"></i></i> {{ $amt }} Rs.</li>
                    </ul>
                </div>
            </div>
            </div>
          </div>
    </div>

    @endforeach

</div>



@endsection
