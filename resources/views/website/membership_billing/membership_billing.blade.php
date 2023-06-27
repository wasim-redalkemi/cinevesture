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
                    <div>
                        <div class="d-flex">
                            <div>
                                <div class="guide_profile_main_text mt-4 deep-pink">Your Plan</div>
                                <div class="guide_profile_main_subtext Aubergine_at_night">
                                    @if (($subscription->platform_subscription_id == 'free')) 
                                        Free Trial 
                                    @elseif(!empty($subscription->plan_name)) 
                                        {{$subscription->plan_name}} 
                                    @else 
                                        <span><b>-</b></span> 
                                    @endif
                                </div>
                                <div class="guide_profile_main_text mt-4 deep-pink">Payment</div>
                                    <div class="guide_profile_main_subtext Aubergine_at_night break_word">
                                        @if(($subscription->platform_subscription_id != 'free')) 
                                            Your Cinevesture 
                                            @if (!empty($subscription->plan_name)) 
                                                {{$subscription->plan_name}} 
                                            @else 
                                                <span><b>-</b></span> 
                                            @endif
                                            ends on 
                                            <b>
                                                @if (!empty($subscription->subscription_end_date)) 
                                                    {{strtoupper(date('jS F Y',strtotime($subscription->subscription_end_date)))}} 
                                                    @else 
                                                    <span><b>-</b></span> 
                                                @endif
                                            .</b>
                                        @else 
                                            <span><b>NA</b></span> 
                                        @endif
                                    </div>
                                <div class="guide_profile_main_text mt-4 deep-pink">Billing Details</div>
                                
                                <table>
                                    <tr class="guide_profile_main_subtext Aubergine_at_night">
                                        <td class="w-75 ">Plan Amount:</td>
                                        <td class="w-50">
                                            @if(($subscription->platform_subscription_id != 'free')) 
                                                @if($subscription->currency == "USD")
                                                    @if (!empty($subscription->plan_amount)) {{'$'.number_format($subscription->plan_amount, 0,'.',',')}} @else <span><b>{{'$'.'0.00'}}</b></span> @endif
                                                @else
                                                    @if (!empty($subscription->plan_amount)) {{'₹'.number_format($subscription->plan_amount, 0,'.',',')}} @else <span><b>{{'₹'.'0.00'}}</b></span> @endif
    
                                                @endif
                                            @else 
                                                <span><b>NA</b></span> 
                                            @endif
                                           {{-- {{number_format($subscription->plan_amount, 0,'.',',')}} --}}
                                        </td>
                                    </tr>
                                    <tr class="guide_profile_main_subtext Aubergine_at_night">
                                        <td class="w-50">Date:</td>
                                        <td class="w-50"> 
                                            @if(($subscription->platform_subscription_id != 'free')) 
                                                @if (!empty($subscription->subscription_start_date)) {{strtoupper(date('jS F Y',strtotime($subscription->subscription_start_date)))}} @else <span><b>-</b></span> @endif
                                            @else 
                                                <span><b>NA</b></span> 
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                                <div class="d-flex">
                                    <div class="guide_profile_main_text mt-4 deep-pink">
                                        Billing Address
                                        <span class="deep-pink billing_modal_btn"> <i class="fa fa-edit"></i></span>
                                    </div>
                                </div>
                                <div class="d-block guide_profile_main_subtext Aubergine_at_night">
                                    <table>
                                        <tr>
                                            <td class="w-25">GST No.:</td>
                                            <td class="w-50 gst-val">{{strtoupper($subscription->user->gst)??'-'}}</td>
                                        </tr>
                                        <tr>
                                            <td class="w-25"><nobr>Billing Address:</nobr> </td>
                                            <td class="w-50 billing-val">{{$subscription->user->billing_address??'-'}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            
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
                                            <br>
                                            <label class="guide_profile_main_text m-2 d-flex justify-content-center " style="font-size:25px"> <b> Days left</b></label>
                                        </div>
                                    </div>
                                </div>
                                @if ( (Session::get('freeSubscription'))=='free')
                                    <div class="mt-4" style="text-align: center;"> 
                                        <div><a href="{{route('plans-view')}}"><BUtton class="buy_plan_btn ">Buy Plan</BUtton></a></div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @if(isset($order->plan_name) && !empty($order->plan_name))
                            <div class="d-block">
                                <div class="guide_profile_main_text mt-4">
                                    Your chosen plan <b class=" deep-pink">{{$order->plan_name}}</b> will commence on @php echo date('d-M-Y',strtotime($subscription->subscription_end_date)); @endphp, and will remain valid for a period of <b class=" deep-pink">{{$order->plan_time_quntity}}</b> days.
                                </div>
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
