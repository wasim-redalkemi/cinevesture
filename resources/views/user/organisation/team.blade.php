@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-setup')

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
                    <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inviteMemberModal">
                        </button>
                        <div class="modal fade" id="inviteMemberModal" tabindex="-1" role="dialog" aria-labelledby="inviteMemberModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <section class="auth_section">
                                            <div class="container signup-container">
                                                <form method="POST">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="signup-text  mt-5 mt-md-5"> Invite Members</div>
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <input type="hidden" id="email" name="email" value="" placeholder="Email">
                                                        </div>
                                                        <div class="col-md-12 mt-2">
                                                            <input type="hidden" id="email" name="email" value="" placeholder="Email">
                                                        </div>
                                                        <div class="col-12 mt-2">
                                                            <button class="w-100">Invite</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </section>
@endsection

@section('footer')
    @include('include.footer')
@endsection
@push('scripts')
<script type="text/javascript">

    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });

    $('.for_show').css('display', 'none');
    $(document).ready(function()
    {   
        $('.open_file_explorer').click(function(e) 
        {
            $(this).parents('.custom_file_explorer').find('.file_element').click();
        });

        $('.file_element').change(function()
        {
            var output = $(this).parents('.custom_file_explorer').find('.upload_preview');
            const file = this.files;
            var reader = new FileReader();
            reader.onload = function() {
                output.attr('src',reader.result);
            };
            reader.readAsDataURL(file[0]);
            $('.for_hide').css('display', 'none');
            $('.for_show').css('display', 'block');
        });
    });

    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Select",
        allowClear: true,
        tags: false
    });

    $("#located_in").on('change', function() {
        if($("#located_in option:selected").text().trim() == "India"){
            $("#state-show").show();
        }else{
            $("#state-show").hide();
            $("option:selected", $("#state")).prop("selected", false);
            
        }
    });
</script>
@endpush
