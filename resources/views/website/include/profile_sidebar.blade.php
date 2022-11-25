<div class="profile_side_bar">
    <div class="sidebar_content mb-3 d-flex">
        <i class="fa fa-user-circle mx-2 profile_icon" aria-hidden="true"></i>
        <a href="">Profile</a>
    </div>
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
                Features
            </li>
            <li>
                Animation
            </li>
            <li>
                Biography
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

<!-- <div class="for_mobile">
<div class="sidebar_content mb-3 d-flex justify-content-between">
      <div>  <i class="fa fa-user-circle mx-2 profile_icon" aria-hidden="true"></i>
        <a href="">Profile</a>
      </div>
      <div>
         
      </div>
    </div>
</div> -->