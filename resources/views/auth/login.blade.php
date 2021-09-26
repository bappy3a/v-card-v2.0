@extends('layouts.auth')

@section('content')
        <div class="wrapper-page">
            <div class="account-pages">
                <div class="account-box">
                    <div class="account-logo-box bg-primary p-4  text-center">
                        <img src="{{ asset('logo/logo.svg') }}">
                        <h3 class="m-0 text-center text-white">{{ config('app.name', 'Laravel') }}</h3>
                    </div>
                    <div class="account-content">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group  mb-4 row">
                                <div class="col-12">
                                    <label for="emailaddress">E-Mail Address :</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-12">
                                    <label for="password">Password :</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-12">
                                    <div class="checkbox checkbox-success">
                                        <input id="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}  name="remember">
                                        <label for="remember">
                                            Remember me
                                        </label>
                                        <a href="{{ route('password.request') }}" class="text-muted float-right">Forgot your password?</a>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group row text-center m-t-10">
                                <div class="col-12">
                                    <button class="btn btn-md btn-block btn-primary waves-effect waves-light" type="submit">Sign In</button>
                                </div>
                            </div>

                        </form>

                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-dark m-l-5"><b>Sign Up</b></a></p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end account-box-->
        </div>
@endsection
