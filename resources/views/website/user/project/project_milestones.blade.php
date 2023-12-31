@extends('website.layouts.app',['class' => 'bg_white'])

{{-- @section('title','Cinevesture-organisation') --}}

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
@include('website.user.project.project_pagination',['page_bg' => '5'])


<!-- Requirements section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div  id="project_milestones" class="profile_wraper profile_wraper_padding mt-4 mb_100">
                    <form role="form" class="validateBeforeSubmit" method="POST" enctype="multipart/form-data" action="{{route('validate-project-milestone')}}">
                        @csrf
                        <p class="flow_step_text pb-0">Requirements</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Project Stage <span class = "steric_sign_design">*</span></label>
                                    <select name="project_stage_id" class="@error('project_stage_id') is-invalid @enderror"  required>
                                        <option value="">Select</option>
                                        @foreach ($projectStage as $k=>$v)                                            
                                            <option @if(!empty($projectData[0]['project_stage'])) @if ($projectData[0]['project_stage']['id'] == $v->id) {{'selected'}} @endif @endif value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('project_stage_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mt_16 select2forError">
                                    <label>Looking for <span class = "steric_sign_design">*</span></label>
                                    <select name="loking_for[]" class="js-select2 @error('loking_for') is-invalid @enderror"  multiple select required>
                                        @foreach ($lookingFor as $k=>$v)
                                            <option value="{{ $v->id }}"@if(!empty($projectData[0]['project_looking_for'] )&&(in_array($v->id, $projectData[0]['project_looking_for'])))selected @endif>{{  $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('loking_for')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>If Startup, What stage of funding are you at?</label>
                                    <select name="stage_of_funding_id" class="@error('stage_of_funding_id') is-invalid @enderror" id="" >
                                        <option value="">Select</option>
                                        @foreach ($projectStageOfFunding as $k=>$v)                                            
                                            <option @if(!empty($projectData[0]['project_stage_of_funding'])) @if ($projectData[0]['project_stage_of_funding']['id'] == $v->id) {{'selected'}} @endif @endif value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('stage_of_funding_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Crowdfunding Link (Optional)</label>
                                    <input type="url" class="form-control" name="crowdfund_link" placeholder="Title" value="@if (!empty($projectData[0]['crowdfund_link'])) {{$projectData[0]['crowdfund_link']}} @endif" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('crowdfund_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flow_step_text mt-5">Milestones</div>
                        <div id="milestone_entries" class="row">
                            @if(isset($projectData[0]['project_milestone']) && count($projectData[0]['project_milestone'])>0)
                                @foreach ($projectData[0]['project_milestone'] as $in => $ass)
                                <div id="milestone-{{$ass['id']}}" class="row existing-milestones">
                                <div class="col-md-4">
                                        <div class="profile_input">
                                            <label>Milestone Description</label>
                                            <input value="{{$ass['description']}}" type="text" class="editable form-control" name="project_milestone_description" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Milestone Budget (USD)</label>
                                            <input value="{{$ass['budget']}}" type="number" class="editable form-control no_number_arrows" name="project_milestone_budget" placeholder="Budget (USD)">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="profile_input">
                                            <label>Target Date</label>
                                            <input value="{{Date('Y-m-d',strtotime($ass['target_date']))}}"  max="2030-12-31" type="date" class="editable form-control" name="project_milestone_target_date" placeholder="Target Date">
                                        </div>
                                    </div>
                                    <div class="col-md-2 d-flex align-items-end">
                                        <div class="d-flex checkbox_btn mb-2">
                                            <input type="checkbox" class="checkbox_btn" name="project_milestone_complete" value="{{$ass['complete']}}" aria-label="" {{$ass['complete'] ? "checked" : ""}}>
                                            <div class="verified-text deep-pink mx-2">Mark Complete</div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 d-flex align-items-end pb-2 mt-2 mt-md-0">
                                        <i class="fa fa-times-circle deep-pink icon-size remove-entry pointer" aria-hidden="true"></i>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                            <div id="milestone_new" class="row d-flex align-items-end">
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label>Milestone Description</label>
                                        <input type="text" class="form-control" name="project_milestone_description" placeholder="Description" maxlength="100">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>Milestone Budget (USD)</label>
                                        <input type="number" class="form-control no_number_arrows" min="0" max="50" name="project_milestone_budget" placeholder="Budget (USD)">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="profile_input">
                                        <label>Target Date</label>
                                        <input type="date" max="2030-12-31" class="form-control" name="project_milestone_target_date" placeholder="Target Date">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="d-flex checkbox_btn mt_46 mb-2">
                                        <input type="checkbox" class="checkbox_btn" name="project_milestone_complete" aria-label="">
                                        <div class="verified-text deep-pink mx-2">Mark Complete</div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="">
                                        <div class="save_add_btn">Save</div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-md-3 d-flex align-items-end mt-2">
                                    <div class="profile_input">
                                        <div class="add_another_btn">Add another milestone</div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-5 pt-0 pt-md-5 pb-md-0">
                                    <input type="hidden" name="project_id" value="<?php if(isset($_REQUEST['id'])) {echo $_REQUEST['id'];}?>">
                                    <button class="cancel_btn mx-3"><a class="btn-link-style" href="{{ route('project-gallery') }}?id={{$_REQUEST['id']}}">Go back</a></button>
                                    <button type="submit" class="guide_profile_btn">Save & Next</button>
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
@push('scripts')
<script>
    var ProjectData = [];
    var minDate = '<?php echo Date('Y-m-d'); ?>';
    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
        ProjectData = JSON.parse('<?php echo str_replace("'","\'",json_encode($projectData[0]));?>');
        // console.log("ProjectMilestoneItems = ",ProjectData);
        ProjectMilestones.init(ProjectData);
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
                

    var ProjectMilestones = function () {
        var project_id = null;
        var parentElemId = "#project_milestones";
        var milestone_entriesId = "#milestone_entries";
        var projectDetailsObj = null;

        let init = function(projectDetails){
            projectDetailsObj = projectDetails;
            project_id = projectDetailsObj.id;
            bindActions();
        }

        let bindActions = function () {
            $(milestone_entriesId+" .remove-entry").off("click").on("click",(e)=>{
                let id = $(e.target).parents()[1].id.split("-")[1];
                createToast("Please wait...","S");
                $(milestone_entriesId+" #milestone-"+id).remove();
                doAjax('ajax/delete-proj-milestone/'+id,{},"DELETE",function(req,resp){
                    if(resp.payload.isDeleted){
                        createToast(resp.message,"S");
                    }else{
                        createToast(resp.error_msg,"E");
                    }
                });
            });

            $(parentElemId+" input[name='project_milestone_complete']").off("click").on("click",(e)=>{
                //console.log("checked ",$(e.target).parent().closest('.row').attr('id'));
                let msid = $(e.target).parent().closest('.row').attr('id');
                let msidsplit = msid.split('-');
                if(msidsplit.length > 1){
                    let isComplete = ($(e.target).is(':checked')) ? 1 : 0;
                    updateMilestone(msidsplit[1],{'project_milestone_complete':isComplete});
                }
            });

            let updateMilestone = function(msid,data){
                doAjax('ajax/update-proj-milestone/'+msid,data,"POST",function(req,resp){
                    if(resp.payload){
                        let newMilestones = projectDetailsObj.project_milestone.filter((rec)=>{
                            return rec.id != resp.payload.id
                        });
                        newMilestones.push(resp.payload);
                        projectDetailsObj.project_milestone = newMilestones;
                        createToast(resp.message,"S");
                    }else{
                        createToast(resp.error_msg,"E");
                    }
                });
            }

            $(parentElemId+ " .existing-milestones input.editable").off("blur").on("blur",(e)=>{
                let msid = $(e.target).parent().closest('.row').attr('id');
                let msidsplit = msid.split('-');
                let toUpdate = {};
                let isUpdated = false;
                $(parentElemId+" #"+msid+" input.editable").each((i,n)=>{
                    //console.log("i = "+i,"n = "+$(n).val(),$(n).attr('name'));
                    let currentMl = projectDetailsObj.project_milestone.find((rec)=>{
                        return msidsplit[1] == rec.id;
                    });
                    let input_key = $(n).attr('name').replace("project_milestone_","");
                    let inputVal = $(n).val();
                    if(input_key == "target_date"){
                        inputVal = inputVal.replace("00:00:00 ","")+" 00:00:00";
                    }
                    if(currentMl[input_key] != inputVal){
                        isUpdated = true;
                        toUpdate[$(n).attr('name')] = inputVal;
                    }
                });
                //console.log(isUpdated,toUpdate);
                if(isUpdated)
                    updateMilestone(msidsplit[1],toUpdate);
            });

            $(parentElemId+" .save_add_btn").off("click").on("click",(e)=>{
                e.preventDefault();
                if(!validateAssoEntry()){
                    console.log("validateAssoEntry error");
                    createToast("Please fill all and valid milestone details","E");
                } else {
                    saveAssoEntry();
                }
            });

            $(parentElemId+" .add_another_btn").off("click").on("click",(e)=>{
                e.preventDefault();
                if(!validateAssoEntry()){
                    console.log("add_another_btn validateAssoEntry error");
                    createToast("Please fill all and valid milestone details","E");
                } else {
                    saveAssoEntry();
                }
            });
        }

        let saveAssoEntry = function(){
            let titleElems = $(parentElemId+' #milestone_new input');
            let data = {};
            $.each(titleElems,(i,element) => {
                if ($(element).attr('type') == 'checkbox') {
                    let isComplete = ($(element).is(':checked')) ? 1 : 0;
                    data[$(element).attr('name')] = isComplete;
                } else {
                    data[$(element).attr('name')] = $(element).val();
                }
            });
            doAjax('ajax/add-proj-milestone/'+project_id,data,"POST",addProjMilestoneCallback);
        }

        let validateAssoEntry = function () {
            let titleElems = $(parentElemId+' #milestone_new input');
            let error = false;
            $.each(titleElems,(i,element) => {
                if($(element).attr('type') != "checkbox")
                    error = ($(element).val() == "");
                if(error)
                    return false;
            });
            console.log("error = ",!error);
            return (!error);
        }

        let addProjMilestoneCallback = function(req, resp) {
            if(resp.status && resp.status == '1') {
                addAssoEntry(resp.payload);
            } else {
                createToast(resp.error_msg,"E");
            }
        }

        let addAssoEntry = function(assoEntry){
            if(!assoEntry.description){
                assoEntry.description = "";
            }
            let isComplete = (assoEntry.complete == 1) ? "checked": "";
            let html = "";
            html += '<div id="milestone-'+assoEntry.id+'" class="row">';
            html += '<div class="col-md-4">';
                html += '<div class="profile_input">';
                    html += '<label>Milestone Description</label>';
                    html += '<input value="'+assoEntry.description+'" type="text" class="form-control" name="project_milestone_description" placeholder="Description">';
                html += '</div>';
            html += '</div>';
            html += '<div class="col-md-3">';
                html += '<div class="profile_input">';
                    html += '<label>Milestone Budget (USD)</label>';
                    html += '<input value="'+assoEntry.budget+'" type="number" class="form-control no_number_arrows" name="project_milestone_budget" placeholder="Budget (USD)">';
                html += '</div>';
            html += '</div>';
            html += '<div class="col-md-2">';
                html += '<div class="profile_input">';
                    html += '<label>Target Date</label>';
                    html += '<input value="'+assoEntry.target_date+'"  max="2030-12-31" type="date" class="form-control" name="project_milestone_target_date" placeholder="Target Date">';
                html += '</div>';
                // min="'+minDate+'"
            html += '</div>';
            html += '<div class="col-md-2 d-flex align-items-end">';
                html += '<div class="d-flex checkbox_btn mb-2">';
                    html += '<input type="checkbox" class="checkbox_btn" name="project_milestone_complete" aria-label="" '+isComplete+'>';
                    html += '<div class="verified-text deep-pink mx-2">Mark Complete</div>';
                html += '</div>';
            html += '</div>';
            html += '<div class="col-md-1 d-flex align-items-end pb-2 mt-2 mt-md-0">';
                html += '<i class="fa fa-times-circle deep-pink icon-size remove-entry pointer" aria-hidden="true"></i>';
            html += '</div>';
            html += '</div>';
            $(html).insertBefore(parentElemId+" #milestone_new");
            let titleElems = $(parentElemId+' #milestone_new input');
            let data = {};
            $.each(titleElems,(i,element) => {
                $(element).val("");
            });
            $(parentElemId+' #milestone_new input[name="project_milestone_complete"]').prop("checked",false);
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
                },
                error: function(result){
                    let errorsHtml = "";
                    $.each(result.responseJSON.errors,(i,n)=>{
                        errorsHtml += n+"<br>";
                    });
                    createToast(errorsHtml,"E");
                }
            });
        }

        return {
            init
        }
    }();

</script>
@endpush

{{-- @section('')
<script>

      $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Placeholder",
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
    
    $('.js-select2').on('select2:select', function (e) {
    $('.select2-search__field').val('').trigger('change');
    });

</script>
@endsection --}}
