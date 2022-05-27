@extends('layouts.app')

@section('content')
    <div class="row justify-content-center mb-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-success text-white text-center">{{ __('Registration form') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-12">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                    <div class="col-md-12">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="location" class="col-md-4 col-form-label text-md-right">{{ __('Location') }}</label>

                                    <div class="col-md-12">
                                        <textarea name="location" id="location" cols="" rows="5" class="form-control" required autocomplete="location"></textarea>
                                        @error('location')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <div class="col-md-6">

                                <div class="form-group row">
                                    <label for="user_type" class="col-md-4 col-form-label text-md-right">{{ __('Choose a user') }}</label>

                                    <div class="col-md-12">
                                        <select name="user_type" id="user_type" class="form-control" required>
                                            <option selected>{{ __('Select class') }}</option>
                                            <option value="1">Bussiness User</option>
                                            <option value="2">Normal User</option>
                                        </select>
                                        @error('user_type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" class="col-md-8 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="image" class="col-md-8 col-form-label text-md-right">{{ __('choose your avatar') }}</label>
                                    <input type="file" name="image" onchange="loadfile(event)" />

                                    <div class="col-md-12">
                                        <img
                                            id="output"
                                            class="tm-avatar img-fluid"
                                            src=""
                                            alt=""

                                            style="height: 150px;"
                                        />
                                        <script>
                                            var loadfile = function(event)
                                            {
                                                var output = document.getElementById('output');
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

                        <div class="row justify-content-center mt-2">
                            <div class="col-md-12">
                                <button type="submit" class="form-group btn btn-success btn-block">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
