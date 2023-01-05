<!-- Contact modal  -->
<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="ContactModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content bg_3308">
            <div class="modal-body p-0">
                <div class="p-3 float-end">
                    <i class="fa fa-times text_fff font_24 pointer" data-dismiss="modal" aria-label="Close"></i>
                </div>
                <section class="p-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="signup-text  mb-4 mt-5"> Contact </div>
                                <div class="row">
                                    <div class="col-md-3">
                                      
                                        <img src="{{Storage::url($image)}}" class="w-100 br_100 " alt="product-image" style="height:100%;width:100%;">
                                       
                                    </div>
                                    <div class="col-md-9">
                                        <div class="tile_text text_fff">{{$name}}</div>
                                        <div class="organisation_cmn_text text_fff">{{$title}}</div>
                                    </div>
                                </div>
                                <div class="mt-3"><input type="text" id="subject" name="subject" value="" placeholder="Subject" class="modal_input"></div>
                                <div class="mt-3">
                                    <textarea name="message" id="message" cols="25" rows="6" class="w-100 modal_input controlTextLength" placeholder="Message" text-length = "1200" maxlength="1200" aria-label="With textarea"></textarea>

                                </div>

                                <div class="form-check mt-3">
                                    <input class="form-check-input modal_check_input" type="checkbox" id="checkbox_cc">
                                    <label class="modal_btm_text mx-1">Send a copy to me</label>
                                </div>

                                <div class="mt-4">
                                    <input type="hidden" name="email_1" id="email_1" class="modal_input" value="{{$email}}">
                                    <button type="button" id="contact_btn" class="invite_btn">Send Mail</button>
                                </div>
                                <div class="modal_btm_text mt-4 mb-5">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Bibendum vel cras vitae morbi varius vitae.
                                </div>
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
    $('#contact_btn').click(function(e)
    {
        var subject = $('#subject').val();
        var email_1 = $('#email_1').val();
        var message = $('#message').val();
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
                console.log(status);
                console.log(error);
            } 
        });
    });
</script>
@endpush