@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
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
.bg_blue {
    background: rgb(28,3,48);
 }
</style>


@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
<section class="main-body bg_blue pb_8">
    <div class="job_container">
        <div class="bg_linear">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="project-text text-center mt-4">Search Latest Jobs</div>
                    <div class="duration-lang-text white text-center mt-3">It is our job to make your search for people in the film and media fraternity, a piece of cake! Here's your slice. </div>
                    <form method="post" action="{{ route('showJobSearchResults') }}"> 
                        @csrf                       
                    <div class="input_wraper mt-3">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="profile_input mt-3 mt-md-0">
                                    <input type="text" name="search" id="search-profile" placeholder="Title">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class=" mt-3 mt-md-0">
                                    <select class="js-select2"  id ="skills" name ="skills[]" multiple="multiple">
                                    @foreach($skills as $skill)
                                              
                                              @if(isset(request('skills')[0]) && in_array($skill->id, request('skills')))
                                              <option value="{{$skill->id}}" data-badge="" selected>{{$skill->name}}</option>
                                              @else
                                              <option value="{{$skill->id}}" data-badge="">{{$skill->name}}</option>
                                              @endif
                                    
                                   @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mt-3 mt-md-0">
                                    <select class="country_select2 @error('countries') is-invalid @enderror" id="countries"name = "countries[]" multiple="multiple">

                                    @foreach($countries as $country)
                                              
                                                        @if(isset(request('countries')[0]) && in_array($country->id, request('countries')))
                                                        <option value="{{$country->id}}" data-badge="" selected>{{$country->name}}</option>
                                                        @else
                                                        <option value="{{$country->id}}" data-badge="">{{$country->name}}</option>
                                                        @endif
                                              
                                     @endforeach
                                    
                                     
                                    </select>


                                    
                                    @error('countries')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                           
                            <div class="col-md-3">
                                <div class="mt-3 mt-md-0">
                                    <select class="emp-select2"  id ="employments"name ="employments[]" multiple="multiple">
                                    @foreach($employments as $emp)
                                              
                                              @if(isset(request('employments')[0]) && in_array($emp->id, request('employments')))
                                              <option value="{{$emp->id}}" data-badge="" selected>{{$emp->name}}</option>
                                              @else
                                              <option value="{{$emp->id}}" data-badge="">{{$emp->name}}</option>
                                              @endif
                                    
                                   @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-1 my-3 my-md-0">
                                <button type = "submit"class="job_search_btn profile_search_btn">Search</button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <div class ="row">
                        <div class="d-flex justify-content-center mb-3" >
                        <a href="{{route('job-create-page')}}"><button type = "button"class="job_search_btn  post-job" style="margin-right:30px">Post A Job</button></a>
                        <a href="{{ route('posted-job') }}"><button type = "button"class="job_search_btn  post-job">My Jobs</button></a>
                {{-- <button type = "button"class="job_search_btn  post-job">My Jobs</button> --}}
                        </div>

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

    $(".country_select2").select2({
      closeOnSelect: false,
      placeholder: "Location",
      allowClear: true,
        language: {
      noResults: function() {
        return '<button class="no_results_btn">No Result Found</a>';
      },
    },
    escapeMarkup: function(markup) {
      return markup;
    },
      
  });
  $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Skills",
        allowClear: true,
        language: {
      noResults: function() {
        return '<button class="no_results_btn">No Result Found</a>';
      },
    },
    escapeMarkup: function(markup) {
      return markup;
    },
        
    });
   $(".emp-select2").select2({
        closeOnSelect: false,
        placeholder: "Employement Type",
        allowClear: true,
        language: {
      noResults: function() {
        return '<button class="no_results_btn">No Result Found</a>';
      },
    },
    escapeMarkup: function(markup) {
      return markup;
    },
        
    });

    $('.profile_search_btn').on('click',function(e){
        var countries = $("#countries :selected").length;
        var talent = $("#talentType :selected").length;
        var search = $.trim($('#search-profile').val());


    // if(!search  && countries  == 0 && talent  == 0){
    //      e.preventDefault();
    //      toastMessage(0,"Please apply filter.");
    //      $("#error-toast").toast("show");
    //      $("#success-toast").toast("show");
    //   }else{
    //      $('#filter').submit();
    //   }
  
  });

</script>
@endpush