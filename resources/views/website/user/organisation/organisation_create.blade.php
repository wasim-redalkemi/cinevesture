@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation-create')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                    <form role="form" class="validateBeforeSubmit" method="POST" enctype="multipart/form-data" action="{{ route('organisation-store') }}">
                        @csrf

                        <div class="profile_text">
                            <h1>Organisation</h1>
                        </div>
                        <div class="d-flex custom_file_explorer">
                            <div class="upload_img_container">
                                <img src="<?php if (!empty($UserOrganisation->logo)) {
                                                echo Storage::url($UserOrganisation->logo);
                                            } ?>" class="upload_preview for_show">

                                <div for="file-input" class="d-none">
                                    <input type="file" name="logo" class="@error('logo') is-invalid @enderror file_element" accept=".jpg,.jpeg,.png">
                                    @error('logo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="pointer open_file_explorer for_hide">
                                    <div class="text-center"> <i class="fa fa-plus-circle mx-2 profile_icon deep-pink pointer" aria-hidden="true"></i></div>
                                    <div>Upload</div>
                                </div>
                            </div>
                            <div class="mx-4 d-flex align-items-center">
                                <div>
                                    <div class="search-head-subtext Aubergine_at_night open_file_explorer pointer">
                                        Upload Profile Picture
                                    </div>
                                    <div class="pointer search-head-subtext deep-pink delete_image">
                                        Delete
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Name <span style="color:red">*</span></label>
                                    <input type="text" class="outline name-only form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" name="name" value="{{(isset($UserOrganisation->name))?$UserOrganisation->name:'' }}" aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                    @error('name')
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
                                    <label>Organisation Type <span style="color:red">*</span></label>
                                    <select name="organisation_type" class="@error('organisation_type') is-invalid @enderror" id="" required autofocus>
                                        <option value="">Select</option>
                                        @foreach ($organisationType as $k=>$v)
                                        <option @php if(isset($UserOrganisation->type)){
                                            if ($UserOrganisation->type == $v->id) {
                                            echo 'selected';
                                            }
                                            }
                                            @endphp value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('organisation_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile_input text_field">
                                    <label>About <span style="color:red">*</span></label>
                                    <textarea class="form-control controlTextLength" text-length="600" id="" name="about" maxlength="600" aria-label="With textarea" required autofocus>{{(isset($UserOrganisation->about))?$UserOrganisation->about:'' }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input select2forError">
                                    <label>Services</label>
                                    <select name="service_id[]" class="outline js-select2 @error('service_id') is-invalid @enderror" id="" multiple autofocus>
                                        @foreach ($organisationService as $k=>$v)
                                        <option value="{{ $v->id }}" @if(isset($UserOrganisation->organizationServices) && in_array($v->id, $UserOrganisation->organizationServices))selected @endif>{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('service_id')
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
                                    <label>Located In <span style="color:red">*</span></label>
                                    <select name="located_in" class="@error('located_in') is-invalid @enderror" id="" required autofocus>
                                        <option value="">Select</option>
                                        @foreach ($country as $k=>$v)
                                        <option @php if(isset($UserOrganisation->location_in)){
                                            if ($UserOrganisation->location_in == $v->id) {
                                            echo 'selected';
                                            }
                                            }
                                            @endphp value="{{ $v->id }}">{{ $v->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('located_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Available To Work In <span style="color:red">*</span></label>
                                    <select name="available_to_work_in" class="@error('available_to_work_in') is-invalid @enderror" id="" required autofocus>
                                        <option value="">Select</option>
                                        <option @if(isset($UserOrganisation->available_to_work_in))
                                            @if ("virtually" == $UserOrganisation->available_to_work_in) {
                                            {{'selected'}}
                                            @endif

                                            @endif value="virtually">Virtually
                                        </option>
                                        <option @if(isset($UserOrganisation->available_to_work_in)){
                                            @if ("physically" == $UserOrganisation->available_to_work_in) {
                                            {{'selected'}}

                                            @endif
                                            @endif value="physically">Physically
                                        </option>
                                    </select>
                                    @error('available_to_work_in')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input select2forError">
                                    <label> Languages Spoken</label>
                                    <select name="language_id[]" class="outline js-select2 @error('language_id') is-invalid @enderror" id="lang" multiple autofocus>
                                        @foreach ($languages as $k=>$v)
                                        <option value="{{ $v->id }}" @if(isset($UserOrganisation->organizationLanguages )&&(in_array($v->id, $UserOrganisation->organizationLanguages)))selected @endif>{{ $v->name }}</option>
                                        @endforeach

                                    </select>
                                    @error('language_id')
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
                                    <label>IMDB Profile <span style="color:red">*</span></label>
                                    <input type="url" class="outline form-control @error('imdb_profile') is-invalid @enderror" placeholder="IMDB Profile" name="imdb_profile" value="{{(isset($UserOrganisation->imdb_profile))?$UserOrganisation->imdb_profile:'' }}" aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                    @error('imdb_profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>LinkedIn Profile <span style="color:red">*</span></label>
                                    <input type="url" class="outline form-control @error('linkedin_profile') is-invalid @enderror" placeholder="LinkedIn Profile" name="linkedin_profile" value="{{(isset($UserOrganisation->linkedin_profile))?$UserOrganisation->linkedin_profile:'' }}" aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                    @error('linkedin_profile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Website <span style="color:red">*</span></label>
                                    <input type="url" class="outline form-control @error('website') is-invalid @enderror" placeholder="Website" aria-label="Username" name="website" value="{{(isset($UserOrganisation->website))?$UserOrganisation->website:'' }}" aria-describedby="basic-addon1" required autofocus>
                                    @error('website')
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
                                    <label>Introduction Video <span style="color:red">*</span></label>
                                    <input type="url" class="outline form-control @error('intro_video_link') is-invalid @enderror" placeholder="Paste link here" name="intro_video_link" value="{{(isset($UserOrganisation->intro_video_link))?$UserOrganisation->intro_video_link:'' }}" aria-label="Username" aria-describedby="basic-addon1" required autofocus>
                                    @error('intro_video_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-3 d-flex align-items-end">
                                <div>
                                    <button class="save_add_btn">Add another</button>
                                </div>
                            </div> --}}
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input">
                                    <label>Team size</label>
                                    <input type="number" class="form-control" name="team_size" value="{{(isset($UserOrganisation->team_size))?$UserOrganisation->team_size:'' }}" placeholder="Team size" aria-label="Username" aria-describedby="basic-addon1">
                                    @error('team_size')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 d-flex my-3 align-items-center">
                                <div class="organisation_cmn_text deep-pink">
                                    <h6>Team members</h6>
                                </div>
                                <!-- <div class="mx-5 icon_container"><i class="fa fa-plus icon-size deep-pink" aria-hidden="true"></i></div> -->
                                <div class="mx-5 icon_container pointer" data-toggle="modal" data-target="#inviteMemberModal"> <span class="icon-size deep-pink">+</span></div>

                                <!-- Invite Members modal  -->
                                <div class="modal fade" id="inviteMemberModal" tabindex="-1" role="dialog" aria-labelledby="inviteMemberModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content bg_3308">
                                            <div class="modal-body p-0">
                                                <section class="p-3">
                                                    <div class="container">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="signup-text  mt-5 mt-md-5"> Invite Members </div>

                                                                <div class="proctect_by_capta_text mt-4 text-center">
                                                                    You can invite up to two members in your enterprise plan.
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mt-4">
                                                                <input type="email" id="email_1" name="email_1" value="" placeholder="First email" class="modal_input">
                                                                @error('email_1')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-12 mt-3">
                                                                <input type="email" id="email_2" name="email_2" value="" placeholder="Second email" class="modal_input">
                                                                @error('email_2')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-12 py-3">
                                                                <input type="hidden" id="organization_id" name="organization_id" value="@if (!empty($UserOrganisation->id)) {{$UserOrganisation->id}} @endif">
                                                                <button type="button" class="invite_btn">Invite</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div><img src="{{ asset('images/asset/photo-1595152452543-e5fc28ebc2b8 2.png') }}" class="w-100"></div>
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="organisation_cmn_text">Title</div>
                                    <div class="icon_container"><i class="fa fa-times-circle icon-size deep-pink" aria-hidden="true"></i></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div><img src="{{ asset('images/asset/67a6c213a22d2ba4c3982a55d828b5c7 1.png') }}" class="w-100"></div>
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="organisation_cmn_text">Title</div>
                                    <div class="icon_container"><i class="fa fa-times-circle icon-size deep-pink" aria-hidden="true"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-4">
                                    <button class="cancel_btn mx-3">Discard</button>
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
@include('website.include.footer')
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {

        $('.for_hide').css('display', 'block');
        $('.for_show').css('display', 'none');
        $('.open_file_explorer').click(function(e) {
            $(this).parents('.custom_file_explorer').find('.file_element').click();
        });

        $('.file_element').change(function() {
            var output = $(this).parents('.custom_file_explorer').find('.upload_preview');
            const file = this.files;
            var reader = new FileReader();
            reader.onload = function() {
                output.attr('src', reader.result);
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

    $('.invite_btn').click(function() {
        var email_1 = $('#email_1').val();
        var email_2 = $('#email_2').val();
        var organization_id = $('#organization_id').val();

        $.ajax({
            url: "{{ route('team-email') }}",
            type: 'POST',
            dataType: 'json',
            data: {
                organization_id: organization_id,
                email_1: email_1,
                email_2: email_2,
                "_token": "{{ csrf_token() }}"
            },
            success: function(response) {
                toastMessage(response.status, response.msg);
                $('.modal').hide();
                $('.modal-backdrop').remove();
            },
            error: function(response, status, error) {
                console.log(response);
                console.log(status);
                console.log(error);
            }
        });
    });
    $('.delete_image').on('click', function() {
        var image_x = document.getElementsByClassName("upload_img_container");
        $(".upload_preview").attr("src", "");
        // $("img").removeClass("croperImg");

        $('.for_hide').css('display', 'block');
        $('.for_show').css('display', 'none');

    })
</script>
@endpush