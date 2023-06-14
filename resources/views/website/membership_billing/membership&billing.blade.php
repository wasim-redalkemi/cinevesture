@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

@section('header')
@include('website.include.header')
@include('website.include.add_gst')
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
                            <div class="guide_profile_main_text mt-4 deep-pink">Billing Address
                                {{-- <div class="mx-5 icon_container pointer" data-toggle="modal" data-target="#inviteMemberModal"> <span class="icon-size deep-pink"><a href=""><i class="fa fa-edit m-1"></i></span></div> --}}
                                </div>
                                <div class="mt-4 icon_container pointer" data-toggle="modal" data-target="#inviteMemberModal"> <span class="deep-pink"> <i class="fa fa-edit"></i></span></div>
                            </div>
                            <table>
                                <tr class="guide_profile_main_subtext Aubergine_at_night">
                                    <td class="w-50">GST No.:</td>
                                    <td class="w-50 gst-val">
                                        {{$subscription->user->gst??'-'}}
                                    
                                    </td>
                                </tr>
                                <tr class="guide_profile_main_subtext Aubergine_at_night">
                                    <td class="w-50">Billing Address:</td>
                                    <td class="w-50 billing-val" > {{$subscription->user->billing_address??'-'}}</td>

                                </tr>
                            </table>
                        </div>
                        {{-- side data  --}}

                        <div class="m-auto">
                            <div class="mx-auto  profile_wraper  align-items-center wh_250">
                                <div class="d-block card_text_center">
                                    <div class="text-center mt-3">
                                        <button class="btn btn-sm bg_color_theam btn-round">
                                            <b class="p-3 font_size_5">
                                                <?php 
                                         echo round((strtotime($subscription->subscription_end_date)-time()) / (60 * 60 * 24));
                                         ?>
                                         </b>
                                        </button>
                                        <br><label class="guide_profile_main_text m-2 d-flex justify-content-center " style="font-size:25px"> <b> Days left</b></label>
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
            </div>
        </div>
    {{-- add gst and billing ADDERSS --}}
    <div class="modal fade" id="inviteMemberModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg_3308">
                <div class="modal-body p-0">
                    <section class="p-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="signup-text  mt-5 mt-md-5">Update Billing Address </div>
                                </div>
                                <form class="form">
                                    @csrf
                                <div class="col-md-12 mt-4">
                                    {{-- <label for="">GST number</label> --}}
                                    <input type="text" id="gst" name="gst" value="{{$subscription->user->gst}}" placeholder="GST Number" class="modal_input" required>
                                    <div class="text-danger valid_gst d-none">Please enter valid GST No.</div>
                                    @error('gst')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="email_contact for_error_msg" id="empty_email" style="display:none">
                                        <strong>This field is required.</strong>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    {{-- <label for="">Billing address</label> --}}
                                    <input type="text" id="billing_address" name="billing_address" value="{{$subscription->user->billing_address}}" placeholder="Billing Address" class="modal_input" required>
                                    @error('billing_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- <div class="email_contact for_error_msg" id="empty_email" style="display:none">
                                        <strong>This field is required.</strong>
                                    </div> --}}
                                </div>
                            
                                {{-- <div class="col-md-12 mt-3">
                                    <input type="email" id="email_2" name="email_2" value="" placeholder="Second email" class="modal_input">
                                    @error('email_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div> --}}
                                <div class="col-md-12 py-3">
                                    {{-- <input type="hidden" id="organization_id" name="organization_id" value="@if (!empty($UserOrganisation->id)) {{$UserOrganisation->id}} @endif"> --}}
                                    <button type="submit" class="invite_btn">Submit</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </section>
                </div>
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
    // $(document).ready(function(){
    // alert('hello');
    // })
    
    $(document).ready(function () {
        
        $('.form').submit(function () {
            $(".invite_btn").text("Submiting..");
            var gstfill=$("#gst").val();
            var billing_addressfill=$("#billing_address").val();
            var gstcount=gstfill.length;
            // if (gstcount!=15) {
            //     $('#inviteMemberModal').click();
            //     $('.valid_gst').show();
            //     return false;
            //     // toastMessage("error","Please enter valid GST no.");
            //     // return
            // }
            // $btn.prop('disabled',true);
            event.preventDefault();
            var formdata={
                gst: $("#gst").val(),
                billing_address: $("#billing_address").val(),
            }
            $.ajax({
             type: "POST",
             url: BaseUrl+"user/gst-billing",
             data: (formdata),
             dataType:'json',
             success: function(response) {
                
                 $('.gst-val').text(gstfill);
                 $('.billing-val').text(billing_addressfill);
                 $('#inviteMemberModal').click();
                 $(".invite_btn").text("Submit");
                 toastMessage("success","Billing details update successfully.");
             },
             error: function(response) {
                 toastMessage("error","Some thing want wrong");
             }
            })
        })
    })
</script>
@endpush

{{-- @endpush --}}