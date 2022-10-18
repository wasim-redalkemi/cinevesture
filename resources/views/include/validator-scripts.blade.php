<script>
        $(document).ready(function(){
            //For albhabates
            $(".alphabets-only").on("input",function(){
                $(this).val($(this).val().replace(/[^A-z ]/g,''));
            });

            // First name
            $(".name-only").on("input",function(){
                $e = $(this);
                var form = $e[0].form;
                var submitBtn = $(form).find('button[type="submit"]');
                if(!$(this).val()){
                    $e.css("border", "2px solid #4D0D8A");
                    submitBtn.attr('disabled', 'disabled');
                    if ($e.parent().find('span').length == 0) {
                        if($(this).attr("name") == 'first_name'){
                            $(`<span class="e-err" style="color: #DD45B3; font-weight:600 ;margin:0px;">Please enter first name</span>`).insertAfter($e);
                        }else{
                            $(`<span class="e-err" style="color: #DD45B3; font-weight:600 ;margin:0px;">Please enter last name</span>`).insertAfter($e);
                        }
                        
                    }  
                }else{
                    $e.css("border", "");
                     submitBtn.removeAttr('disabled');
                    $e.parent().find('span').remove();
                }
                
                
            });
            

            

            //For emails only
            $(".email-only").on("keyup",function(){
                var EMAIL_REGEXP = /^[_a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+(\.[_a-z0-9]+)*@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9]+)*(\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)$/;
                var $el = $(this);
                var form = $el[0].form;
                var sdgfsj = $el.val();
                var submitBtn = $(form).find('button[type="submit"]');
                var isMatchRegex = EMAIL_REGEXP.test($el.val());                
                if (isMatchRegex || $el.val() == '') {
                    $el.css("border", "");
                     submitBtn.removeAttr('disabled');
                    $el.parent().find('span').remove();
                } else if (isMatchRegex == false) {
                    $el.css("border", "2px solid #4D0D8A");
                    submitBtn.attr('disabled', 'disabled');
                    if ($el.parent().find('span').length == 0) {
                        $(`<span class="e-err" style="color: #DD45B3; font-weight:600 ;margin:0px;">Please provide a valid E-Mail Address.</span>`).insertAfter($el);
                        // $el.parent().append('<p class="e-err" style="color: red;">Please provide a valid email id.</p>')
                    }
                }
            });

            // password 8 chr

               $(".password-only").on("keyup",function(){
                var EMAIL_REGEXP = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
                var $el = $(this);
                var form = $el[0].form;
                var sdgfsj = $el.val();
                var submitBtn = $(form).find('button[type="submit"]');
                var isMatchRegex = EMAIL_REGEXP.test($el.val());                
                if (isMatchRegex || $el.val() == '') {
                    $el.css("border", "");
                     submitBtn.removeAttr('disabled');
                    $el.parent().find('span').remove();
                } else if (isMatchRegex == false) {
                    $el.css("border", "2px solid #4D0D8A");
                    submitBtn.attr('disabled', 'disabled');
                    if ($el.parent().find('span').length == 0) {
                        if($(this).attr("name") == 'password_confirmation'){
                            if($(this).val() != $('#password').val()){
                                $(`<span class="e-err" style="color: #DD45B3; font-weight:600 ;;margin:0px;">The passwords you entered do not match. Please re-enter your password</span>`).insertAfter($el);
                            }
                        }else{
                           $(`<span class="e-err" style="color: #DD45B3; font-weight:600 ;;margin:0px;">Use 8 or more characters with a mix of letters, numbers & symbols</span>`).insertAfter($el);
                        }
                        
                        // $el.parent().append('<p class="e-err" style="color: red;">Please provide a valid email id.</p>')
                    }
                }
            });

            // is_check
        
            $(".ischeck").on("input",function(){
                $(this).removeClass("is-invalid");
            });
            


            //For Numbers only
            $(".numbers-only").on("input",function(){
                $(this).val($(this).val().replace(/[^0-9]/g,''));
            });

            //For float only
            $(".float").on("input",function(){
                $(this).val($(this).val().replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1'));
            });

            //For alpha numeric with special chars(- _.,'") only
            $(".alpha-numeric-sc").on("input",function(){
                $(this).val($(this).val().replace(/[^A-z0-9- _.,'"]/g,''));
            });

            //For alpha chars with special chars(- _.,'") only
            $(".alpha-sc").on("input",function(){
                $(this).val($(this).val().replace(/[^A-z- _.,'"]/g,''));
            });

            //For alpha numeric with - only
            $(".alpha-numeric-dash").on("input",function(){
                $(this).val($(this).val().replace(/[^A-z0-9-]/g,''));
            });

            //For alpha numeric
            $(".alpha-numeric").on("input",function(){
                $(this).val($(this).val().replace(/[^A-z0-9]/g,''));
            });
        });
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
</script>
