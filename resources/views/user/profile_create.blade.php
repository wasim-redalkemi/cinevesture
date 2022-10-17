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
                        <form role="form" method="POST" enctype="multipart/form-data" action="{{ route('profile-store') }}">
                            @csrf

                            <div class="profile_text">
                                <h1>Profile</h1>
                            </div>

                            <div class="d-flex custom_file_explorer">
                                <div class="upload_img_container">
                                    <img src="<?php if (!empty($user->profile_image)){echo Storage::url($user->profile_image); }?>" class="upload_preview">                                        
                                    <div for="file-input" class="d-none">
                                        <input type="file" name="profile_image" class="@error('profile_image') is-invalid @enderror file_element" accept=".jpg,.jpeg,.png">
                                        @error('profile_image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror 
                                    </div>
                                    <div class="pointer open_file_explorer">
                                        <div class="text-center"> <i class="fa fa-plus-circle mx-2 profile_icon deep-pink pointer" aria-hidden="true"></i></div>
                                        <div>Upload</div>
                                    </div>
                                </div>
                                <div class="mx-4 d-flex align-items-center">
                                    <div>
                                        <div class="search-head-subtext Aubergine_at_night open_file_explorer">
                                            Upload Profile Picture
                                        </div>
                                        <div class="search-head-subtext deep-pink">
                                            Delete
                                        </div>
                                    </div>
                                </div>
                            </div>                            
                            <div class="profile_upload_text"> Upload JPG or PNG, 400x400 PX</div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label>First Name</label>
                                        <input type="text" class="outline name-only form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('First Name') }}" name="first_name" value="{{ $user->first_name }}"
                                            aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label>Last Name</label>
                                        <input type="text" class="outline name-only form-control @error('last_name') is-invalid @enderror" placeholder="{{ __('Last Name') }}" name="last_name" value="{{ $user->last_name }}"
                                            aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label>Job Title</label>
                                        <input type="text" class="outline form-control @error('job_title') is-invalid @enderror" placeholder="Job Title" name="job_title" value="{{ $user->job_title }}"
                                            aria-label="Username" aria-describedby="basic-addon1"  autofocus>
                                        @error('job_title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="profile_input" style="max-height:300px;overflow:auto;">
                                        <label for="lang">Age</label>
                                      
                                        <select name="age" class="outline @error('age') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                         
                                              @foreach($age as $val)
                                              <option value="{{$val->id}}" <?php if($val->id == $user->age){echo('selected');} ?> ><?php echo $val->range;?></option>
                                              @endforeach
                                               
                                           
                                        </select>
                                        @error('age')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label for="lang">Gender</label>
                                        <select name="gender" class="outline @error('gender') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                            <option value="man"<?php if("man"== $user->gender){echo('selected');} ?>>Man</option>
                                            <option value="woman"<?php if("woman" == $user->gender){echo('selected');} ?>>Woman</option>
                                            <option value="non_binary"<?php if("non_binary" == $user->gender){echo('selected');} ?>>Non binary</option>
                                            <option value="transgender"<?php if("transgender" == $user->gender){echo('selected');} ?>>Transgender</option>
                                            <option value="gender_non_confirming"<?php if("gender_non_confirming" == $user->gender){echo('selected');} ?>>Gender Non Confirming</option>
                                            <option value="prefer_not_to_say"<?php if("prefer_not_to_say" == $user->gender){echo('selected');} ?>>Prefer Not To Say</option>
                                            <option value="other"<?php if("other" == $user->gender){echo('selected');} ?>>Other</option>
                                        </select>
                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label for="lang">Gender Pronouns</label>
                                        <select name="gender_pronouns" class="outline @error('gender_pronouns') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                            <option value="he/him/his"<?php if("he/him/his" == $user->gender_pronouns){echo('selected');} ?>>He/him/His</option>
                                            <option value="she/her/hers"<?php if("she/her/hers" == $user->gender_pronouns){echo('selected');} ?>>She/Her/Hers</option>
                                            <option value="they/them/theirs"<?php if("they/them/theirs" == $user->gender_pronouns){echo('selected');} ?>>They/Them/Theirs</option>
                                            <option value="ze/hir/hirs"<?php if("ze/hir/hirs" == $user->gender_pronouns){echo('selected');} ?>>Ze/Hir/Hirs</option>
                                            <option value="prefer_not_to_say"<?php if("prefer_not_to_say" == $user->gender_pronouns){echo('selected');} ?>>Prefer Not To Say</option>
                                            <option value="other"<?php if("other" == $user->gender_pronouns){echo('selected');} ?>>Other</option>
                                        </select>
                                        @error('gender_pronouns')
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
                                        <label for="lang">Located in</label>
                                        <select name="Located_in" id="located_in" class="outline @error('Located_in') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                            @foreach ($country as $k=>$v)
                                                <option value="{{ $v->id }}"<?php if(isset($user->country) && $user->country->id == $v->id){echo('selected');} ?>>{{  $v->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('Located_in')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label for="lang">Availabe to work in</label>
                                        <select name="available_to_work_in" class="outline @error('available_to_work_in') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                            <option value="virtually"<?php if("virtually" == $user->available_to_work_in){echo('selected');} ?>>Virtually</option>
                                            <option value="physically"<?php if("physically" == $user->available_to_work_in){echo('selected');} ?>>Physically</option>
                                        </select>
                                        @error('available_to_work_in')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt_16">
                                        <label for="lang">Languase Spoken</label>
                                        <select name="languages[]" class="outline js-select2 @error('languages') is-invalid @enderror" id="lang" multiple>
                                            @foreach ($languages as $k=>$v)
                                              <?php $flag = 0;?>
                                             @if(isset($user->language[0]))
                                              @foreach($user->language as $key->$val)
                                                @if($v->id == $val->id)
                                                <option value="{{ $v->id }}" <?php if($v->id == $val->id ){echo('selected');} ?>>{{  $v->name }}</option>
                                                <?php $flag = 1;?>
                                                @break
                                                @endif
                                                
                                                @endforeach
                                            @endif
                                                @if( $flag == 0)
                                                <option value="{{ $v->id }}">{{  $v->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('languages')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row display-none" id="state-show">
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label for="lang">State</label>
                                        <select name="state" id= "state"class="outline @error('state') is-invalid @enderror" id="lang">
                                        <option value="">Select</option>
                                            @foreach ($state as $k=>$v)
                                                <option value="{{ $v->id }}">{{  $v->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('state')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="profile_input">
                                        <label>About</label>
                                        <textarea class="outline form-control @error('about') is-invalid @enderror" name="about" aria-label="With textarea">{{ $user->about }}</textarea>
                                        @error('about')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mt_16">
                                        <label for="lang">Skills</label>
                                        <select name="skills[]" class="outline js-select2" id="lang" multiple>
                                            @foreach ($skills as $k=>$v)
                                                <option value="{{ $v->id }}">{{  $v->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('skills')
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
                                        <label>IMDB Profile</label>
                                        <input type="text" class="foutline orm-control @error('imdb_profile') is-invalid @enderror" placeholder="IMDB Profile" name="imdb_profile" value="{{ $user->imdb_profile }}" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('imdb_profile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label>LinkedIn Profile</label>
                                        <input type="text" class="outline form-control @error('linkedin_profile') is-invalid @enderror" placeholder="LinkedIn Profile" name="linkedin_profile" value="{{ $user->linkedin_profile }}" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('linkedin_profile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="profile_input">
                                        <label>Website</label>
                                        <input type="text" class="outline form-control @error('website') is-invalid @enderror" placeholder="Website" aria-label="Username" name="website" value="{{ $user->website }}" aria-describedby="basic-addon1">
                                        @error('website')
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
                                        <label>Introduction Video</label>
                                        <input type="text" class="outline form-control @error('intro_video_link') is-invalid @enderror" placeholder="Paste link here" name="intro_video_link" value="{{ $user->intro_video_link }}" aria-label="Username" aria-describedby="basic-addon1">
                                        @error('intro_video_link')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex justify-content-end mt-md-0 mt-4">
                                        <button class="cancel_btn">Cancel</button>
                                        <button type="submit" class="guide_profile_btn mx-3">Save</button>
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
@push('scripts')
<script type="text/javascript">

    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });

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
