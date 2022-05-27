@extends('layouts.app')

@section('content')
    <div class="row justify-content-center" style="margin-bottom: 120px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white text-uppercase">
                    Bussiness form
                </div>
                <div class="card-body">
                    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleFormControlInput1">name</label>
                                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="John haircut salon" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select type</label>
                                    <select class="form-control" name="type" id="exampleFormControlSelect1" required>
                                      <option value="Haircut Saloon">Haircut Saloon</option>
                                      <option value="Massage Saloon">Massage Saloon</option>
                                      <option value="Makup Saloon">Makup Saloon</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select Gender</label>
                                    <select class="form-control" name="gender" id="exampleFormControlSelect1" required>
                                      <option value="Mens Only">Mens Only</option>
                                      <option value="females Only">females Only</option>
                                      <option value="Unisex">Unisex</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="my-select">location</label>
                                    <textarea name="location" id="" cols="" rows="" class="form-control" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="my-select">Details</label>
                                    <textarea name="detail" id="" cols="" rows="" class="form-control" required placeholder="put all the informations related to our bussiness"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Opened from</label>
                                    <input type="time" name="date1" class="form-control" id="exampleFormControlInput1" required placeholder="name@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Closed at</label>
                                    <input type="time" name="date2" class="form-control" id="exampleFormControlInput1" required placeholder="name@example.com">
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="image" class="col-md-8 col-form-label text-md-right">{{ __('Choose your logo') }}</label>
                                    <input type="file" name="logo" onchange="loadfile1(event)" required />
                                    <div class="col-md-12">
                                        <img id="output1" class=" img-fluid" src="" alt="" style="height: 100px;"/>
                                        <script>
                                            var loadfile1 = function(event)
                                            {
                                                var output = document.getElementById('output1');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function(){
                                                    URL.revokeObjectURL(output.src);
                                                }
                                            };
                                        </script>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-md-8 col-form-label text-md-right">{{ __('Choose saloon photo 1') }}</label>
                                    <input type="file" name="image1" onchange="loadfile2(event)" required />
                                    <div class="col-md-12">
                                        <img id="output2" class=" img-fluid" src="" alt="" style="height: 100px;"/>
                                        <script>
                                            var loadfile2 = function(event)
                                            {
                                                var output = document.getElementById('output2');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function(){
                                                    URL.revokeObjectURL(output.src);
                                                }
                                            };
                                        </script>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-md-8 col-form-label text-md-right">{{ __('Choose saloon photo 2') }}</label>
                                    <input type="file" name="image2" onchange="loadfile3(event)" required />
                                    <div class="col-md-12">
                                        <img id="output3" class=" img-fluid" src="" alt="" style="height: 100px;"/>
                                        <script>
                                            var loadfile3 = function(event)
                                            {
                                                var output = document.getElementById('output3');
                                                output.src = URL.createObjectURL(event.target.files[0]);
                                                output.onload = function(){
                                                    URL.revokeObjectURL(output.src);
                                                }
                                            };
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <a href="{{ route('product.index') }}" class="btn btn-warning btn-block">
                                    {{ __('Cancel and go back') }}
                                </a>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary btn-block float-end">
                                    {{ __('Create bussiness') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

