
@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

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
                <div class="d-flex justify-content-between my-3">
                    <div class="profile_text"><h1>Project</h1></div>
                    <button class="guide_profile_btn h_40"><a class="btn-link text_decor_none" href="{{ route('project-overview')}}">Add a Project</a></button>
                </div>
                <div class="row">
                @foreach($UserProject as $k=>$v)
                    <div class="col-md-4">
                        <div class="img-container project-img-container">
                                @if (empty($v->profile_image))
                                    <img src="{{ asset('public/images/asset/user-profile.png') }}" width="100%" height="100%"  />
                                @else
                                    <img src="{{ Storage::url($v->profile_image) }}" class="width_inheritence" alt="image">
                                @endif
                                <div class="project_card_data w-100 h-100">
                                    <div><i class="fa fa-pencil mx-2" aria-hidden="true"></i></div>
                                <div>
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </div>
                            </div>
                            <div class="movie_name_text">{{$v->project_name}}</div>
                            @if(isset($v->save_type))
                              @if($v->save_type == 'draft')
                              <div class="movie_name_text">Draft</div>
                              @else
                              <div class="movie_name_text">Published</div>
                              @endif
                            @else
                            <div class="movie_name_text">-</div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                            {{-- <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image"> --}}
                            {{-- <div class="project_card_data w-100 h-100">
                                <div><i class="fa fa-pencil mx-2" aria-hidden="true"></i></div>
                                <div>
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </div> --}}
                            {{-- </div>
                        </div>
                        <div class="movie_name_text">Movie Name</div>
                        <div class="profile_upload_text  mb-4">Published</div> --}}
                    {{-- </div> --}}


                    {{-- <div class="col-md-4">
                        <div class="img-container">
                            <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                            <div class="project_card_data w-100 h-100">
                                <div><i class="fa fa-pencil mx-2" aria-hidden="true"></i></div>
                                <div>
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="movie_name_text">Movie Name</div>
                        <div class="profile_upload_text mb-4">Published</div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-container">
                            <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                            <div class="project_card_data w-100 h-100">
                                <div><i class="fa fa-pencil mx-2" aria-hidden="true"></i></div>
                                <div>
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="movie_name_text">Movie Name</div>
                        <div class="profile_upload_text mb-4">Published</div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-container">
                            <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                            <div class="project_card_data w-100 h-100">
                                <div><i class="fa fa-pencil mx-2" aria-hidden="true"></i></div>
                                <div>
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="movie_name_text">Movie Name</div>
                        <div class="profile_upload_text mb-4">Published</div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-container">
                            @foreach ($collection as $item)
                                
                            @endforeach
                            <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                            <div class="project_card_data w-100 h-100">
                                <div><i class="fa fa-pencil mx-2" aria-hidden="true"></i></div>
                                <div>
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="movie_name_text">Movie Name</div>
                        <div class="profile_upload_text mb-4">Published</div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-container">
                            <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                            <div class="project_card_data w-100 h-100">
                                <div><i class="fa fa-pencil mx-2" aria-hidden="true"></i></div>
                                <div>
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="movie_name_text">Movie Name</div>
                        <div class="profile_upload_text mb-4">Published</div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-container">
                            <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                            <div class="project_card_data w-100 h-100">
                                <div><i class="fa fa-pencil mx-2" aria-hidden="true"></i></div>
                                <div>
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="movie_name_text">Movie Name</div>
                        <div class="profile_upload_text mb-4">Published</div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-container">
                            <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                            <div class="project_card_data w-100 h-100">
                                <div><i class="fa fa-pencil mx-2" aria-hidden="true"></i></div>
                                <div>
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="movie_name_text">Movie Name</div>
                        <div class="profile_upload_text mb-4">Published</div>
                    </div>
                    <div class="col-md-4">
                        <div class="img-container">
                            <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
                            <div class="project_card_data w-100 h-100">
                                <div><i class="fa fa-pencil mx-2" aria-hidden="true"></i></div>
                                <div>
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <div class="movie_name_text">Movie Name</div>
                        <div class="profile_upload_text mb-4">Published</div>
                    </div> --}}
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