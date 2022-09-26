@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4 h-100">

                    <div class="profile_text">
                        <h1>Membership and billing</h1>
                    </div>
                    <div class="guide_profile_main_text mt-4 deep-pink">Your Plain</div>
                    <div class="guide_profile_main_subtext Aubergine_at_night">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                         et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</div>
                    <div class="guide_profile_main_text mt-4 deep-pink">Payment</div>
                    <div class="guide_profile_main_subtext Aubergine_at_night">Your Cinevesture Pro ends on <b> 10th August 2021.</b></div>
                    <div class="guide_profile_main_text mt-4 deep-pink">Billing Deatils</div>
                    <table>
                        <tr class="guide_profile_main_subtext Aubergine_at_night">
                            <td class="w-50">Credit card</td>
                            <td class="w-50">**** **** **** 0000</td>
                        </tr>
                        <tr class="guide_profile_main_subtext Aubergine_at_night">
                            <td class="w-50">Date</td>
                            <td class="w-50">10th July 2021</td>
                        </tr>
                    </table>
                 
          <div class="mt-5"><button class="guide_profile_btn bg_dee-pink">Change Membership</button></div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('include.footer')
@endsection