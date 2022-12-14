@extends('website.layouts.app')

@section('title','Cinevesture-index')

@section('header')
    @include('website.include.header')
@endsection

@section('nav')
    @include('website.include.nav')
@endsection

@section('content')
  <div class="main-body">
    <section class="section">
      <div class="sub-section">
        <div class="main_slider owl-carousel">
          @foreach ($project_lists_carousel->lists as $k=>$v)
          <div class="item">
            <div class="home-upper-slider">
              <div class="img-container w_maxcont">
                @if (!empty($v->projects->projectImage->file_link) || isset($v->projects->projectImage->file_link))
                    
                <img src="{{ Storage::url($v->projects->projectImage->file_link) }}" alt="image">
                @else
                <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" alt="image">
                    
                @endif
                {{-- <img src="{{ asset('public/images/asset/Screenshot 2021-05-28 at 11.48 1.png') }}" class="root_img" alt="image"> --}}
              </div>
              <div class="carosel-card-cntainer">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      @if (!empty($v->projects[0]))
                      <div class="project-text mt-5 pt-2">
                        @if (!empty($v->projects->project_name))
                        {{$v->projects->project_name}}
                        @endif
                      </div>
                      <div class="project-sub-text mt-1">
                        @if (!empty($v->projects->director_statement))
                        {{$v->projects->director_statement}}
                        @endif
                      </div>
                      <div class="duration-lang-text mt-1">
                        @if (!empty($v->projects->duration))
                        {{$v->projects->duration}} |
                        @endif
                        
                        @foreach ($v->projects->projectLanguages as $k1=>$v1)
                        {{$v1->name}} |
                        @endforeach 
                        @if (isset($v->projects->genres[0]) && !empty($v->projects->genres[0]))
                        {{$v->projects->genres[0]['name']}}
                        @endif
                      </div>
                      <button class="watch-now-btn mt-4"><a href="{{ route('public-view', ['id'=>$v->projects->id]) }}" style="color:white !important;">Watch now</a></button>
                      @else
                        <div class="not-found-text">
                          <p>No Data Found</p>
                        </div>
                      @endif
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>

      @foreach ($project_lists_except_carousel as $k=>$v)
      <div class="home_subsection">
        <div class="container">
          <div class="row">
            <div class="col-md-12 carousel-header-text">
              <h1>{{$v->list_name}}</h1>
            </div>
          </div>
        </div>
        <div class="test owl-carousel owl-theme">
          @foreach ($v->lists as $k1=>$v1)
          <div class="home_img_wrap">
            @if (!empty($v1->projects[0]))
            <div class="slider">
              <div class="img-container">
                @if (!empty($v1->projects->projectImage) || isset($v1->projects->projectImage))
                    
                <img src="{{ Storage::url($v1->projects->projectImage->file_link) }}" alt="image">
                @else
                <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" alt="image">
                    
                @endif
                    
              </div>
              <div class="secondry-card-top-container w-100">
                <div>{{$v1->projects->project_name}}</div>
                <div>
                  <i class="fa fa-heart" style="color: white;" aria-hidden="true"></i>
                </div>
              </div>
              <div class="secondry-card-bottom-container">
                @if (isset($v1->projects->duration) && !empty($v1->projects->duration))
                  {{$v1->projects->duration}} /
                @endif
                @if (isset($v1->projects->genres[0]) && !empty($v1->projects->genres[0]))
                  {{$v1->projects->genres[0]['name']}} /
                @endif
                @php
                  $country_data = $v1->toArray();
                @endphp
                @if (isset($country_data['projects']['project_countries'][0]) && !empty($country_data['projects']['project_countries'][0]))
                  {{$country_data['projects']['project_countries'][0]['name']}}
                @endif
              </div>
            </div>
            @else
              <div class="not-found-text">
                <p>No Data Found</p>
              </div> 
            @endif
            
          </div>
          @endforeach
        </div>
      </div>
      @endforeach
    </section>
  </div>
@endsection

@section('footer')
  @include('website.include.footer')      
@endsection
  
@section('scripts')

  <script type="text/javascript">
    $(".main_slider.owl-carousel").owlCarousel({
      center: true,
      autoPlay: 3000,
      autoplay: true,
      loop: true,
      nav: true,
      center: true,
      items: 1,
      responsive: {
        480: { items: 1 },
        768: { items: 1 },
        1024: {
          items: 1
        }
      },
    });

    $(".test.owl-carousel").owlCarousel({
      center: true,
      autoPlay: 1000,
      autoplay: true,
      loop: true,
      nav: true,
      margin: 20,
      center: true,
      items: 1,
      stagePadding: 50,
      responsive: {
        480: { items: 1 },
        768: { items: 2 },
        1024: {
          items: 4
        }
      },
    });
  </script>
@endsection
