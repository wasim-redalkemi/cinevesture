@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('css')
<style>
.job_container {
    background-image:url("{{asset('images/asset/pexels-matheus-bertelli-2598630.jpg')}}");
    height: 100%;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    width: 100%;
}
</style>


@endsection

@section('content')

<section class="main-body pb_8">
    <div class="job_container">
        <div class="bg_linear">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="project-text text-center mt-4">YOUR GATEWAY FOR TALENT AND SERVICES</div>
                    <div class="duration-lang-text white text-center mt-3">It is our job to make your search for people in the film and media fraternity, a piece of cake! Here's your slice. </div>
                    <div class="input_wraper mt-3">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input mt-0">
                                    <input type="text" name="" placeholder="People">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input mt-0">
                                    <select class="js-select2" multiple="multiple">
                                        <option value="Hindi" data-badge="">Hindi</option>
                                        <option value="English" data-badge="">English</option>
                                        <option value="Spanish" data-badge="">Spanish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="profile_input mt-0">
                                    <select class="js-select2" multiple="multiple">
                                        <option value="Hindi" data-badge="">Hindi</option>
                                        <option value="English" data-badge="">English</option>
                                        <option value="Spanish" data-badge="">Spanish</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="job_search_btn">Search</button>
                            </div>
                        </div>
                    </div>
                    </div>
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

@push('scripts')
<script>
    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Placeholder",
        allowClear: true,
        tags: true
    });
</script>
@endpush