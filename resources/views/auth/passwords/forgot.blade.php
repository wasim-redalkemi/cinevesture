@extends('layouts.app')

@section('content')
<section class="auth_section">
    <div class="container signup-container">
        <div class="row">

            <div class="col-md-12">
                <div class="signup-text mt-5 mt-md-5"> Forgot Password</div>
            </div>
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data" action="{{ route('password.update') }}" class="mt-lg-5 pt-lg-5">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="profile_input">
                                <input id="email" type="email" placeholder="Email" class="is-invalid-remove email-only form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary w-100">
                                Receive OTP
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection