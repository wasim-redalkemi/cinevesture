@section('nav')
<div class="" >

<nav class="navbar navbar-expand-lg sub-header">
    <div class="container">
      <div class="row w_100">
        <div class="col-md-12">
          <div class="navbar_wraper_sm">
          <div class="collapse navbar-collapse justify-content-between"  id="navbarTogglerDemo02">
            <div>
            <form class="" id ="filter" method="GET" action="{{ route('get-project-filter') }}">
                        @csrf
                        <div class="d-flex d-md-none justify-content-between align-items-center">
                <div class="header-search-form">
                <div class="search"><button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                  </button>
                  <input type="text" name="search" id="search-project"class="searchTerm" placeholder="Search">
                </div>
              </div>
              <a class="my-2 my-sm-0 mr-0 " href="{{ route('project-overview')}}">
                <!-- Add a Project    -->

                <button type="button" class="add-proj-btn text-white">
                      Add a Project
                  </button>

              </a>
              </div>
              <div class="navbar_mobile">
              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                  <div class="dropdown home-dropdown">
                    <a class="btn dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Genres
                    </a>
                    <ul class="dropdown-menu nav-drop" id="list-gener">
                      @foreach($geners as $gen)
                      <li>
                        <input class="form-check-input" type="checkbox" name="geners[]" value="{{$gen->id}}" id="flexCheckDefault">
                        <label class="form-check-label mx-2" for="flexCheckDefault">
                          {{$gen->name}}
                        </label>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown home-dropdown">
                    <a class="btn dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Category
                    </a>
                    <ul class="dropdown-menu nav-drop" id="list-categories">
                       @foreach($categories as $cate)
                      <li>
                        <input class="form-check-input" type="checkbox" value="{{$cate->id}}"  name="categories[]" id="flexCheckDefault">
                        <label class="form-check-label mx-2" for="flexCheckDefault">
                          {{$cate->name}}
                        </label>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown home-dropdown">
                    <a class="btn nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Looking for
                    </a>
                    <ul class="dropdown-menu nav-drop" id="list-lookingFor">
                    @foreach($looking_for as $look)
                      <li>
                        <input class="form-check-input" type="checkbox" value="{{$look->id}}" name="looking_for[]" id="flexCheckDefault">
                        <label class="form-check-label mx-2" for="flexCheckDefault">
                          {{$look->name}}
                        </label>
                      </li>
                      @endforeach
                      
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown home-dropdown">
                    <a class="btn nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Project Stage
                    </a>
                    <ul class="dropdown-menu nav-drop" id="list-stages">
                    @foreach($project_stages as $pro)
                      <li>
                        <input class="form-check-input" type="checkbox" value="{{$pro->id}}"  name="project_stages[]" id="flexCheckDefault">
                        <label class="form-check-label mx-2" for="flexCheckDefault">
                          {{$pro->name}}
                        </label>
                      </li>
                      @endforeach
                      
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown home-dropdown">
                    <a class="btn nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Country
                    </a>
                    <ul class="dropdown-menu nav-drop" id="list-countries">
                    @foreach($countries as $con)
                      <li>
                        <input class="form-check-input" type="checkbox" value="{{$con->id}}" name="countries[]" id="flexCheckDefault">
                        <label class="form-check-label mx-2" for="flexCheckDefault">
                          {{$con->name}}
                        </label>
                      </li>
                      @endforeach
                     
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <div class="dropdown home-dropdown">
                    <a class="btn dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown"
                      aria-expanded="false">
                      Language
                    </a>
                    <ul class="dropdown-menu nav-drop" id="list-language">
                    @foreach($languages as $lang)
                      <li>
                        <input class="form-check-input" type="checkbox" name="languages[]" value="{{$lang->id}}" id="flexCheckDefault">
                        <label class="form-check-label mx-2" for="flexCheckDefault">
                          {{$lang->name}}
                        </label>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                </li>
              </ul>
              </div>
            </div>
            <div class="d-flex justify-content-center">
              <div class="header-search-form d-none d-md-block">
                <div class="search"><button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                  </button>
                  <input type="text" name="search" id="search-project" class="searchTerm" placeholder="Search">
                </div>
              </div>
              <!-- <div class="d--flex"> -->
                <button type="submit" class="header-search-btn ml_10 mr_5">Search</button>
                <a href="{{ route('project-overview')}}">
                  <button type="button" class="add-proj-btn my-2 my-sm-0 mr-0 d-none d-md-block text-white">
                      Add a Project
                  </button>
                </a>
              <!-- </div> -->
            </form>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </nav>    
</div>

@endsection

@push('scripts')
<script>
  $('.header-search-btn').on('click',function(e){
    var gener  = $("#list-gener input[type=checkbox]:checked").length
    var categories = $("#list-categories input[type=checkbox]:checked").length
    var lookingFor = $("#list-lookingFor input[type=checkbox]:checked").length
    var stages = $("#list-stages input[type=checkbox]:checked").length
    var countries = $("#list-countries input[type=checkbox]:checked").length
    var language =  $("#list-language input[type=checkbox]:checked").length
    var search = $.trim($('#search-project').val());
    $('#filter').submit();
      
  
  });

  $(document).ready(function(){
   
   $("#error-toast").toast("show");
   $("#success-toast").toast("show");
   


});
</script>

@endpush