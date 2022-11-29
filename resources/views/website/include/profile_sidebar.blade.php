<div class="profile_side_bar">
    <div class="sidebar_content mb-0 mb-md-3 d-flex justify-content-between"  data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      <div class="d-flex align-items-center">  <i class="fa fa-user-circle profile_icon" aria-hidden="true"></i>
        <a href="" class="mx-2">Profile</a>
      </div>
      <div class="d-flex align-items-center d-block d-md-none">
          <div class="inp_data mx-2">Profile</div>
          <i class="fa fa-angle-down" aria-hidden="true"></i>
      </div>
    </div>


    <!-- <div id="container">
    <label>Enter your name:</label>
    <input type="text">
    <button id="submit">Submit</button>
</div> -->

<div class="sidebar_collapse collapse dont-collapse-sm" id="collapseExample">
  
<div class="sidebar_data_mobile sidebar" id="sidebar">
    <hr class="sidebar_content_hr">
    <div class="sidebar_content"><a href="{{ route('project-list') }}">Projects</a></div>
    <hr class="sidebar_content_hr">
    <div class="sidebar_content"><a href="{{ route('profile-create') }}">Profile</a></div>
    <hr class="sidebar_content_hr">
    <div class="sidebar_content"><a href="{{ route('organisation-private-view') }}">Organisation</a></div>
    <hr class="sidebar_content_hr">
    <!-- <div class="sidebar_content"><a href="">My Jobs</a></div> -->
    <div class="dropdown search-page">
        <button class="btn dropdown-toggle w-100 border-0 ml_10" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            My Jobs
        </button>
        <ul class="dropdown-menu w-100 profile_dropdown_menu">
            <li>
                <a href="{{ route('posted-job') }}">Posted Jobs</a>
            </li>
            <li>
                <a href="{{ route('saved-job') }}">Saved Jobs</a>
            </li>
            <li>
                <a href="{{ route('applied-job') }}">Applied Jobs</a>
            </li>
        </ul>
    </div>
    <hr class="sidebar_content_hr">
    <div class="sidebar_content"><a href="{{route('endorsement-view')}}">Endorsements </a></div>
    <hr class="sidebar_content_hr">
    <div class="sidebar_content"><a href="{{ route('favourite-view') }}">Favourites</a></div>
    <hr class="sidebar_content_hr">
    <div class="sidebar_content"><a href="">Membership & Billing</a></div>
    <hr class="sidebar_content_hr">
    <div class="sidebar_content"><a href="{{ route('setting-page')}}">Settings</a></div>
    <hr class="sidebar_content_hr">
</div>
</div>
<!-- <div class="forTransition"></div> -->

</div>


@push('scripts')
<script>
  

    function addActiveClass(element) {
        // console.log(7);
        // console.log(current);

        // alert("59")
      if (current === "") {
        //for root url
        if (element.attr('href').indexOf("index.html") !== -1) {
            console.log(element.attr('href'));

          element.parents('.sidebar_content').last().addClass('active');
          element.parents('.sidebar_content').last().addClass('forTesting');
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
            console.log(66);
            element.addClass('active');
          }
        }
      } 
    else {
        console.log(71);
        //for other url
        if (element.attr('href').indexOf(current) !== -1) {
            console.log(element.attr('href'));
          element.parents('.sidebar_content').last().addClass('active');
          elem =  element.parents('.sidebar_content').last();
            $('.inp_data').text(elem.find('a').text());

        //   console.log(74);
        //   if (element.parents('.sub-menu').length) {
        //     element.closest('.collapse').addClass('show');
        //     element.addClass('active');
        //   }
          if (element.parents('.submenu-item').length) {
            element.addClass('active');
          }
        }
      }
    }

    var current = location.pathname.split("/").slice(-2)[0].replace(/^\/|\/$/g, '')+'/'+location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    console.log(current)
    // alert("20000")

    $('.sidebar_data_mobile .sidebar_content a').each(function() {
        // console.log(90);
      var $this = $(this);
      addActiveClass($this);
    
    })

    $('.horizontal-menu .nav li a').each(function() {
      var $this = $(this);
      addActiveClass($this);

    })
    

//     $(document).on('click', function(e) {
//     var container = $("#collapseExample");
//     console.log($(e.target).closest(container).length);
//     if (!$(e.target).closest(container).length) {
//         container.hide();
//     }
// });
</script>
@endpush