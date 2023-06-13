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
                            <td class="w-50">Plan Amount</td>
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
                            <td class="w-50">Date</td>
                            <td class="w-50"> @if (!empty($subscription->subscription_start_date)) {{strtoupper(date('jS F Y',strtotime($subscription->subscription_start_date)))}} @else <span><b>-</b></span> @endif</td>
                        </tr>
                    </table>
                </div>
                    {{-- side data  --}}
                   
                   <div class="mx-auto mt-4 profile_wraper p-3 d-flex align-items-center">
                
                       <div class="d-block">
                           <div class="text-center mt-3">
                               <button class="btn btn-sm bg_color_theam text-white btn-round">
                                   <b style="font-size:3rem ">
                                    <?php 
                                    echo round((strtotime($subscription->subscription_end_date)-time()) / (60 * 60 * 24));
                                    ?>
                                    </b>
                                </button>
                        <br><label class="guide_profile_main_text m-2"> <b> Days left</b></label>
                    </div>
                </div>
                <div style="font-size: 2rem">|</div>
                <div> <div>Buy Plan</div><a href="{{route('plans-view')}}"><BUtton class="btn btn-primary">Buy Plan</BUtton></a></div>
                 
          <!-- <div class="mt-5"><button class="guide_profile_btn bg_dee-pink">Change Membership</button></div> -->
                </div>
            </div>
            <button class="btn btn-primary">Add gst</button>
            <div class="mx-5 icon_container pointer" data-toggle="modal" data-target="#inviteMemberModal"> <span class="icon-size deep-pink">+</span></div>
        </div>
    </div>
    {{-- add gst and billing ADDERSS --}}
    <div class="modal fade" id="inviteMemberModal" tabindex="-1" role="dialog" aria-labelledby="inviteMemberModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content bg_3308">
                <div class="modal-body p-0">
                    <section class="p-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="signup-text  mt-5 mt-md-5">GST no and billing address</div>
    
                                </div>
                                <form>
                                    @csrf
                                <div class="col-md-12 mt-4">
                                    <label for="">GST number</label>
                                    <input type="text" id="gst" name="gst" value="" placeholder="GST number" class="modal_input" required>
                                    @error('email_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="email_contact for_error_msg" id="empty_email" style="display:none">
                                        <strong>This field is required.</strong>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-4">
                                    <label for="">Billing address</label>
                                    <input type="text" id="billing_address" name="email_1" value="" placeholder="Billing address" class="modal_input" required>
                                    @error('email_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="email_contact for_error_msg" id="empty_email" style="display:none">
                                        <strong>This field is required.</strong>
                                    </div>
                                </div>
                            </form>
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
@push('script')
    <script>
        $('document').ready(function () {
            $('form').submit(function (event) {
            var formdata={
                gst:$("#gst").val();
                billing_address:$("#billing_address").val();
            }
           $.ajax({
            type: "POST",
            url:"/gst-billing",
            data:"formdata",
            success: function(response) {
            alert(response);
            }
            error: function (xhr) {
                    console.log(xhr.responseText);
                }
           })
        })
    })
    </script>
@endpush