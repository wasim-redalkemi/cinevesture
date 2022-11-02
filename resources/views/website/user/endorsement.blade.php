@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>

<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_text"><h1>Endorsements</h1></div>
                @foreach($endorsement as $edm)
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                  <div class="row">
                    <div class="col-md-3">
                        <div class="guide_profile_main_text deep-pink">{{$edm['endorsementCreater']->name}}</div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">{{$edm['endorsementCreater']->job_title}}</div>
                        <div class="profile_upload_text Aubergine_at_night">{{date('d M Y',strtotime($edm->created_at))}}</div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">{{$edm['endorsementCreater']['organization']->name?$edm['endorsementCreater']['organization']->name:NULL}}</div>
                    </div>
                    <div class="col-md-7">
                        <div class="guide_profile_main_text Aubergine_at_night">Published</div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">
                        {{$edm->comment}}
                        </div>
                    </div>
                    <div class="col-md-2">
                    <input type="checkbox" checked data-toggle="toggle" data-style="ios">   
                    </div>
                  </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection

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