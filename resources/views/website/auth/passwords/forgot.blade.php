@extends('website.layouts.auth')

@section('header')
@include('website.auth.guest_header')
@endsection

@section('content')
<!-- <section class="auth_section main_content">
    <div class="container signup-container">
        <div class="row">
            <div class="col-md-12">
                <div class="signup-text mt-5 mt-md-5"> Forgot Password</div>
            </div>
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data" action="{{ route('password.email') }}" class="mt-lg-5 pt-lg-5">
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
    </div> -->





    
<section class="auth_section p-0 mt-0">
    <div class="main_page_wraper">
        <form method="POST" enctype="multipart/form-data" action="{{ route('password.email') }}" class="mt-lg-5 pt-lg-5">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="signup-container">
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
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <div class="image_wraper">
            <div class="d-none d-md-block d-lg-block">
                <div class="register_sidewraper">
                    <img src="{{asset('images/asset/gordon-cowie-OPlXmibx__I-unsplash-2.jpg')}}" width="100%" height="100%" alt="">
                </div>
            </div>
        </div>
    </div>
</section>



    @endsection