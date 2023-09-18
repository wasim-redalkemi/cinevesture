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
                <img src="{{ asset('images/asset/20230803084958wallpaperflare.com_wallpaper_(1).jpg') }}" alt="image">
                    
                @endif
                {{-- <img src="{{ asset('public/images/asset/Screenshot 2021-05-28 at 11.48 1.png') }}" class="root_img" alt="image"> --}}
              </div>
             {{-- <input type="hidden" name="freeToast" id="freeToast" value="{{$sub}}"> --}}
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
                        <span class="blackTextShadow">  @php
                            echo $v->logline
                        @endphp</span>
                        @endif
                      </div>
                      <div class="duration-lang-text mt-1">
                        <span class="blackTextShadow">
                        @if (!empty($v->duration))
                        {{$v->duration.' min'}}
                        {{-- {{date('H:i', mktime(0,$v->duration)).' min'}} | --}}
                        {{-- <?php echo ((intdiv($v->duration, 60)>0)?sprintf(intdiv($v->duration, 60).' hr'):'') .' '. ((($v->duration % 60)>0)?( sprintf($v->duration % 60).' min'):'');?> --}}
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
                      <div class="duration-lang-text mt-1">125 min | English | Horror</div>
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
                      <div class="duration-lang-text mt-1">74 min | English | Horror</div>
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
            <div class="home_subsection" style="position: relative;">
              <div class="container">
                <div class="row">
                  <div class="col-md-12 carousel-header-text">
                    <h1 class="slider_elem_title">{{$v->list_name}}</h1>
                  </div>
                </div>
              </div>
              <div class="test owl-carousel owl-theme">
                @foreach ($v->lists as $k1=>$v1)
                <div class="home_img_wrap b_r owl_item_at{{$k1}}">
                  <div class="home_slider">
                    <div class="main_img_elem_wrap">
                      <div class="img-container">
                        @if (!empty($v1->projectImage) || isset($v1->projectImage))                            
                        <img src="{{ Storage::url($v1->projectImage->file_link) }}" alt="image">
                        @else
                        <img src="{{ asset('images/asset/20230803084958wallpaperflare.com_wallpaper_(1).jpg') }}" alt="image">                            
                        @endif                            
                      </div>
                    </div>
                    
                    
                    <a href="{{ route('public-view', ['id'=>$v1->id]) }}">
                    <div class="main_slider_elem_wrap">
                      <div class="secondry-card-top-container w-100">
                        <div>
                        <!-- <a href="{{ route('public-view', ['id'=>$v1->id]) }}" > -->
                          @if (isset($v1->project_name) && !empty($v1->project_name))
                        <span class="white">{{$v1->project_name}}</span> 
                          @endif
                        <!-- </a> -->
                        </div>
                        <!-- <div>
                            <i class="fa fa-heart-o icon-size like-project" style="cursor: pointer;" data-id="{{$v1->id}}" aria-hidden="true"></i>
                        </div> -->
                       
                      </div>
                      <div class="secondry-card-bottom-container">
  
                        @if (isset($v1->duration) && !empty($v1->duration))
                        {{$v1->duration.' min'}}
                        {{-- <span class="white"><?php echo sprintf(intdiv($v1->duration, 60).' hr') .' '. ( sprintf($v1->duration % 60).' min');?> /</span> --}}
                        @endif
                        {{-- @if (isset($v1->projectLanguages[0]) && !empty($v1->projectLanguages[0]))
                         <span class="white"> {{$v1->projectLanguages[0]['name']}} /</span>
                        @endif --}}
                        {{-- @if (isset($v1->genres[0]) && !empty($v1->genres[0]))
                         <span class="white"> {{$v1->genres[0]['name']}} </span>
                        @endif --}}
                        {{-- @php
                          $country_data = $v1->toArray();
                        @endphp
                        @if (isset($country_data['project_countries'][0]) && !empty($country_data['project_countries'][0]))
                        <span class="white"> {{$country_data['project_countries'][0]['name']}}</span>
                        @endif --}}
                      </div>
                      
                  </div>
                    </a>
                  <div class="like_btn_wrapper">
                     <div>
                      <i class="text-white fa c_red icon-size-heart <?php if(isset($v1->isfavouriteProjectMain[0]->id)){echo'fa-heart';}else{echo'fa-heart-o';} ?> icon-size Aubergine like-project " style="cursor: pointer;" data-id="{{$v1->id}}" aria-hidden="true"></i>
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
  $( document ).ready(function() {
    // console.log( "ready!" );

    $('.like-project').on('click', function(e) {
      // console.log('jscn');
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
                        // toastMessage("success", resp.msg);
                        break;
                    }
                    if(classList[i] == 'fa-heart')
                    {
                        element.removeClass('fa-heart');
                        element.addClass('fa-heart-o');
                        // toastMessage("success", resp.msg);

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
  });  

    $(".main_slider.owl-carousel").owlCarousel({
      center: true,
      // autoPlay: 500,
      // autoplayTimeout: 3000,
      autoplay: true,
      loop: true,
      nav: false,
      items: 1,
      margin: 10,
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
      loop: false,
      nav: true,
      margin: 0,
      center: false,
      items: 1,
      autoplayHoverPause: true,
      stagePadding: 00,
      responsive: {
        360: { items: 1.51 },
        390: { items: 1.64 },
        393: { items: 1.64},
        412: { items: 1.73 },
        1280: {items: 5.40 },
        1366: {items: 5.76 },
        1536: {items: 6.48 },
        1920: {items: 8.10 },
      },
    });
    var hasUserSubscription= "{{ Session::get('freeSubscription')}}";
    console.log(hasUserSubscription);
    if (hasUserSubscription!='free') {
      sessionStorage.setItem("freeToastMSG", "1"); 
    }

    var slider_elem_title = $('.slider_elem_title').offset();
    var slider_elem_child = $('.owl_item_at_0').offset();
    var leftLen = slider_elem_title.left;
    var childLeftLen = 0;//slider_elem_child.left;  
    // console.log(leftLen);
    // console.log(childLeftLen);
    var newLeftLen = ((leftLen-childLeftLen)+15);
    
    $('.test.owl-carousel .owl-item').css({"position": "relative","left":newLeftLen+"px"});
  </script>
@endsection
