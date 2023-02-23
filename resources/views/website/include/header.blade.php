@section('header')

@php
    $routes = [
        "home"=>["id"=>"project","title"=>"Projects","siblingRoutes"=>[]],
        "show-guide"=>["id"=>"industry_guide","title"=>"Industry Guide","siblingRoutes"=>["guide-view"]],
        "job-search-page"=>["id"=>"jobs","title"=>"Jobs","siblingRoutes"=>["showJobSearchResults","showApplyJob"]],        
    ];
    $currentPath = Request::path();
    $routeName = \Request::route()->getName();
    $currentRoute = explode("/",$currentPath);
    $currentPath = $currentRoute[array_key_last($currentRoute)];
    if(is_numeric($currentPath)){
        $currentPath = $currentRoute[array_key_last($currentRoute)-1];
    }
@endphp
<header class="Header_main_container">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <nav class="navbar navbar-expand-lg header">
            
            <a class="navbar-logo " href="{{route('home')}}">
              <img src="{{ asset('images/asset/Logo-white-trans.png') }}" width="100%" alt="image">
            </a>
            <div class="collapse navbar-collapse navbar_sm text-initial text-md-center justify-content-between" id="navbarTogglerDemo01">
              <div></div>
            <div class="justify-content-center">
              <ul class="navbar-nav mt-2 mt-lg-0">
                @foreach($routes as $key=>$route)
                <li>
                  <a class="header-nav-link {{$key==$routeName || in_array($routeName,$route['siblingRoutes'])  ? 'active' : ''}}" href="{{route($key)}}">{{$route['title']}}</a>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="justify-content-end text-md-end text-initial">
              <?php
                if(!empty(auth()->user()) && auth()->user()->user_type !== 'A')
                {

                ?>
                  <div class="navbar_profile_position mt-2 mt-md-0">
                    <i class="fa fa-user-circle"
                  style="font-size:25px; color: #DD45B3;background-color: white; border-radius: 50%;border:none"
                  aria-hidden="true"></i>
                  <a href="{{ route('profile-private-show')}}" class="text_decor_none">
                    <span style="" class="navbar_profile_text">Profile</span>
                  </a>
                  </div>
                <?php
                }

              ?>
            </div>
              </div>
              {{-- @if (!($currentPath == 'filter') && !($currentPath == 'results') && !($currentPath == 'profile-filter') && !($currentPath == 'search') && !($currentPath == 'profile-show')) --}}
              @if ($currentPath == 'home')
              <button class="navbar-toggler mt-1" style="right: 40px;" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02"
              aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"><i class="fa fa-filter text-light" aria-hidden="true"></i></span>
            </button>
            @endif
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
              aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"><img src="{{ asset('images/asset/menu.svg') }}" alt=""></span>
            </button>
        </div>
        </nav>
      </div>
    </div>
</header>
@endsection

@push('scripts')
<script>
  $(document).click(function(e) {
	if (!$(e.target).is('.navbar_sm')) {
    	$('.collapse').collapse('hide');	    
    }
});
</script>
@endpush