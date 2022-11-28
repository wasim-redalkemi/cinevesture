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
            @php                
            $jobs = $userJob->toArray();                  
            @endphp
            @if (count($jobs)>0)
            {{-- @foreach ($jobs['data'] as $k=>$v) --}}
                <div class="profile_wraper profile_wraper_padding mt-md-0 mt-4">
                    <div class="profile_text">
                        <h1>Posted Jobs</h1>
                    </div>
                    <div class="d-flex">
                        <div class="posted_job_header"><a href="{{ route('posted-job',['id'=>auth()->user()->id,'status'=>'published']) }}" class="posted_job_header_link px-3"> Published Jobs</a></div>
                        <div class="posted_job_header"><a href="{{ route('posted-job',['id'=>auth()->user()->id,'status'=>'draft']) }}" class="posted_job_header_link px-3">Draft Job</a></div>
                        <div class="posted_job_header"><a href="{{ route('posted-job',['id'=>auth()->user()->id,'status'=>'unpublished']) }}" class="posted_job_header_link px-3">Unpublished Jobs</a></div>
                    </div>
                </div>
                @foreach ($jobs['data'] as $k=>$v)

                <div class="profile_wraper profile_wraper_padding">
                    <div class="d-flex justify-content-between">
                        <div class="guide_profile_main_text">
                            @if (!empty($v['title'])) {{$v['title']}} @endif
                        </div>
                        <div class="dropdown  search-page">
                            <div class="" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-ellipsis-h aubergine icon-size" aria-hidden="true"></i>
                            </div>
                            <ul class="dropdown-menu profile_dropdown_menu p-2">
                                <li>
                                <a href="{{ route('job-create-page',['job_id'=>$v['id']]) }}">  Edit Job</a>
                                </li>
                                <li>
                                <a href="">  Promote Job</a>
                                </li>
                                <li>
                                <a href="">   Unpublish Job</a>
                                </li>
                                <li>
                                <a href="">  Delete Job </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="posted_job_header">
                        @if (!empty($v['description'])) {{$v['description']}} @endif
                    </div> --}}
                    <div class="preview_headtext lh_54 candy-pink">
                        @if (!empty($v['company_name'])) {{$v['company_name']}} @endif 
                        - 
                        
                        @if (!empty($v['job_location'])>0)
                            {{$v['job_location']['name']}}
                        @else
                            <span><b>-</b></span>                    
                        @endif
                        -
                        @if (count($v['job_employements'])>0)
                            @foreach ($v['job_employements'] as $k1=>$v1)
                            {{$v1['name']}}
                            @endforeach
                        @else
                            <span><b>-</b></span>                    
                        @endif
                    </div>
                    <div class="posted_job_header Aubergine_at_night">
                        @if (!empty($v['description'])) {{$v['description']}} @endif
                    </div>
                    <div class="d-flex justify-content-between mt-4">
                        <div class="d-flex flex-wrap">
                            @if (count($v['job_skills'])>0)
                            @foreach ($v['job_skills'] as $k1=>$v1)
                                <button class="curv_cmn_btn skill_container"> {{$v1['name']}}</button>                               
                            @endforeach
                            @else
                                <span><b>-</b></span>                    
                            @endif
                        </div>
                        <div>
                            
                            <button class="guide_profile_btn w_150">View Applications</button>
                        </div>
                    </div>
                    
                </div>
                @endforeach

            @else
                <div class="not-found-text">
                    <p>No Profile Found</p>
                </div>
            @endif
            <div>
                {!! $userJob->links() !!}
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

<script type="text/javascript">
    $(".portfolio.owl-carousel").owlCarousel({
        center: true,
        autoPlay: 3000,
        autoplay: true,
        loop: true,
        nav: true,
        center: true,
        margin: 10,
        items: 5,
        responsive: {
            480: {
                items: 3
            },
            768: {
                items: 4
            },
            1024: {
                items: 5
            }
        },
    });
    $(".project.owl-carousel").owlCarousel({
        center: true,
        autoPlay: 3000,
        autoplay: true,
        loop: true,
        nav: true,
        center: true,
        margin: 10,
        items: 3,
        responsive: {
            480: {
                items: 1
            },
            768: {
                items: 2
            },
            1024: {
                items: 3
            }
        },
    });
</script>
@endsection