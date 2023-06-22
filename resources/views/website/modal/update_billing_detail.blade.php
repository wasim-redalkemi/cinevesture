<div class="modal fade" id="updateBillingAddressModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg_3308">
            <div class="modal-body p-0">
                <section class="p-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="signup-text  mt-5 mt-md-5">Update Billing Address </div>
                            </div>
                            <form class="billing_form">
                                @csrf
                                <div class="col-md-12 mt-4">
                                    <input type="text" id="gst" name="gst" value="" placeholder="GST Number(Optional)" class="modal_input">
                                    <div class="text-danger valid_gst hide">Please enter valid GST No.</div>
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
                                    <input type="text" id="billing_address" name="billing_address" value="" placeholder="Billing Address" class="modal_input" required>
                                    <div class="text-danger valid_address hide">Address must be less then 70 charactor</div>
                                    @error('billing_address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
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
@push('scripts')
<script>    
    $(document).ready(function () {
        $('.valid_gst').hide();
        $('.valid_address').hide();
        $('.billing_modal_btn').click(function()
        {
            $('.valid_gst').hide();
            $('.valid_address').hide();
            $("#gst").val($('.gst-val').text());
            $("#billing_address").val($('.billing-val').text());
            $('#updateBillingAddressModal').modal('show');
            
        });
        $('.billing_form').submit(function (event) {
            // event.preventDefault();
            var gstfill=$("#gst").val();
            var billing_addressfill=$("#billing_address").val();
            var gstcount=(gstfill).length;
            if ((gstfill).length > 15 || (billing_addressfill).length > 70) {
                if ((gstfill).length > 15) {
                        $('.valid_gst').show();
                        event.preventDefault();
                    }
                if ((billing_addressfill).length > 70) {
                    $('.valid_address').show();
                    event.preventDefault();
                }
            }
            else{
                $(".invite_btn").text("Submiting..");
                // event.preventDefault();
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
                        $('#updateBillingAddressModal').modal('hide');
                        $(".invite_btn").text("Submit");
                        toastMessage("success","billng details update successfully");
                    },
                    error: function(response) {
                        toastMessage("error","Something went wrong");
                    }
                })
            }
        })
    })
</script>
@endpush