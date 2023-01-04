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
    <section class="section mb-5">
      <div class="sub-section">
        <div class="main_slider owl-carousel">
          @if(isset($project_lists_carousel->lists[0]->projects) && !empty($project_lists_carousel->lists[0]->projects))
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
                      {{-- @if (!empty($v->projects[0])) --}}
                      <div class="project-text mt-5 pt-2">
                        @if (!empty($v->projects->project_name))
                        {{$v->projects->project_name}}
                        @endif
                      </div>
                      <div class="project-sub-text mt-1">
                        @if (!empty($v->projects->logline))
                        {{$v->projects->logline}}
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
                      <button class="watch-now-btn mt-4"><a href="{{ route('public-view', ['id'=>$v->projects->id]) }}" style="color:white !important;">Watch Now</a></button>
                      {{-- @else
                        <div class="not-found-text">
                          <p>No Data Found</p>
                        </div>
                      @endif                       --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endforeach
          @else
          <div class="item">
            <div class="home-upper-slider">
              <div class="img-container w_maxcont">
                <img src="{{ asset('public/images/asset/Screenshot 2021-05-28 at 11.48 1.png') }}" class="root_img" alt="image">
              </div>
              <div class="carosel-card-cntainer">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="project-text mt-5 pt-2">Test Project 1 </div>
                      <div class="project-sub-text mt-1">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore
                        </div>
                      <div class="duration-lang-text mt-1">1hr 5min | English | Horror</div>
                      <button class="watch-now-btn mt-4">Watch now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="home-upper-slider">
              <div class="img-container w_maxcont">
                <img src="{{ asset('public/images/asset/gordon-cowie-OPlXmibx__I-unsplash-2.jpg') }}" class="root_img" alt="image">
              </div>
              <div class="carosel-card-cntainer">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="project-text mt-5 pt-2"> Test Project 2 </div>
                      <div class="project-sub-text mt-1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore
                        et
                        dolore magna aliqua.
                        Ut enim ad minim veniam, quis nostrud exercitation.</div>
                      <div class="duration-lang-text mt-1">1hr 5min | English | Horror</div>
                      <button class="watch-now-btn mt-4">Watch now</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endif          
        </div>
      </div>

      @if (isset($project_lists_except_carousel) && !empty($project_lists_except_carousel))
        @foreach ($project_lists_except_carousel as $k=>$v)
          @if (isset($v->lists) && count($v->lists)>0)
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
                  {{-- @if (!empty($v1->projects[0])) --}}
                  <div class="home_slider">
                    <div class="img-container">
                      @if (!empty($v1->projects->projectImage) || isset($v1->projects->projectImage))
                          
                      <img src="{{ Storage::url($v1->projects->projectImage->file_link) }}" alt="image">
                      @else
                      <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" alt="image">
                          
                      @endif
                          
                    </div>
                    <div class="secondry-card-top-container w-100">
                      <div>
                      <a href="{{ route('public-view', ['id'=>$v1->projects->id]) }}" >
                        @if (isset($v1->projects->project_name) && !empty($v1->projects->project_name))
                      <span class="white">{{$v1->projects->project_name}}</span> 
                        @endif
                      </a>
                      </div>
                      <div>
                        {{-- <i class="fa fa-heart" style="color: white;" aria-hidden="true"></i> --}}
                        <i class="fa fa-heart-o icon-size like-project" style="cursor: pointer;" data-id="{{$v1->projects->id}}" aria-hidden="true"></i>
                      </div>
                    </div>
                    <div class="secondry-card-bottom-container">
                      <a href="{{ route('public-view', ['id'=>$v1->projects->id]) }}">

                      @if (isset($v1->projects->duration) && !empty($v1->projects->duration))
                      <span class="white">  {{$v1->projects->duration}} /</span>
                      @endif
                      @if (isset($v1->projects->genres[0]) && !empty($v1->projects->genres[0]))
                       <span class="white"> {{$v1->projects->genres[0]['name']}} /</span>
                      @endif
                      @php
                        $country_data = $v1->toArray();
                      @endphp
                      @if (isset($country_data['projects']['project_countries'][0]) && !empty($country_data['projects']['project_countries'][0]))
                      <span class="white">  {{$country_data['projects']['project_countries'][0]['name']}}</span>
                      @endif
                    </a>
                    </div>
                  </div>            
                </div>
                @endforeach
              </div>
            </div>
          @endif      
        @endforeach
      @endif      
    </section>
  </div>
@endsection

@section('footer')
  @include('website.include.footer')      
@endsection
  
@section('scripts')

  <script type="text/javascript">
    $('.like-project').on('click', function(e) {
      
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var project_id = $(this).attr('data-id');
    var classList = $(this).attr('class').split(/\s+/);
    var element = $(this);
    $.ajax({
        type: 'post',
        data: {'id':project_id},
        url: "{{route('project-like')}}",
        success: function(resp) {
            if (resp.status) {
                for (var i = 0; i < classList.length; i++) {
                    if (classList[i] == 'fa-heart-o') {
                        element.removeClass('fa-heart-o');
                        element.addClass('fa-heart')
                        toastMessage("success", response.msg);
                        break;
                    }
                    if(classList[i] == 'fa-heart')
                    {
                        element.removeClass('fa-heart');
                        element.addClass('fa-heart-o');
                        toastMessage("error", response.msg);

                        break;
                    }

                }
            } else {

            }
        },
        error: function(error) {
            
        }
    });

    });

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
      autoPlay: 1000,
      autoplay: true,
      // loop: true,
      nav: true,
      margin: 20,
      center: false,
      items: 1,
      stagePadding: 50,
      responsive: {
        480: { items: 1 },
        768: { items: 2 },
        1024: {
          items: 4
        },
        1550: {
          items: 5
        }
      },
    });
  </script>
@endsection
