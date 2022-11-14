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

<!-- Description section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding my-4">
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('validate-project-description')}}">
                        @csrf

                        <p class="flow_step_text pb-0"> Description</p>                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Logline *</label>
                                    <!-- <input type="text" class="form-control" name="logline"  placeholder="Logline" required> -->
                                </div>
                                <textarea class="form-control controlTextLength" text-length = "60" maxlength="60" placeholder="Logline" name="logline" aria-label="With textarea" style="border: 1px solid #4D0D8A;" rows="1">@if (!empty($projectDescription[0]->logline))
                                    {{ $projectDescription[0]->logline }}
                                @endif</textarea>
                                @error('Logline')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="profile_input">
                                    <label>Synopsis/Brief Description *</label>
                                    <textarea class="form-control controlTextLength" text-length = "600" maxlength="600" name="synopsis" aria-label="With textarea">@if (!empty($projectDescription[0]->synopsis))
                                        {{ $projectDescription[0]->synopsis }}
                                    @endif</textarea>
                                    @error('synopsis')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="profile_input">
                                    <label>Director/Creator/Founder’s Statement *</label>
                                </div>
                                <textarea class="form-control controlTextLength" text-length = "600" maxlength="600" name="director_statement" style="border: 1px solid #4D0D8A;" id="textAreaExample3" rows="1">@if (!empty($projectDescription[0]->director_statement))
                                    {{ $projectDescription[0]->director_statement }}
                                @endif</textarea>
                                @error('director_statement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-5 pt-0 pt-md-5">
                                    <input type="hidden" name="project_id" value="<?php if(isset($_REQUEST['id'])) {echo $_REQUEST['id'];}?>">
                                    <button class="cancel_btn mx-3"><a href="{{ route('project-details') }}?id={{$_REQUEST['id']}}">Go back</a></button>
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
</script>
@endpush
