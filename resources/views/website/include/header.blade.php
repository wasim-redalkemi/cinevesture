@section('header')

@php
    $routes = [
        "home"=>["id"=>"project","title"=>"Project","siblingRoutes"=>[]],
        "show-guide"=>["id"=>"industry_guide","title"=>"Industry Guide","siblingRoutes"=>[]],
        "job-search-page"=>["id"=>"jobs","title"=>"Jobs","siblingRoutes"=>["showJobSearchResults"]],        
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
              aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-logo" href="{{route('home')}}">
              <img src="{{ asset('images/asset/Logo-white-trans.png') }}" width="220" height="75" alt="image">
            </a>
            <div class="collapse navbar-collapse justify-content-center" id="navbarTogglerDemo01">
              <ul class="navbar-nav mt-2 mt-lg-0">
                @foreach($routes as $key=>$route)
                <li>
                  <a class="header-nav-link {{$key==$routeName || in_array($routeName,$route['siblingRoutes'])  ? 'active' : ''}}" href="{{route($key)}}">{{$route['title']}}</a>
                </li>
                @endforeach
              </ul>
            </div>
              <?php
                if(!empty(auth()->user()) && auth()->user()->user_type !== 'A')
                {

                ?>
                  <div>
                    <i class="fa fa-user-circle"
                  style="font-size:25px; color: #DD45B3;background-color: white; border-radius: 50%;border:none"
                  aria-hidden="true"></i>
                  <a href="{{ route('profile-private-show')}}" class="text_decor_none">
                    <span style="top: -2px;position: relative;">Profile</span>
                  </a>
                  </div>
                <?php
                }

              ?>
        </div>
        </nav>
      </div>
    </div>
</header>
@endsection