@section('nav')
<nav class="navbar navbar-expand-lg sub-header d-none d-md-block">
    <div class="container">
      <div class="row w_100">
        <div class="col-md-12">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-between" id="navbarTogglerDemo01">
            <div>
            <form class="" id = "filter" method="GET" action="{{ route('get-project-filter') }}">
                        @csrf
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
                        <input class="form-check-input" type="checkbox" name="gener[]" value="" id="flexCheckDefault">
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
                        <input class="form-check-input" type="checkbox" value=""  name="categories[]"id="flexCheckDefault">
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
                        <input class="form-check-input" type="checkbox" value="" name="lookingFor[]" id="flexCheckDefault">
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
                        <input class="form-check-input" type="checkbox" value=""  name="stages[]"id="flexCheckDefault">
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
                        <input class="form-check-input" type="checkbox" value="" name="countries[]" id="flexCheckDefault">
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
                        <input class="form-check-input" type="checkbox" name="language[]" value="" id="flexCheckDefault">
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
            <div class="d-flex">
              <div class="header-search-form">
                <div class="search"><button type="submit" class="searchButton">
                    <i class="fa fa-search"></i>
                  </button>
                  <input type="text" name="search" id="search-project"class="searchTerm" placeholder="Search">
                </div>
              </div>
              <div>
                <button type="submit" class="header-search-btn mx-3">Search</button>
               </form>
                <button class="add-proj-btn my-2 my-sm-0 mr-0"><a href="{{ route('project-overview')}}">Add a Project</a></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>    
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

    if(!search && gener == 0 && categories  == 0 && lookingFor  == 0 && countries  == 0 && language  == 0 && stages  == 0){
         e.preventDefault();
         toastMessage(0,"Please apply filter.");
         $("#error-toast").toast("show");
         $("#success-toast").toast("show");
      }else{
         $('#filter').submit();
      }
  
  });

  $(document).ready(function(){
   
   $("#error-toast").toast("show");
   $("#success-toast").toast("show");
   


});
</script>

@endpush