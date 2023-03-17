@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="profile-section">
<div class="hide-me animation for_authtoast">
            @include('website.include.flash_message')
        </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">

                    <div class="profile_text">
                        <h1>Settings</h1>
                    </div>
                    <div class="guide_profile_main_text mt-4">Email Id</div>
                    <div class="d-flex align-items-center">
                        <div class="preview_subtext mt-2">{{$email}}</div> 
                        {{-- <span class="profile_upload_text aubergine mx-3">Change Email</span> --}}
                    </div>
                    <div class="guide_profile_main_text mt-4">Password</div>
                    <div class="d-flex align-items-center">
                        <div class="preview_subtext mt-2">{{$password}}</div> <a class="profile_upload_text aubergine mx-3" href = "{{route('create-reset-otp')}}"><button class="header-search-btn" style="width: 150px"> Change Password</button></a>
                    </div>
                    <div class="row mt_35">
                        <div class="col-4 col-md-2">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                
                                <button class="deactivate_btn" type="submit">{{ __('Logout') }} </button>
                            </form>
                            {{-- <button class="deactivate_btn">Logout</button> --}}
                        </div>
                        <div class="col-8 col-md-5">
                        
                                <button type="button" class="deactivate_btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                Deactivate account
                               </button>
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Modal for Confirmation for account deactivate -->
<div class="modal fade" id="staticBackdrop"   tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">
      
      <div class="modal-body" style="padding: 0px;">
    <section>
    <div class="container"style="padding: 0px;" >
        <div class="row">   
            <div class="col-md-12">
                <div class="modal_container">
                    <div class="icon_container warning">
                        <i class="fa fa-times icon_style" aria-hidden="true"></i>
                    </div>
                    <div class="head_text mt-4">Are you sure?</div>
                    <div class="sub_text mt-4">Do you really want to deactivate your account?<br>This process cannot be undone.</div>
                    <div class="d-flex justify-content-center mt-4">   
                        <button type="button" class="cancel_btn_modal mx-3" data-bs-dismiss="modal">Cancel</button>
                        <form method="POST" action="{{ route('user-deactivate') }}">
                                @csrf
                           <button  class="delete_btn mx-3" type="submit">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

      </div>
    </div>
  </div>
</div>
<!-- End for Modal  -->
@endsection

@section('footer')
@include('website.include.footer')
@endsection
@push('scripts')
<script>
    $(document).ready(function() {

        $("#error-toast").toast("show");
        $("#success-toast").toast("show");

    });
</script>
@endpush