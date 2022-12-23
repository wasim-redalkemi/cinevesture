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
                    <div class="project-text text-center mt-4 px-4 px-md-0">YOUR GATEWAY FOR TALENT AND SERVICES</div>
                    <div class="duration-lang-text white text-center mt-3 px-4 px-md-0">It is our job to make your search for people in the film and media fraternity, a piece of cake! Here's your slice. </div>
                    <form class="" method="Get" action="{{ route('guide-view') }}">
                        @csrf
                    <div class="input_wraper py-5 mt-3">
                        <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="profile_input mt-0">
                                    <input type="text" name="search" id="search-profile" placeholder="People">
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            <div class="col-md-4">
                                <div class="mt-3 mt-md-0">
                                    <div class="select2forError">
                                    <select class="js-select2"  id="talentType" name ="talentType[]" multiple="multiple">
                                    @foreach($talent_type as $type)
                                              
                                              @if(isset(request('talentType')[0]) && in_array($type->id, request('talentType')))
                                              <option value="{{$type->job_title}}" data-badge="" selected>{{$type->job_title}}</option>
                                              @else
                                              <option value="{{$type->job_title}}" data-badge="">{{$type->job_title}}</option>
                                              @endif
                                    
                                   @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1 mt-3 mt-md-0">
                                <button type = "submit"class="job_search_btn profile_search_btn">Search</button>
                            </div>
                        </div>
                        </form>
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
        placeholder: "Talent Type",
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
         $('#filter').submit();
      
  
  });

  $(document).ready(function(){
   
   $("#error-toast").toast("show");
   $("#success-toast").toast("show");
   


});
</script>
@endpush