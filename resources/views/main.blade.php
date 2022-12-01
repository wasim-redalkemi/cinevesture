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
 
          <div class="item">
            <div class="home-upper-slider">
              <div class="img-container w_maxcont">
                <img src="{{ asset('public/images/asset/Screenshot 2021-05-28 at 11.48 1.png') }}"  height="100%" alt="image">
              </div>
              <div class="carosel-card-cntainer">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="project-text mt-5 pt-2"> Projects </div>
                      <div class="project-sub-text mt-1">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore
                        </div>
                      <div class="duration-lang-text mt-1">1hr 5min | English | Horror</div>
                      <button class="watch-now-btn mt-4"><a href="{{ route('public-view', ['id'=>3]) }}">Watch now</a></button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="item">
            <div class="home-upper-slider">
              <div class="img-container w_maxcont">
                <img src="{{ asset('public/images/asset/Screenshot 2021-05-28 at 11.48 1.png') }}" height="100%" width="100%" alt="image">
              </div>
              <div class="carosel-card-cntainer">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="project-text mt-5 pt-2"> Projects </div>
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
          <div class="item">
            <div class="home-upper-slider">
              <div class="img-container w_maxcont">
                <img src="{{asset('public/images/asset/Screenshot 2021-05-28 at 11.48 1.png') }}" height="100%" width="100%" alt="image">
              </div>
              <div class="carosel-card-cntainer">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="project-text mt-5 pt-2"> Projects </div>
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
        </div>
      </div>

      <div class="home_subsection">
        <div class="container">
          <div class="row">
            <div class="col-md-12 carousel-header-text">
              <h1>Thriller</h1>
            </div>
          </div>
        </div>
        <div class="test owl-carousel owl-theme">
          <div class="home_img_wrap">
            <div class="slider">
              <div class="img-container">
                <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" alt="image">
              </div>
              <div class="secondry-card-top-container w-100">
                <div>Movie Title</div>
                <div>
                  <i class="fa fa-heart" style="color: white;" aria-hidden="true"></i>
                </div>
              </div>
              <div class="secondry-card-bottom-container">
                Duration / Language / Genre
              </div>
            </div>
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/download (3) 2.png') }}" alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/43710-posts 2.png') }}" alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/download (3) 2.png') }}" alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/43710-posts 2.png') }}" alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/download (3) 2.png') }}" alt="image">
          </div>
        </div>
      </div>

      <div class="home_subsection">
        <div class="container">
          <div class="row">
            <div class="col-md-12 carousel-header-text">
            <h1> Horror</h1>
            </div>
          </div>
        </div>
        <div class="test owl-carousel owl-theme">
          <div class="home_img_wrap">
            <div class="slider">
              <div class="img-container">
                <img src="{{asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" alt="image">
              </div>
            </div>
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/download (3) 2.png') }}" alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/43710-posts 2.png') }}" alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/download (3) 2.png') }}" alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/43710-posts 2.png') }}" alt="image">
          </div>
        </div>
      </div>

      <div class="home_subsection pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12 carousel-header-text">
            <h1>  sci - fi</h1>
            </div>
          </div>
        </div>
        <div class="test owl-carousel owl-theme">
          <div class="home_img_wrap">
            <div class="slider">
              <div class="img-container">
                <img src="{{ asset('public/images/asset/ba947a848086b8f90238636dcf7efdb5 1.png') }}" width="370" height="240" alt="image">
              </div>
            </div>
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/download (3) 2.png') }}"  alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/43710-posts 2.png') }}"  alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/Rectangle 42.png') }}" alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/download (3) 2.png') }}"  alt="image">
          </div>
          <div class="home_img_wrap">
            <img src="{{ asset('public/images/asset/gordon-cowie-OPlXmibx__I-unsplash 1.png') }}" alt="image">
          </div>
        </div>
      </div>
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
      // autoplay: true,
      loop: true,
      nav: true,
      center: true,
      margin: 10,
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
      // autoplay: true,
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
