@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

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
                <div class="d-flex justify-content-between my-3">
                    <div class="profile_text"><h1>Project</h1></div>
                    <button class="guide_profile_btn h_40">Add a Project</button>
                </div>
                <div class="row">
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
                        <div class="profile_upload_text  mb-4">Published</div>
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
                    </div>
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
@endsection