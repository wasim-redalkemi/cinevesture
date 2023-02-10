@section('footer')
<footer class="footer ">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 text-center d-flex align-items-center justify-content-center justify-content-md-start col-md-4">
          <img src="{{ asset('images/asset/Logo-white-trans.png') }}" width="225" height="76" alt="image">
        </div>
        <div class="col-lg-9 col-md-8">
          <div class="row">
            <div class="col-lg-3 text-md-start text-center">
              <div> <a href="https://www.mkt.cinevesture.com/about-us/"> About Us</a></div>
              <div class="mt-1"> <a href="https://www.mkt.cinevesture.com/contact-us/"> Contact Us</a></div>
            </div>
            <!-- <div class="col-lg-3 text-md-start text-center mt-3 mt-md-0">
              <div> <a href="#">Press</a></div>
              <div class="mt-1"> <a href="#"> Resources</a></div>
            </div> -->
            <div class="col-lg-3 text-md-start text-center mt-3 mt-md-0">
              <div  class=""> <a class="pointer" href="https://www.mkt.cinevesture.com/terms-of-use/"> Terms and Conditions</a></div>
              <div class="mt-1"> <a class="pointer" href="https://www.mkt.cinevesture.com/privacy-policy/"> Privacy Policy</a></div>
            </div>
            <div class="col-lg-3">
              <div class="text-md-start text-center"> <a href="https://www.mkt.cinevesture.com/help/"> Help</a></div>
            </div>
            <!-- <div class="col-lg-3"></div> -->
          </div>
        </div>
      </div>
    </div>
    <div class="sub-footer">
      <div class="info">
        <ul class="info-ul">
          
          <li>
            <a href="{{config('constants.SOCIAL_MEDIA_LINK_FACEBOOK')}}" target="_blank">
              <i class="fa fa-facebook" style="font-size:25px;" aria-hidden="true"></i>
            </a>
          </li>
          <li>
            <a href="{{config('constants.SOCIAL_MEDIA_LINK_LINKEDIN')}}" target="_blank">
              <i class="fa fa-linkedin-square" style="font-size:25px;" aria-hidden="true"></i>
            </a>
          </li>
          
          <li>
            <a href="{{config('constants.SOCIAL_MEDIA_LINK_INSTAGRAM')}}" target="_blank">
              <i class="fa fa-instagram" style="font-size:25px;" aria-hidden="true"></i>
            </a>
          </li>
          
          <li>
            <a href="{{config('constants.SOCIAL_MEDIA_LINK_TWITTER')}}" target="_blank">
              <i class="fa fa-twitter" style="font-size:25px;" aria-hidden="true"></i>
            </a>
          </li>
          
          <li>
            <a href="{{config('constants.SOCIAL_MEDIA_LINK_YOUTUBE')}}" target="_blank">
              <i class="fa fa-youtube" style="font-size:25px;" aria-hidden="true"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="mb-3 help-text">
      © 2023 Cinvesture. All rights reserved.
      </div>
    </div>
  </footer>
@include('website.include.term_and_condition')
@include('website.include.privacy_policy')
@endsection