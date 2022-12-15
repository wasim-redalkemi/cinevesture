@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

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
                <div  id="project_milestones" class="profile_wraper profile_wraper_padding my-4">
                    <form role="form" class="validateBeforeSubmit" method="POST" enctype="multipart/form-data" action="{{route('validate-project-milestone')}}">
                        @csrf
                        <p class="flow_step_text pb-0">Requirements</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Project Stage <span style = "color:red">*</span></label>
                                    <select name="project_stage_id" class="@error('project_stage_id') is-invalid @enderror" autofocus required>
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
                                    <label>Looking for <span style = "color:red">*</span></label>
                                    <select name="loking_for[]" class="js-select2 @error('loking_for') is-invalid @enderror" autofocus multiple select required>
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
                                    <select name="stage_of_funding_id" class="@error('stage_of_funding_id') is-invalid @enderror" id="" autofocus>
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
                                    <input type="url" class="form-control" name="crowdfund_link" placeholder="Title" value="@if (!empty($projectData[0]['crowdfund_link'])) {{$projectData[0]['project_name']}} @endif" aria-label="Username" aria-describedby="basic-addon1">
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
                            @if(count($projectData[0]['project_milestone']))
                                @foreach ($projectData[0]['project_milestone'] as $in => $ass)
                                <div id="milestome-{{$ass['id']}}" class="row">
                                <div class="col-md-4">
                                        <div class="profile_input">
                                            <label>Milestone Description</label>
                                            <input value="{{$ass['description']}}" type="text" class="form-control" name="project_milestone_description" placeholder="Description">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="profile_input">
                                            <label>Milestone Budget (USD)</label>
                                            <input value="{{$ass['budget']}}" type="number" class="form-control no_number_arrows" name="project_milestone_budget" placeholder="Budget (USD)">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="profile_input">
                                            <label>Target Date</label>
                                            <input value="{{Date('Y-m-d',strtotime($ass['target_date']))}}" min="{{Date('Y-m-d')}}" max="2030-12-31" type="date" class="form-control" name="project_milestone_target_date" placeholder="Target Date">
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
                            <div id="milestone_new" class="row">
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label>Milestone Description</label>
                                        <input type="text" class="form-control" name="project_milestone_description" placeholder="Description">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="profile_input">
                                        <label>Milestone Budget (USD)</label>
                                        <input type="number" class="form-control no_number_arrows" name="project_milestone_budget" placeholder="Budget (USD)">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="profile_input">
                                        <label>Target Date</label>
                                        <input type="date"  min="{{Date('Y-m-d')}}" max="2030-12-31" class="form-control" name="project_milestone_target_date" placeholder="Target Date">
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex align-items-end">
                                    <div class="d-flex checkbox_btn mb-2 mt-2 mt-md-0">
                                        <input type="checkbox" class="checkbox_btn" name="project_milestone_complete" aria-label="">
                                        <div class="verified-text deep-pink mx-2">Mark Complete</div>
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex align-items-end mt-2">
                                    <div class="profile_input">
                                        <div class="save_add_btn">Add</div>
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
        console.log("ProjectMilestoneItems = ",ProjectData);
        ProjectMilestones.init(ProjectData);
    });

    $(".js-select2").select2({
      closeOnSelect: false,
      placeholder: "Select",
      allowClear: true,
      tags: true
  });

    var ProjectMilestones = function () {
        var project_id = null;
        var parentElemId = "#project_milestones";
        var milestone_entriesId = "#milestone_entries";

        let init = function(projectDetailsObj){
            console.log("projectDetailsObj = ",projectDetailsObj.id);
            project_id = projectDetailsObj.id;
            bindActions();
        }

        let bindActions = function () {
            $(milestone_entriesId+" .remove-entry").off("click").on("click",(e)=>{
                let id = $(e.target).parents()[1].id.split("-")[1];
                createToast("Please wait...","S");
                $(milestone_entriesId+" #milestome-"+id).remove();
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
                        createToast(resp.message,"S");
                    }else{
                        createToast(resp.error_msg,"E");
                    }
                });
            }

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
            if(assoEntry.complete = '1'){
                assoEntry.complete = 'checked';
            } else {
                assoEntry.complete = '';
                
            }
            let complete = assoEntry.complete == 1 ? "checked": "";
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
                    html += '<input value="'+assoEntry.target_date+'" min="'+minDate+'" max="2030-12-31" type="date" class="form-control" name="project_milestone_target_date" placeholder="Target Date">';
                html += '</div>';
            html += '</div>';
            html += '<div class="col-md-2 d-flex align-items-end">';
                html += '<div class="d-flex checkbox_btn mb-2">';
                    html += '<input type="checkbox" class="checkbox_btn" name="project_milestone_complete" value="'+assoEntry.complete+'" aria-label="" complete '+assoEntry.complete+'>';
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
        tags: true
    });
</script>
@endsection --}}
