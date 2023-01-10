
@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')

<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">            
                <div class="d-flex justify-content-between my-3">
                    <div class="profile_text"><h1>Projects</h1></div>
                    <button class="guide_profile_btn h_40"><a class="btn-link text_decor_none" href="{{ route('project-overview')}}">Add a Project</a></button>
                </div>
                <div class="row">
                @foreach($UserProject as $k=>$v)
                    <div class="col-md-4">
                    
                            <div class="project-img-container">
                                @if (empty($v->projectImage->file_link))
                                    <img src="{{ asset('images/asset/download (3) 1.png') }}" style="height: 172px; width: 100%"  />
                                @else
                                    <img src="{{ asset('storage/'.$v->projectImage->file_link)}}" class="width_inheritence" alt="image">
                                @endif
                                <div class="project_card_data w-100 h-100">
                                    <div><a href="{{route('project-overview',['id'=>$v->id])}}"><i class="fa fa-pencil mx-2 ancor-link-style" aria-hidden="true"></i></a></div>
                                <div>
                                    {{-- <i class="fa fa-trash-o" aria-hidden="true"></i> --}}
                                    <a class="confirmAction" href="{{route('project-delete',['id'=>$v->id])}}">
                                        <!-- <img src="{{ asset('images/asset/delete-icon.svg') }}"/> -->
                                        <i class="fa fa-trash-o white" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            </div>
                            <div>
                            <a href="{{route('public-view')}}?id={{$v->id}}" style="outline: none; text-decoration:none">
                            <div class="movie_name_text">{{ucFirst($v->project_name)}}</div>
                                @if(isset($v->user_status))
                                @if($v->user_status == 'draft')
                                <div class="published_text mb-5">Draft</div>
                                @else
                                <div class="published_text mb-5">Published</div>
                                @endif
                                @else
                                <div class="published_text mb-5">-</div>
                                @endif
                            </div>
                                </a>
                            <!-- </div> -->
                         
                         
                       
                    </div>
                    @endforeach
                            {{-- <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image"> --}}
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
                            <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
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
                            <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
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
                            <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
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
                            <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
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
                            <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
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
                            <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
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
                            <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
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
                            <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" class="width_inheritence" alt="image">
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