<!-- Contact modal  -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="ContactModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg_3308">
            <div class="modal-body p-0">
                <div class="p-3 float-end">
                    <!-- <i class="fa fa-times text_fff font_24 pointer" data-dismiss="modal" aria-label="Close"></i> -->
                    <span class="pointer" data-dismiss="modal" aria-label="Close">
                        <img src="{{ asset('images/asset/cross_Icon.svg') }}" class="" alt="cross-image" />
                    </span>
                </div>
                <section class="p-0 p-md-3">
                    <div class="container">
                        <div class="">
                            <div class="col-md-12">
                                <div class="signup-text mb-4 mt-2 mt-md-5"> Contact </div>
                                <div class="d-flex">
                                    <div class="">
                                        <div class="contact_modal_profile">
                                            @if (!empty($image))                                            
                                                <img src="{{Storage::url($image)}}" class="w-100 br_100 " alt="product-image" style="height:100%;width:100%;">
                                            @else
                                                <img src="{{ asset('images/asset/user-profile.png') }}" class="w-100 br_100 " alt="product-image" />
                                            @endif
                                        </div>
                                    </div>
                                    <div class="contact_modal_side_contant">
                                        <div class="tile_text text_fff">{{$name}}</div>
                                        <div class="organisation_cmn_text text_fff">{{$title}}</div>
                                    </div>
                                </div>
                                <div class=" form_elem mt-4">
                                    <div><input type="text" id="subject" class="myText  modal_input" name="subject" maxlength="50" value=""  text-length = "50" placeholder="Subject" required></div>
                                </div>
                                <div class="email_contact for_error_msg" style="display:none">
                                    <strong>This field is required.</strong>
                                </div>
                                <div class="form_elem mt-3">
                                    <textarea name="message" id="message" cols="25" rows="6" class="w-100  controlTextLength mt-2" placeholder="Message" no-text-editor="true" text-length = "1200" maxlength="1200" aria-label="With textarea" required></textarea>

                                </div>
                                <div class="msg_contact for_error_msg" style="display:none">
                                    <strong>This field is required.</strong>
                                </div>
                                <div class="form-check mt-3 d-flex">
                                    <input class="form-check-input modal_check_input" type="checkbox" id="checkbox_cc">
                                    <label class="modal_btm_text mx-2 mt-1">Send a copy to me</label>
                                </div>

                                <div class="mt-4 mb-7">
                                    <input type="hidden" name="email_1" id="email_1" class="modal_input" value="{{$email}}">
                                    <button type="button" id="contact_btn" class="invite_btn">Send Mail</button>
                                </div>
                                <!-- <div class="modal_btm_text mt-4 mb-5">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Bibendum vel cras vitae morbi varius vitae.
                                </div> -->
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $('.myText').keyup(validateMaxLength);

        function validateMaxLength()
        {
                var text = $(this).val().length;
                
                if (text>=50) {
                    $(this).parents('.form_elem').find('.textlength').text(' You have reached the limit').css('color', 'red', 'text-align', 'end');
                }
             
        }
   
    $('#contact_btn').click(function(e)
    {
        var subject = $('#subject').val();
        
        var email_1 = $('#email_1').val();
        var message = $('#message').val();
        if(subject==""){
            
            $('.email_contact').show();
            return false;
        //     e.preventDefault();
        // e.stopPropagation();
           
        }
        else{
            $('.email_contact').hide();
        }
        if(message==""){
            $('.msg_contact').show();
            return false;
        //     e.preventDefault();
        // e.stopPropagation();
        }else{
            $('.msg_contact').hide();
        }
        var checkbox_cc = ($("#checkbox_cc").prop("checked") == true ? '1' : '0');
        let $btn = $(this);
        e.preventDefault();
        e.stopPropagation();

        $btn.text("Sending..");
        $btn.prop('disabled',true);
        
        $.ajax(
        {
            url:"{{ route('contact-user-mail-store') }}",
            type:'POST',
            dataType:'json',
            data:{subject:subject,email_1:email_1,message:message,checkbox_cc:checkbox_cc,"_token": "{{ csrf_token() }}"},
            success:function(response)
            {   $('#subject').val("");
                $('#message').val("");
                $btn.text("Send Mail");
                $btn.prop('disabled',false);
                toastMessage(response.status, response.msg);
                $('.modal').hide();
                $('.modal-backdrop').remove();
            },
            error:function(response,status,error)
            {     $btn.text("Send Mail");
                    $btn.prop('disabled',false);
                console.log(response);
                toastMessage('Error', 'Sorry, You Are Not Allowed to Access This Page');
                $('.modal').hide();
                $('.modal-backdrop').remove();
                console.log(status);
                console.log(error);
            } 
        });
    });
</script>
@endpush