@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

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
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4 h_100">

                    <div class="profile_text">
                        <h1>Membership and billing</h1>
                    </div>
                    <div class="d-flex">
                        <div>
                            <div class="guide_profile_main_text mt-4 deep-pink">Your Plan</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night">@if (!empty($subscription->plan_name)) {{$subscription->plan_name}} @else <span><b>-</b></span> @endif</div>
                            <div class="guide_profile_main_text mt-4 deep-pink">Payment</div>
                            <div class="guide_profile_main_subtext Aubergine_at_night break_word">Your Cinevesture 
                                @if (!empty($subscription->plan_name)) 
                                {{$subscription->plan_name}} @else <span><b>-</b></span> @endif 
                              @if ($subscription->plan_name=='Free')
                                plan is endless.
                              @else
                              ends on <b>
                                 @if (!empty($subscription->subscription_end_date)) 
                                 {{strtoupper(date('jS F Y',strtotime($subscription->subscription_end_date)))}} @else <span><b>-</b></span> @endif
                                 .</b></div>

                              @endif
                            <div class="guide_profile_main_text mt-4 deep-pink">Billing Details</div>
                            
                            <table>
                                <tr class="guide_profile_main_subtext Aubergine_at_night">
                                    <td class="w-50">Plan Amount:</td>
                                    <td class="w-50">
                                        @if($subscription->currency == "USD")
                                             @if (!empty($subscription->plan_amount)) {{'$'.number_format($subscription->plan_amount, 0,'.',',')}} @else <span><b>{{'$'.'0.00'}}</b></span> @endif
                                        @else
                                             @if (!empty($subscription->plan_amount)) {{'₹'.number_format($subscription->plan_amount, 0,'.',',')}} @else <span><b>{{'₹'.'0.00'}}</b></span> @endif

                                        @endif
                                       {{-- {{number_format($subscription->plan_amount, 0,'.',',')}} --}}
                                    </td>
                                </tr>
                                <tr class="guide_profile_main_subtext Aubergine_at_night">
                                    <td class="w-50">Date:</td>
                                    <td class="w-50"> @if (!empty($subscription->subscription_start_date)) {{strtoupper(date('jS F Y',strtotime($subscription->subscription_start_date)))}} @else <span><b>-</b></span> @endif</td>
                                </tr>
                            </table>
                            <div class="d-flex">
                                <div class="guide_profile_main_text mt-4 deep-pink">
                                    Billing Address
                                    <span class="deep-pink billing_modal_btn"> <i class="fa fa-edit"></i></span>
                                </div>
                            </div>
                            <table>
                                <tr class="guide_profile_main_subtext Aubergine_at_night">
                                    <td class="w-50">GST No.:</td>
                                    <td class="w-50 gst-val">{{$subscription->user->gst??'-'}}</td>
                                </tr>
                                <tr class="guide_profile_main_subtext Aubergine_at_night">
                                    <td class="w-50">Billing Address:</td>
                                    <td class="w-50 billing-val">{{$subscription->user->billing_address??'-'}}</td>

                                </tr>
                            </table>
                        </div>
                        {{-- side data  --}}
                        
                        <div class="m-auto">
                            <div class="mx-auto  profile_wraper  align-items-center wh_250">
                                <div class="d-block card_text_center">
                                    <div class="text-center mt-3">
                                        <button class="btn btn-sm bg_color_theam btn-round m-0 p-0">
                                            <b class=" font_size_5">
                                               
                                                <?php 
                                         echo round((strtotime($subscription->subscription_end_date)-time()) / (60 * 60 * 24));
                                         ?>
                                         </b>
                                        </button>

                                        <br><label class="guide_profile_main_text m-2 d-flex justify-content-center " style="font-size:25px"> <b> Days left</b></label>
                                    </div>
                                    @if ($order!=null)
                                    <div class="guide_profile_main_text align-items-center d-flex text-center" style="margin: 0px auto">
                                        You have {{$order->plan_time_quntity}} days extra of {{$order->plan_name}} plan
                                    </div>
                                    
                                        
                                    @endif
                                </div>
                            </div>
                            @if ( (Session::get('freeSubscription'))=='free')
                            <div class="mt-4" style="text-align: center;"> 
                                <div><a href="{{route('plans-view')}}"><BUtton class="buy_plan_btn ">Buy Plan</BUtton></a></div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
   
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection