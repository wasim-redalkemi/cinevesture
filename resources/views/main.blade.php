@extends('website.layouts.app')

{{-- @section('title','Cinevesture-index') --}}

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
          @if(isset($project_lists_carousel->lists[0]) && !empty($project_lists_carousel->lists[0]))
          @foreach ($project_lists_carousel->lists as $k=>$v)
          <div class="item">
            <div class="home-upper-slider">
              <div class="img-container w_maxcont">
                @if (!empty($v->banner_image) || isset($v->banner_image))
                <img src="{{ Storage::url($v->banner_image) }}" alt="image">
                @else
                <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" alt="image">
                    
                @endif
                {{-- <img src="{{ asset('public/images/asset/Screenshot 2021-05-28 at 11.48 1.png') }}" class="root_img" alt="image"> --}}
              </div>
              <div class="carosel-card-cntainer">
                <div class="carosel-card-cntainer-two">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="project-text mt-5 pt-2">
                        @if (!empty($v->project_name))
                      <span class="blackTextShadow">  {{$v->project_name}}</span>
                        @endif
                      </div>
                      <div class="project-sub-text mt-1">
                        @if (!empty($v->logline))
                        <span class="blackTextShadow">  {{$v->logline}}</span>
                        @endif
                      </div>
                      <div class="duration-lang-text mt-1">
                        <span class="blackTextShadow">
                        @if (!empty($v->duration))
                        {{-- {{date('H:i', mktime(0,$v->duration)).' min'}} | --}}
                        <?php echo ((intdiv($v->duration, 60)>0)?sprintf(intdiv($v->duration, 60).' hr'):'') .' '. ((($v->duration % 60)>0)?( sprintf($v->duration % 60).' min'):'');?>
                        @endif
                        
                        {{-- @foreach ($v->projectLanguages as $k1=>$v1)
                        {{$v1->name}} ,
                        @endforeach  --}}

                        @if (isset($v->projectLanguages) && !empty($v->projectLanguages))
                        |
                        {{$v->projectLanguages[0]['name']}}
                        @endif

                        @if (isset($v->genres[0]) && !empty($v->genres[0]))
                        |
                        {{$v->genres[0]['name']}}
                        @endif

                        </span>
                      </div>
                      <button class="watch-now-btn mt-4"><a href="{{ route('public-view', ['id'=>$v->id]) }}" style="color:white !important;">View Project</a></button>
                      {{-- @else
                        <div class="not-found-text">
                          <p class="blackTextShadow">No Data Found</p>
                        </div>
                      @endif                       --}}
                    </div>
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
                      <div class="duration-lang-text mt-1">2hr 5min | English | Horror</div>
                      <button class="watch-now-btn mt-4">View Project</button>
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
                      <div class="duration-lang-text mt-1">1hr 10min | English | Horror</div>
                      <button class="watch-now-btn mt-4">View Project</button>
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
                    <h1 class="slider_elem_title">{{$v->list_name}}</h1>
                  </div>
                </div>
              </div>
              <div class="test owl-carousel owl-theme">
                @foreach ($v->lists as $k1=>$v1)
                <div class="home_img_wrap owl_item_at_{{$k1}}">
                  <div class="home_slider">
                    <div class="main_img_elem_wrap">
                      <div class="img-container">
                        @if (!empty($v1->projectImage) || isset($v1->projectImage))                            
                        <img src="{{ Storage::url($v1->projectImage->file_link) }}" alt="image">
                        @else
                        <img src="{{ asset('images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" alt="image">                            
                        @endif                            
                      </div>
                    </div>
                    <div class="main_slider_elem_wrap">
                      <div class="secondry-card-top-container w-100">
                        <div>
                        <a href="{{ route('public-view', ['id'=>$v1->id]) }}" >
                          @if (isset($v1->project_name) && !empty($v1->project_name))
                        <span class="white">{{$v1->project_name}}</span> 
                          @endif
                        </a>
                        </div>
                        <div>
                          <i class="fa fa-heart-o icon-size like-project" style="cursor: pointer;" data-id="{{$v1->id}}" aria-hidden="true"></i>
                        </div>
                      </div>
                      <div class="secondry-card-bottom-container">
                        <a href="{{ route('public-view', ['id'=>$v1->id]) }}">
  
                        @if (isset($v1->duration) && !empty($v1->duration))
                        <span class="white"><?php echo sprintf(intdiv($v1->duration, 60).' hr') .' '. ( sprintf($v1->duration % 60).' min');?> /</span>
                        @endif
                        @if (isset($v1->projectLanguages[0]) && !empty($v1->projectLanguages[0]))
                         <span class="white"> {{$v1->projectLanguages[0]['name']}} /</span>
                        @endif
                        @if (isset($v1->genres[0]) && !empty($v1->genres[0]))
                         <span class="white"> {{$v1->genres[0]['name']}} /</span>
                        @endif
                        {{-- @php
                          $country_data = $v1->toArray();
                        @endphp
                        @if (isset($country_data['project_countries'][0]) && !empty($country_data['project_countries'][0]))
                        <span class="white"> {{$country_data['project_countries'][0]['name']}}</span>
                        @endif --}}
                        </a>
                      </div>
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
      // autoPlay: 500,
      autoplayTimeout: 3000,
      // autoplay: true,
      loop: true,
      nav: true,
      center: true,
      items: 1,
      autoplayHoverPause: true,
      responsive: {
        480: { items: 1 },
        768: { items: 1 },
        1024: {
          items: 1
        }
      },
    });

    $(".test.owl-carousel").owlCarousel({
      autoplayTimeout: 3000,
      autoplay: true,
      loop: true,
      nav: true,
      margin: 20,
      center: false,
      items: 1,
      autoplayHoverPause: true,
      stagePadding: 50,
      responsive: {
        480: { items: 1 },
        768: { items: 2 },
        1080: {
          items: 2.75
        },
        1225: {
          items: 3.5
        },
        1400: {
          items: 4
        },
        1900: {
          items: 5
        },
        1925: {
          items: 5.5
        }
      },
    });

    var slider_elem_title = $('.slider_elem_title').offset();
    var slider_elem_child = $('.owl_item_at_0').offset();
    var leftLen = slider_elem_title.left;
    var childLeftLen = slider_elem_child.left;  
    console.log(leftLen);
    console.log(childLeftLen);
    var newLeftLen = ((leftLen-childLeftLen)+15);
    
    $('.test.owl-carousel .owl-item').css({"position": "relative","left":newLeftLen+"px"});
  </script>
@endsection
