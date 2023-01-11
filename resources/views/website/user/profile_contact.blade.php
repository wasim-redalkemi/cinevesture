@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-portfolio') --}}

@section('header')
    @include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
    <header>
        <nav class="navbar navbar-expand-lg header">
            <div class="container">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                    aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-logo" href="#">
                    <img src="./assets/images/Logo-white-trans.png" width="220" height="75" alt="image">
                </a>
                <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo01">
                    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                        <li>
                            <a class="header-nav-link active" href="#">Home</a>
                        </li>
                        <li>
                            <a class="header-nav-link" href="#">For Creators</a>
                        </li>
                        <li>
                            <a class="header-nav-link" href="#">For Investors</a>
                        </li>
                        <li>
                            <a class="header-nav-link" href="#">Training</a>
                        </li>
                        <li>
                            <a class="header-nav-link" href="#"> Consultancy</a>
                        </li>
                    </ul>
                </div>

                <button class="cantact-page-cmn-btn mx-4">Sign in </button>
                <button class="cantact-page-cmn-btn">Sign up </button>
            </div>
        </nav>
    </header>
 
    <section>
    <div class="contact-page-container">
        <div class="img-container">
                <img src="./assets/images/image 3 (1).png" width=100% height=100% alt="image">
            <div class="container">
                <div class="contact-text"> Contact Us</div>
            </div>
        </div>
        <div class="container">
           <div class="row py-5">
            <div class="col-4">
                <div class="contact-page-text">Get in Touchon:</div>
                <div class="contact-page-subtext">+91 98711197445</div>
            </div>
            <div class="col-4">
                <div class="contact-page-text">Write to us at:</div>
                <div class="contact-page-subtext">contact@cinevesture.com</div>
            </div>
            <div class="col-4">
                <div class="contact-page-text">Follow us on:</div>
                <div>
                    <div class="follow-us-container mt-2">
                          <ul class="follow-us-options">
                            <li><i class="fa fa-linkedin-square" style="font-size:25px;" aria-hidden="true"></i></li>
                            <li><i class="fa fa-instagram" style="font-size:25px;" aria-hidden="true"></i></li>
                            <li><i class="fa fa-twitter-square" style="font-size:25px;" aria-hidden="true"></i></li>
                            <li><i class="fa fa-youtube-play" style="font-size:25px;" aria-hidden="true"></i></li>
                          </ul>
                      
                      </div>
                </div>
            </div>
            </div>
            </div>
        <div class="img-container align-items-center">
            <div>
                <img src="./assets/images/image 3 (1).png" width=100% height=100% alt="image">
                </div>
                <div class="contact-form signup-container">
                    <div class="contact-page-text"> Contact Us</div>
                    <div class="mt-2 contact-page-subtext"> Please fill in this form to create an account</div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 my-lg-4 my-sm-3">
                            <input type="text" class="w-100" placeholder="First Name">
                        </div>
                        <div class="col-lg-6 col-sm-6 my-lg-4 my-sm-3">
                            <input type="text" class="w-100" placeholder="Last Name">
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <input type="text" class="w-100" placeholder="Email">
                        </div>
                        <div class="col-lg-12 col-sm-12 my-lg-4 my-sm-3">
                            <input type="text" class="w-100" placeholder="Write your message">
                        </div>
                        <div class="col-12">
                        <button class="cantact-page-cmn-btn w-20">Submit</button>
                        </div>
                        </div>
                        </div> 
                    </div>
    </div>
    </section>

@section('footer')
    @include('website.include.footer')
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });
</script>
@endpush