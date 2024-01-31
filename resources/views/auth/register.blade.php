@extends('layouts.assets')
@section('content')
    <!-- Login -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7 order-1"><img class="bg-img-cover bg-center" src="{{MAINASSETS}}/images/login/1.jpg" alt="looginpage"></div>
            <div class="col-xl-5 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo text-start" href="index.html"><img class="img-fluid for-light" src="{{MAINASSETS}}/images/logo/login.png" alt="looginpage"><img class="img-fluid for-dark" src="{{MAINASSETS}}/images/logo/logo_dark.png" alt="looginpage"></a></div>
                        <div class="login-main">
                            <!--{{ isset($url) ? ucwords($url) : ""}}-->
                            {{--              @isset($url)--}}
                            {{--              <form method="POST" class="theme-form" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}">--}}
                            {{--              @else--}}
                            {{--              <form method="POST" class="theme-form" action="{{ route('login') }}" aria-label="{{ __('Login') }}">--}}
                            {{--              @endisset--}}

                            <form method="post" class="theme-form" action="{{ route('register') }}" aria-label="{{ __('register') }}">
                                @csrf
                                <h4>Register</h4>
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('Name') }}</label>
                                    <input  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('Email') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('Password') }}</label>
                                    <div class="form-input position-relative">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">{{ __('Confirm Password') }}</label>
                                    <div class="form-input position-relative">
                                        <input id="confirmpassword" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password">
                                        <span toggle="#confirmpassword" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group mb-0">

                                    <div class="text-end mt-3">
                                        <button class="btn btn-primary btn-block w-100" type="submit">{{ __('Sign in') }}</button>
                                    </div>
                                </div>
                                <script>
                                    (function() {
                                        'use strict';
                                        window.addEventListener('load', function() {
                                            // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                            var forms = document.getElementsByClassName('needs-validation');
                                            // Loop over them and prevent submission
                                            var validation = Array.prototype.filter.call(forms, function(form) {
                                                form.addEventListener('submit', function(event) {
                                                    if (form.checkValidity() === false) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }
                                                    form.classList.add('was-validated');
                                                }, false);
                                            });
                                        }, false);
                                    })();

                                </script>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Login -->
@endsection
