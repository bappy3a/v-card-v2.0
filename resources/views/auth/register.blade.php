@extends('layouts.auth')

@section('content')
    <div class="wrapper-page">
        <div class="account-pages">
            <div class="account-box">
                <div class="account-logo-box text-center bg-primary p-4">
                    <img src="{{ asset('logo/logo.svg') }}">
                    <h3 class="m-0 text-white">{{ config('app.name', 'Laravel') }}</h3>
                    <h5 class="text-white mb-0">Create a new Account {{-- <span style="color: black;">OR</span> <a href="{{ route('login') }}">Already have account?</a> --}}</h5>
                </div>
                <div class="account-content">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="emailaddress">First Name :</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus placeholder="First Name">
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="emailaddress">Last Name :</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus placeholder="Last Name">
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password">E-Mail Address :</label>
                                <input placeholder="Email Address" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="password">Password :</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="*******">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-12">
                                <label for="password">Confirm Password :</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="********">
                            </div>
                        </div>


                        <div class="form-group row text-right m-t-10">
                            <div class="col-md-12 text-center">
                                <button class="btn btn-md btn-primary waves-effect waves-light" type="submit">Register</button>
                            </div>
                        </div>

                    </form>

                    <div class="row mt-4">
                        <div class="col-sm-12 text-center">
                            <a href="{{ route('login') }}">Already have account?</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- end account-box-->
    </div>
@endsection
