@extends('layouts.auth')

@section('content')

    <div class="wrapper-page">
        <div class="account-pages">
            <div class="account-box">
                <div class="account-logo-box text-center bg-primary p-4">
                    <h3 class="m-0 text-white">{{ config('app.name') }}</h3>
                    <h5 class="text-white mb-0">Reset Password</h5>
                </div>
                <div class="account-content">

                    <form method="POST" action="{{ route('password.email') }}" role="form" class="text-center"> 
                        @csrf
                            <p class="text-muted mb-4">Enter your email address and we'll send you an email with instructions to reset your password.  </p>
                        <div class="form-group m-b-0"> 
                            <div class="input-group"> 
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 
                                <span class="input-group-btn"> <button type="submit" class="btn btn-primary">Reset</button> </span> 
                            </div> 
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div> 
                        
                    </form>
    
                                            
                    
                </div>
            </div>
        </div>
    </div>

@endsection
