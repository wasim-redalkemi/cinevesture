@extends('website.layouts.app')

{{-- @section('title','Cinevesture-Otp') --}}

@section('header')
@include('website.auth.guest_header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
<!-- <section class="auth_section main_content ">
    <div class="container signup-container ">
        
        <form method="POST" class="mt_sm_100" enctype="multipart/form-data" action="{{ route('verify-otp') }}">
            @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="signup-text mt-5 mt-md-5"> OTP Verification</div>
            </div>
            <div class="col-12 mt-2 mt-lg-5 pt-2">
                <input type="hidden" id = "email" name = "email" value = "{{$user->email}}">
                <input type="hidden" id = "type" name = "type" value = "{{$type}}">
                <input type="password" class="outline w-100 {{ $errors->has('otp') ? ' is-invalid' : '' }}" name="otp" placeholder="Please Enter OTP" required>
              
                @if ($errors->has('otp'))
                <span class="invalid-feedback" style="display: block;" role="alert">
                    <strong>{{ $errors->first('otp') }}</strong>
                </span>
                @endif              
            </div>
            <div class="resend-div mt-2 mb-3 text-center">
                        <div id="before-timer" class="font-14">
                        <span class="disable-resend">Resend OTP in </span></span>
                            <span class="otp-timer" style=" color: #FAF8FB">00:<span id="time">30</span>
                            
                        </div>
                        <div id="after-timer" style="display: none">

                            <a id = "resend" href = "{{ route('resend-otp',['email'=>$user->email,'type'=>$type]) }}" style="cursor: pointer; color:#971e9b">Resend OTP</a>
                        </div>
                    </div>
                    
            <div class="col-12 mt-2">
                <button class="w-100">Submit</button>
            </div>
        </div>
    </form>
    </div>
</section> -->



<section class="auth_section p-0 mt-0">
    <div class="main_page_wraper">
        <form method="POST" id="otp_form" enctype="multipart/form-data" action="{{ route('verify-otp') }}">
            @csrf
            <div class="container">
                <div class="row">
                    <div class="col col-md-12">
                        <div class="signup-container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="signup-text mt-5 mt-md-5"> OTP Verification</div>
                                </div>
                                <div class="col-12 mt-2 mt-lg-5 pt-2">
                                    <input type="hidden" id="email" name="email" value="{{$user->email}}">
                                    <input type="hidden" id="type" name="type" value="{{$type}}">
                                    <input type="password" id="otp" class="outline w-100 {{ $errors->has('otp') ? ' is-invalid' : '' }}" name="otp" placeholder="Please Enter OTP" required>

                                    @if ($errors->has('otp'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('otp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="resend-div mt-2 mb-3 text-center">
                                    <div id="before-timer" class="font-14">
                                        <span class="disable-resend">Resend OTP in </span></span>
                                        <span class="otp-timer" style=" color: #FAF8FB">00:<span id="time">30</span>

                                    </div>
                                    <div id="after-timer" style="display: none">

                                        <a id="resend" href="{{ route('resend-otp',['email'=>$user->email,'type'=>$type]) }}" style="cursor: pointer; color:#971e9b">Resend OTP</a>
                                    </div>
                                </div>

                                <div class="col-12 mt-2">
                                    <button type="button" id="otp-submit" class="w-100">Submit</button>
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
@push('scripts')
<script>
    $(document).ready(function() {

        $("#error-toast").toast("show");
        $("#success-toast").toast("show");



    });

    $(".inputs").keyup(function(e) {
        if (e.keyCode === 8 || e.keyCode === 37) {
            $(this).prev('.inputs').focus();
        } else if ($(this).val().length == $(this).attr('maxlength')) {
            $(this).next('.inputs').focus();

        }
    });

    $("#otp-submit").on('click',function(e){
        e.preventDefault();
        let $btn = $(this);
        $btn.text("Submitting...");
        $btn.prop('disabled',true);
        let otp = $('#otp').val();
        if (!otp) {
           new toastMessage('error','Please enter OTP');
            return;
        }
        $("#otp_form").submit();
    })


    $(document).ready(function() {
        timer();
    });


    function timer() {
        let timing = 30;
        let myTimer;
        let timeToAppend;
        myTimer = setInterval(function() {
            --timing;
            let check = timing.toString();
            if (check.length < 2) {
                timeToAppend = '0' + timing;
            } else {
                timeToAppend = timing;
            }
            $('#time').text(timeToAppend);
            if (timing === 0) {
                $("#before-timer").hide();
                $("#after-timer").show();
                clearInterval(myTimer);
            }
        }, 1000);
    }
</script>
@endpush