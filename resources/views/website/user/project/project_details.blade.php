@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Project-details')

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
                <div class="profile_wraper profile_wraper_padding my-4">
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('validate-project-details')}}">
                        @csrf
                        <p class="flow_step_text"> Details</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Category (Optional)</label>
                                    <select name="category_id[]" class="js-select2 @error('category_id') is-invalid @enderror" id="" autofocus multiple>
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
                                <div class="mt_16">
                                    <label>Genre <span style = "color:red">*</span></label>
                                    <select name="gener[]" class="js-select2 @error('gener') is-invalid @enderror" autofocus multiple>
                                        <option value="">Select</option>
                                        @foreach ($Genres as $k=>$v)
                                            <option value="{{ $v->id }}"@if(!empty($projectData[0]['genres'] )&&(in_array($v->id, $projectData[0]['genres'])))selected @endif>{{  $v->name }}</option>
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
                                    <input type="number" class="form-control no_number_arrows" name="duration" pattern="[0-9]" placeholder="min" value="<?php if(!empty($projectData[0]['duration'])){ echo $projectData[0]['duration']; } ?>" aria-describedby="basic-addon1">
                                    @error('duration')
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
                                    <label>Total Budget (USD) <span style = "color:red">*</span></label>
                                    <input type="number" class="form-control no_number_arrows" name="total_budget" pattern="[0-9]" placeholder="Empty input" value="<?php if(!empty($projectData[0]['total_budget'])){ echo $projectData[0]['total_budget']; } ?>">
                                    @error('total_budget')
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
                                    <label>Financing Secured (USD) <span style = "color:red">*</span></label>
                                    <input type="number" class="form-control no_number_arrows" name="financing_secured" pattern="[0-9]" placeholder="Empty input" value="<?php if(!empty($projectData[0]['financing_secured'])){ echo $projectData[0]['financing_secured']; } ?>">
                                    @error('financing_secured')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="associate_text mt-4">Associated with the project (Optional)</div>
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <div class="profile_input">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="project_associate_title~1" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('project_associate_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-10">
                                <div class="profile_input">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="project_associate_name~1" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('project_associate_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-2 d-flex align-items-end pb-2 mt-2 mt-md-0">
                                <div class="">
                                    <i class="fa fa-times-circle deep-pink icon-size" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <div class="profile_input">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="project_associate_title~2" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('project_associate_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-10">
                                <div class="profile_input">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="project_associate_name~2" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('project_associate_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-2 d-flex align-items-end pb-2 mt-2 mt-md-0">
                                <i class="fa fa-times-circle deep-pink icon-size" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-12">
                                <div class="profile_input">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="project_associate_title~3" placeholder="Title" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('project_associate_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-10">
                                <div class="profile_input">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="project_associate_name~3" placeholder="Locations (Optional)" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('project_associate_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3 col-2 d-flex align-items-end pb-2 mt-2 mt-md-0">
                                <i class="fa fa-times-circle deep-pink icon-size" aria-hidden="true"></i>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 d-flex align-items-end mt-3">
                                <div>
                                    <button class="save_add_btn">Add another</button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-5 pt-0 pt-md-5  pb-md-0">
                                    <input type="hidden" name="project_id" value="<?php if(isset($_REQUEST['id'])) {echo $_REQUEST['id'];}?>">
                                    <button class="cancel_btn mx-3"><a class="btn-link-style" href="{{ route('project-overview') }}?id={{$_REQUEST['id']}}">Go back</a></button>
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

@section('scripts')
<script>


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
{{-- @section('scripts')
<script>
      $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Select",
        allowClear: true,
        tags: true
    });
</script>
@endsection --}}
@endsection

@push('scripts')
<script>

    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });

    $(".js-select2").select2({
      closeOnSelect: false,
      placeholder: "Select",
      allowClear: true,
      tags: true
  });
</script>
@endpush
