@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4 h-100">

                    <div class="profile_text">
                        <h1>Membership and billing</h1>
                    </div>
                    <div class="guide_profile_main_text mt-4 deep-pink">Your Plan</div>
                    <div class="guide_profile_main_subtext Aubergine_at_night">{{$subscription->plan_name}}</div>
                    <div class="guide_profile_main_text mt-4 deep-pink">Payment</div>
                    <div class="guide_profile_main_subtext Aubergine_at_night">Your Cinevesture Pro ends on <b>{{date('d F Y',strtotime($subscription->subscription_end_date))}}.</b></div>
                    <div class="guide_profile_main_text mt-4 deep-pink">Billing Deatils</div>
                    <table>
                        <tr class="guide_profile_main_subtext Aubergine_at_night">
                            <td class="w-50">Plan Amount</td>
                            <td class="w-50"> @if($subscription->currency == "USD")
                                           $
                                        @else
                                           ₹
                                        @endif {{$subscription->plan_amount}}</td>
                        </tr>
                        <tr class="guide_profile_main_subtext Aubergine_at_night">
                            <td class="w-50">Date</td>
                            <td class="w-50">{{date('d F Y',strtotime($subscription->subscription_start_date))}}</td>
                        </tr>
                    </table>
                 
          <!-- <div class="mt-5"><button class="guide_profile_btn bg_dee-pink">Change Membership</button></div> -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection