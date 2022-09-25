<div class="profile_side_bar">
    <div class="sidebar_contant mb-3 d-flex">
        <i class="fa fa-user-circle mx-2 profile_icon" aria-hidden="true"></i>
        <a href="">Profile</a>
    </div>
    <hr class="sidebar_contanr_hr">
    <div class="sidebar_contant"><a href="">Projects</a></div>
    <hr class="sidebar_contanr_hr">
    <div class="sidebar_contant"><a href="{{ route('profile-create')}}">Profile</a></div>
    <hr class="sidebar_contanr_hr">
    <div class="sidebar_contant"><a href="">Organisation</a></div>
    <hr class="sidebar_contanr_hr">
    <!-- <div class="sidebar_contant"><a href="">My Jobs</a></div> -->
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
    <hr class="sidebar_contanr_hr">
    <div class="sidebar_contant"><a href="">Endorsements </a></div>
    <hr class="sidebar_contanr_hr">
    <div class="sidebar_contant"><a href="">Favourites</a></div>
    <hr class="sidebar_contanr_hr">
    <div class="sidebar_contant"><a href="">Membership & Billing</a></div>
    <hr class="sidebar_contanr_hr">
    <div class="sidebar_contant"><a href="{{ route('setting-page')}}">Settings</a></div>
    <hr class="sidebar_contanr_hr">
</div>