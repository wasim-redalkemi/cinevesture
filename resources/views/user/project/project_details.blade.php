@extends('layouts.app',['class' => 'bg_white'])

@section('title','Project-details')

@section('header')
@include('include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('include.flash_message')
</div>
@include('user.project.project_pagination')


<!-- Detail section  -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4">
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('project-details-store',['id' => $user->id ])}}">
                        @csrf

                        <p class="flow_step_text"> Details</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Category (Optional)</label>
                                        <select name="category_id" id="lang">
                                            <?php
                                                for($i=0;$i<=5;$i++)
                                                {
                                                    ?>
                                                        <option value="<?php echo $i;?>">cat <?php echo $i;?></option>
                                                    <?php
                                                }        
                                            ?>
                                        </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt_16">
                                    <label>Genre *</label>
                                    <select class="js-select2" name="gener[]" multiple="multiple">
                                            <option value="O1" data-badge="">Option1</option>
                                            <option value="O2" data-badge="">Option2</option>
                                            <option value="O3" data-badge="">Option3</option>
                                            <option value="O4" data-badge="">Option4</option>
                                            <option value="O5" data-badge="">Option5</option>
                                            <option value="O6" data-badge="">Option6</option>
                                            <option value="O7" data-badge="">Option7</option>
                                        </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Duration (Optional)</label>
                                    <input type="time" class="form-control" name="duration" placeholder="hr:min" aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Total Budget (USD) *</label>
                                    <input type="text" class="form-control" name="total_budget" placeholder="Empty input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Financing Secured (USD) *</label>
                                    <input type="text" class="form-control" name="financing_secured" placeholder="Empty input">
                                </div>
                            </div>
                        </div>
                        <div class="associate_text mt-4">Associated with the project (Optional)</div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="project_associate_title" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="project_associate_name" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3  d-flex align-items-end pb-2 mt-2 mt-md-0">
                                <i class="fa fa-times-circle deep-pink icon-size" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-3 d-flex align-items-end mt-2 mt-md-0">
                                <div>
                                    <button class="save_add_btn">Add another</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-5 pt-5 pb-md-0">
                                    <button class="cancel_btn mx-3" type="submit">Go back</button>
                                    <button class="guide_profile_btn" type="submit">Save & Next</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('footer')
@include('include.footer')
@endsection

@section('scripts')
<script>

    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });

      $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Placeholder",
        allowClear: true,
        tags: true
    });


    $(document).ready(function() {
   
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="add_new"> <div class="row total_data" name="mytext[]"><div class="col-md-3"><div class="profile_input"><label>Title</label><input type="text" class="form-control" name="" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1"></div></div><div class="col-md-3"><div class="profile_input"><label>Name</label><input type="text" class="form-control" name="" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1"></div></div><div class="col-md-3  d-flex align-items-end pb-2 mt-2 mt-md-0"><i class="fa fa-times-circle deep-pink icon-size remove_field" aria-hidden="true"></i></div></div></div>'); //add input box
        }
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault();
        $(this).parents('.add_new').remove(); 
        x--;
    })
});
});
</script>
@endsection
