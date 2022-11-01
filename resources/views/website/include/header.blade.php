@section('header')
<header class="Header_main_container">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
              aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-logo" href="#">
              <img src="{{ asset('images/asset/Logo-white-trans.png') }}" width="220" height="75" alt="image">
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo01">
              <ul class="navbar-nav mt-2 mt-lg-0">
                <li>
                  <a class="header-nav-link active" href="#">Project</a>
                </li>
                <li>
                  <a class="header-nav-link" href="{{route('guide-view')}}">Industry Guide</a>
                </li>
                <li>
                  <div class="dropdown home-dropdown">
                    <a class="btn dropdown-toggle header-nav-link" href="#" role="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Training
                    </a>
                    <ul class="dropdown-menu px-3">
                      <li>
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label mx-2" for="flexCheckDefault">
                          Features
                        </label>
                      </li>
                      <li class="dropdown-list">
                        <input class="form-check-input home-checkbox" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label mx-2" for="flexCheckDefault">
                          Animation
                        </label>
                      </li>
                      <li class="dropdown-list">
                        <input class="form-check-input home-checkbox" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label mx-2" for="flexCheckDefault">
                          Biography
                        </label>
                      </li>
                    </ul>
                  </div>
                </li>
                <li>
                  <a class="header-nav-link" href="#">Jobs</a>
                </li>
              </ul>
            </div>
            <i class="fa fa-user-circle mx-2"
              style="font-size:25px; color: #DD45B3;background-color: white; border-radius: 50%;border:none"
              aria-hidden="true"></i>
              <a href="{{ route('profile-private-show')}}" class="text_decor_none">
                <span>Profile</span>
              </a>
        </div>
        </nav>
      </div>
    </div>
</header>
@endsection