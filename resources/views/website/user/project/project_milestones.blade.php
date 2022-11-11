@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
@include('website.user.project.project_pagination')


<!-- Requirements section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding my-4">
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('validate-project-milestone')}}">
                        @csrf

                        <p class="flow_step_text pb-0">Requirements</p>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile_input">
                                    <label>Project Stage <span style = "color:red">*</span></label>
                                    <select name="project_stage_id" class="@error('project_stage_id') is-invalid @enderror" autofocus>
                                        <option value="">Select</option>
                                        @foreach ($projectStage as $k=>$v)                                            
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
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
                                <div class="mt_16">
                                    <label>Looking for <span style = "color:red">*</span></label>
                                    <select name="loking_for[]" class="js-select2 @error('loking_for') is-invalid @enderror" autofocus multiple>
                                        <option value="">Select</option>
                                        @foreach ($lookingFor as $k=>$v)
                                            <option value="{{ $v->id }}">{{  $v->name }}</option>
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
                                            <option value="{{ $v->id }}">{{ $v->name }}</option>
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
                                    <input type="text" class="form-control" name="crowdfund_link" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('crowdfund_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="flow_step_text mt-5">Milestones</div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile_input">
                                    <label>Milestone Description</label>
                                    <input type="text" class="form-control" name="description" placeholder="Milestone Description">
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="profile_input">
                                    <label>Milestone Budget (USD)</label>
                                    <input type="text" class="form-control" name="budget" placeholder="Milestone Budget (USD)">
                                    @error('budget')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="profile_input">
                                    <label>Target Date</label>
                                    <input type="date" class="form-control" name="traget_date" placeholder="Target Date">
                                    @error('traget_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <div class="d-flex checkbox_btn mb-2">
                                    <input type="radio" class="checkbox_btn" name="complete" value="1" aria-label="">
                                    @error('complete')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="verified-text deep-pink mx-2"> Make Complete</div>
                                </div>
                            </div>
                        </div>
                        <div><button class="save_add_btn mt-4">Add another Milestone</button></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-5 pt-5 pb-md-0">
                                    <input type="hidden" name="project_id" value="<?php if(isset($_REQUEST['id'])) {echo $_REQUEST['id'];}?>">

                                    <button class="cancel_btn mx-3"><a href="">Go back</a></button>
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