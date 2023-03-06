@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Project-details') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
@include('website.user.project.project_pagination',['page_bg' => '2'])


<!-- Detail section  -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="project_details" class="profile_wraper profile_wraper_padding mt-4 mb_100">
                    <form role="form" class="validateBeforeSubmit" onsubmit=" return totalBudgetvalidate();return false;" method="POST" enctype="multipart/form-data" action="{{route('validate-project-details')}}">
                        @csrf
                        <p class="flow_step_text"> Details</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input select2forError">
                                    <label>Category</label>
                                    <select name="category_id" id="leadadd_mode_of_enq" name="leadadd_mode_of_enq" class=" @error('category_id') is-invalid @enderror" autofocus>
                                        <option value="">Select</option>
                                        @foreach ($category as $k=>$v)
                                            <option value="{{ $v->id }}"@if(!empty($projectData[0]['project_category'] )&&(in_array($v->id, $projectData[0]['project_category'])))selected @endif>{{  $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror                                        
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mt_16 select2forError">
                                    <label>Genre <span class = "steric_sign_design">*</span></label>
                                    <select name="gener[]" class="js-select2 @error('gener') is-invalid @enderror" autofocus multiple required>
                                        @foreach ($Genres as $k=>$v)
                                            <option value="{{ $v->id }}"@if(!empty($projectData[0]['genres'] )&&(in_array($v->id, $projectData[0]['genres'])))selected @endif >{{  $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('gener')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Duration In Minute(Optional)</label>
                                    <input type="number" class="form-control no_number_arrows @error('duration') is-invalid @enderror" name="duration" min="1" pattern="[0-9]" placeholder="Duration(Minute)" max="{{config('constants.MAX_PROJECT_DURATION_IN_MIN')}}" value="<?php if(!empty($projectData[0]['duration'])){ echo $projectData[0]['duration']; } else{
                                        echo old('duration');
                                    }?>" aria-describedby="basic-addon1">
                                    @error('duration')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mt-2 mt-md-0">
                                <div class="profile_input" id='budgetVal'>
                                    <label>Total Budget (USD) <span class = "steric_sign_design">*</span></label>
                                    <input type="number" class="form-control no_number_arrows @error('total_budget') is-invalid @enderror" name="total_budget" id="total_budget_validate" min="1" max="config('constants.TOTAL_BUDGET')" pattern="[0-9]" placeholder="Total Budget" required 
                                    value="<?php
                                     if(!empty($projectData[0]['total_budget']))
                                    { echo $projectData[0]['total_budget']; }
                                    else{
                                        echo old('total_budget');
                                    }
                                     ?>">
                                     <span class="empty-image d-none" id=budgetValidation>
                                        Total Budget should be less then $1000000000.
                                    </span>
                                    @error('total_budget')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 mt-2 mt-md-0">
                                <div class="profile_input" id="financingSecured">
                                    <label>Financing Secured (USD) <span class = "steric_sign_design">*</span></label>
                                    <input type="number" id="financingSec" class="form-control no_number_arrows @error('financing_secured') is-invalid @enderror" name="financing_secured"  min="1" max="{{config('constants.MAX_TOTAL_BUDGET')}}"  pattern="[0-9]" required placeholder="Financing Secured" value="<?php if(!empty($projectData[0]['financing_secured'])){ echo $projectData[0]['financing_secured']; } else{
                                        echo old('financing_secured');
                                    } ?>">
                                    <span class="empty-image d-none" id=financValidation>
                                        Financing secured should be less then total budget.
                                    </span>
                                    @error('financing_secured')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="associate_text mt-4">Associated with the project (Optional)</div>
                        <div id="associate_entries" class="">
                            @if(isset($projectData[0]['project_association']) && count($projectData[0]['project_association']))
                                @foreach ($projectData[0]['project_association'] as $in => $ass)
                                    <div id="asso-{{$ass['id']}}" class="row">
                                        <div class="col-md-3 mt-2 mt-md-0">
                                            <div class="profile_input">
                                                <label>Title</label>
                                                <input type="text" value="{{$ass['project_associate_title']}}" class="form-control" name="project_associate_title" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                                                @error('project_associate_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-10 col-md-3 mt-2 mt-md-0">
                                            <div class="profile_input">
                                                <label>Name</label>
                                                <input type="text" value="{{$ass['project_associate_name']}}" class="form-control" name="project_associate_name" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
                                                @error('project_associate_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-3 d-flex align-items-end pb-2 mt-2 mt-md-0">
                                            <i class="fa fa-times-circle deep-pink icon-size remove-entry" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div id="asso-new" class="row">
                                <div class="col-md-3 mt-2 mt-md-0">
                                    <div class="profile_input">
                                        <label>Title</label>
                                        <input type="text" value="" class="form-control asso-title" name="project_associate_title" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('project_associate_title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 mt-2 mt-md-0">
                                    <div class="profile_input">
                                        <label>Name</label>
                                        <input type="text" value="" class="form-control asso-name" name="project_associate_name" placeholder="Name" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('project_associate_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex align-items-end justify-content-end justify-content-md-start mt-2">
                                    <div class="profile_input">
                                        <div class="save_add_btn">Save</div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-3 d-flex align-items-end mt-2">
                                    <div class="profile_input">
                                        <div class="add_another_btn">Add another</div>
                                    </div>
                                </div>
                            </div> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end mt-0 mt-md-5 pt-5 pb-md-0">
                                        <input type="hidden" name="project_id" value="<?php if(isset($_REQUEST['id'])) {echo $_REQUEST['id'];}?>">
                                        <button class="cancel_btn mx-3"><a class="btn-link-style" href="{{ route('project-overview') }}?id={{$_REQUEST['id']}}">Go back</a></button>
                                        <button type="submit" class="guide_profile_btn">Save & Next</button>
                                        {{-- <button class="cancel_btn mx-3"><a class="btn-link-style" href="{{ route('project-overview') }}?id={{$_REQUEST['id']}}">Skip</a></button> --}}
                                    </div>
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
@include('website.include.footer')
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    console.log("this is first doc ready");
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
</script>

@endsection

@push('scripts')
<script>
   function totalBudgetvalidate() {
        let total_budget=$('#total_budget_validate').val();
        if (total_budget>1000000000) {
            $('#budgetValidation').removeClass('d-none');
            $(window).scrollTop(0);
            financingValidation();
            return false;
        }else{
            let finee=financingValidation();
            if (finee==false) {
                return false
            }else{
                return true;
            }
        }}
    
        $('#budgetVal').on('change',function () {
         let total_budget=$('#total_budget_validate').val();
         if (total_budget<1000000001) {
                 $('#budgetValidation').addClass('d-none');
             }
        })

//    $('#financingSec').on('change',function(){
//     debugger
//         let total_budget=parseInt($('#total_budget_validate').val());
//         let financing_budget=parseInt($('#financingSec').val()); 
   
//         if (total_budget<financing_budget) {
//             $('#financValidation').removeClass('d-none');
//             $(window).scrollTop(0);
//             return false;
//         }else{
//             $('#financValidation').addClass('d-none');
//             $('button[type="submit"]').removeAttr('disabled');
//         }
//    })

    function financingValidation() {
        let total_budget=parseInt($('#total_budget_validate').val());
        let financing_budget=parseInt($('#financingSec').val()); 
   
        if (total_budget<financing_budget) {
            $('#financValidation').removeClass('d-none');
            $(window).scrollTop(0);
            return false;
        }else{
            $('#financValidation').addClass('d-none');
            return true
            // $('button[type="submit"]').removeAttr('disabled');
        }
    }
    $('#financingSec').on('change',function () {
        let total_budget=parseInt($('#total_budget_validate').val());
        let financing_budget=parseInt($('#financingSec').val()); 
    if (total_budget>financing_budget) {
            $('#financValidation').addClass('d-none');
        }
    })
   
    var projectDetails = [];
    $(document).ready(function(){
        projectDetailsObj = JSON.parse('<?php echo str_replace("'","\'",json_encode($projectData[0]));?>');
        ProjectDetails.init(projectDetailsObj);
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });

    $(".js-select2").select2({
      closeOnSelect: false,
      placeholder: "Select",
      allowClear: true,
        language: {
      noResults: function() {
        return '<button class="no_results_btn">No Result Found</a>';
      },
    },
    escapeMarkup: function(markup) {
      return markup;
    },
      
  })
                .on('select2:selecting', e => $(e.currentTarget).data('scrolltop', $('.select2-results__options').scrollTop()))
                .on('select2:select', e => $('.select2-results__options').scrollTop($(e.currentTarget).data('scrolltop')))
                .on('select2:unselecting', e => $(e.currentTarget).data('scrolltop', $('.select2-results__options').scrollTop()))
                .on('select2:unselect', e => $('.select2-results__options').scrollTop($(e.currentTarget).data('scrolltop')));
                

  var ProjectDetails = function () {
    var project_id = null;
    var parentElemId = "#project_details";
    var associate_entriesId = "#associate_entries";

    let init = function(projectDetailsObj){
        // console.log("projectDetailsObj = ",projectDetailsObj.id);
        project_id = projectDetailsObj.id;
        bindActions();
    }

    let bindActions = function () {
        $(associate_entriesId+" .remove-entry").off("click").on("click",(e)=>{
            let id = $(e.target).parents()[1].id.split("-")[1];
            // createToast("Please wait...","S");
            // toastMessage("info", "Please wait...");
            $(associate_entriesId+" #asso-"+id).remove();
            doAjax('ajax/delete-proj-association/'+id,{},"DELETE",function(req,resp){
                if(resp.payload.isDeleted){
                    // createToast(resp.message,"S");
                    // toastMessage("success", resp.message);
                } else {
                    // createToast(resp.error_msg,"E");
                    toastMessage("error", resp.message);
                }
            });
        });

        $(parentElemId+" .profile_input .add_another_btn").off("click").on("click",(e)=>{
            e.preventDefault();
            validateAssoEntry();
        });

        $(parentElemId+" .save_add_btn").off("click").on("click",(e)=>{
            let isValid = validateAssoEntry();
            if(isValid){
                saveAssoEntry();
            }
        });
    }

    let saveAssoEntry = function(){
        let title = $(parentElemId+" #asso-new .profile_input input.asso-title").val();
        let name = $(parentElemId+" #asso-new .profile_input input.asso-name").val();
        doAjax('ajax/add-proj-association/'+project_id,{title,name},"POST",addProjAssoCallback)
    }

    let validateAssoEntry = function () {
        let titleElems = $('input[name="project_associate_title"]');
        if(titleElems.length > 0) {
            var emptyFields = titleElems.filter(function () {
                return this.value == ""; // $(this).val()
            });
            if(emptyFields.length == 0){
                return true;
            } else {
                // createToast("Please enter a valid title.","E");
                toastMessage("error", "Please enter a valid title.");
            }
        }
        return false;
    }

    let addProjAssoCallback = function(req, resp) {
        if(resp.status && resp.status == '1') {
            addAssoEntry(resp.payload);
        } else {
            // createToast(resp.error_msg,"E");
            toastMessage("error", resp.error_msg);
        }
    }

    let addAssoEntry = function(assoEntry){
        if(!assoEntry.project_associate_name){
            assoEntry.project_associate_name = "";
        }
        let html = "";
        html +='<div id="asso-'+assoEntry.id+'" class="row">';
        html +='<div class="col-md-3">';
        html +='<div class="profile_input">';
        html +='<label>Title</label>';
        html +='<input type="text" value="'+assoEntry.project_associate_title+'" class="form-control" name="project_associate_title" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">';
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-3">';
        html +='<div class="profile_input">';
        html +='<label>Name</label>';
        html +='<input type="text" value="'+assoEntry.project_associate_name+'" class="form-control" name="project_associate_name" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">';    
        html +='</div>';
        html +='</div>';
        html +='<div class="col-md-3 d-flex align-items-end pb-2 mt-2 mt-md-0">';
        html +='<i class="fa fa-times-circle deep-pink icon-size remove-entry pointer" aria-hidden="true"></i>';
        html +='</div>';
        html +='</div>';
        $(html).insertBefore(parentElemId+" #asso-new");
        $(parentElemId+" #asso-new input.asso-title").val("");
        $(parentElemId+" #asso-new input.asso-name").val("");
        bindActions();
    }

    let doAjax = function(url,reqData,method,callback) {
        $.ajax({
            url: BaseUrl+url,
            type: method,
            data: reqData,
            success: function(result){
                let resp = JSON.parse(result);
                callback(reqData,resp);
                if (resp.message=='Success') {
                    toastMessage("success","Project association add successfully.");
                }else{
                toastMessage("success",resp.message);
            }
            },
            error: function(result){
                let errorsHtml = "";
                $.each(result.responseJSON.errors,(i,n)=>{
                    errorsHtml += n+"<br>";
                });
                // createToast(errorsHtml,"E");
                toastMessage("error", resp.msg);
            }
        });
    }

    return {
        init
    }

 }();

</script>
@endpush
