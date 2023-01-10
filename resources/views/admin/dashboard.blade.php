@extends('admin.layouts.app')

@section('content')
<!-- partial -->

    <div class="content-wrapper">
      <div class="row">
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
          <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
            <a href="{{route('user-management')}}">
            <div class="card-body">
              <h6 class="font-weight-normal">Total Users</h6>
              <h2 class="mb-0">{{$totalUsreCount}}</h2>
            </div>
          </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
          <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
            <a href="{{route('admin-project-list')}}">
            <div class="card-body">
              <h6 class="font-weight-normal">Total Projects</h6>
              <h2 class="mb-0">{{$totalProjectCount}}</h2>
            </div>
          </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
          <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
            <a href="{{route('job')}}">
            <div class="card-body">
              <h6 class="font-weight-normal">Total Jobs</h6>
              <h2 class="mb-0">{{$totalJobCount}}</h2>
            </div>
          </a>
          </div>
        </div>
        <div class="col-md-6 col-lg-3 grid-margin stretch-card">
          <div class="card bg-gradient-info text-white text-center card-shadow-info">
            <a href="{{route('query.list')}}">
            <div class="card-body">
              <h6 class="font-weight-normal">Total Queries</h6>
              <h2 class="mb-0">{{$totalQueryCount}}</h2>
            </div>
          </a>
          </div>
        </div>
      </div>
       {{-- <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body pb-0">
              <h4 class="card-title">Daily Sales</h4>
              <div class="d-flex justify-content-between justify-content-lg-start flex-wrap">
                <div class="mr-5 mb-2">
                  <h3>
                    56789
                  </h3>
                  <h6 class="font-weight-normal mb-0">
                    Online sales
                  </h6>
                </div>
                <div class="mb-2">
                  <h3>
                    12345
                  </h3>
                  <h6 class="font-weight-normal mb-0">
                    Sales in store
                  </h6>
                </div>
              </div>
            </div>
            <div class="card-body d-flex align-items-end p-0">
              <div class="mt-auto ">
                <div id="sales-legend" class="chartjs-legend mt-2 mb-4"></div>
                <canvas id="chart-sales"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
                <h6 class="card-title">Activity</h6>
              </div>
              <div class="list d-flex align-items-center border-bottom pb-3">
                <img class="img-sm rounded-circle" src="../../images/faces/face8.jpg" alt="">
                <div class="wrapper w-100 ml-3">
                  <p><b>Dobrick </b>published an article</p>
                  <small class="text-muted">2 hours ago</small>
                </div>
              </div>
              <div class="list d-flex align-items-center border-bottom py-3">
                <img class="img-sm rounded-circle" src="../../images/faces/face5.jpg" alt="">
                <div class="wrapper w-100 ml-3">
                  <p><b>Stella </b>created an event</p>
                  <small class="text-muted">3 hours ago</small>                      
                </div>
              </div>
              <div class="list d-flex align-items-center border-bottom py-3">
                <img class="img-sm rounded-circle" src="../../images/faces/face7.jpg" alt="">
                <div class="wrapper w-100 ml-3">
                  <p><b>Peter </b>submitted the reports</p>
                  <small class="text-muted">1 hours ago</small>                      
                </div>
              </div>
              <div class="list d-flex align-items-center border-bottom py-3">
                <img class="img-sm rounded-circle" src="../../images/faces/face6.jpg" alt="">
                <div class="wrapper w-100 ml-3">
                  <p><b>Nateila </b>updated the docs</p>
                  <small class="text-muted">1 hours ago</small>                      
                </div>
              </div>
              <div class="list d-flex align-items-center pt-3">
                <img class="img-sm rounded-circle" src="../../images/faces/face9.jpg" alt="">
                <div class="wrapper w-100 ml-3">
                  <p><b>Tom </b>uploaded the demo</p>
                  <small class="text-muted">3 hours ago</small>                      
                </div>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-lg-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Traffic</h4>
              <div class="w-50 mx-auto">
                <canvas id="traffic-chart" width="100" height="100"></canvas>
              </div>
              <div class="text-center mt-5">
                <h4 class="mb-2">Traffic for the day</h5>
                <p class="card-description mb-5">Traffic through the sources google and facebook for the day</p>
              </div>
              <div id="traffic-chart-legend" class="chartjs-legend traffic-chart-legend"></div>
            </div>
          </div>
        </div>
      </div>  --}}
      <div class="row grid-margin">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between">
              <div>
                <h4 class="card-title">Users detail</h4>
              </div>
              <div class="d-block">
                <a href="{{route('user-management')}}">
                <button class="btn btn-sm btn-success text-white">
                  View All Users
                </button>
              </a>
              </div>
            </div>
              {{-- <div class="d-flex table-responsive">
                <div class="btn-group mr-2">
                  <button class="btn btn-sm btn-primary"><i class="mdi mdi-plus-circle-outline"></i> Add</button>
                </div>
                <div class="btn-group mr-2">
                  <button type="button" class="btn btn-light"><i class="mdi mdi-alert-circle-outline"></i></button>
                  <button type="button" class="btn btn-light"><i class="mdi mdi-delete-empty"></i></button>
                </div>
                <div class="btn-group mr-2">
                  <button type="button" class="btn btn-light"><i class="mdi mdi-printer"></i></button>
                </div>
                <div class="btn-group ml-auto mr-2 border-0 d-none d-md-block">
                  <input type="text" class="form-control" placeholder="Search Here">
                </div>
                <div class="btn-group">
                  <button type="button" class="btn btn-light"><i class="mdi mdi-cloud"></i></button>
                  <button type="button" class="btn btn-light"><i class="mdi mdi-dots-vertical"></i></button>
                </div>
              </div> --}}
              <div class="table-responsive mt-2">
                <table class="table mt-3 border-top">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Title</th>
                      <th>Organisation</th>
                      <th>Location</th>
                      
                      <th>Membership</th>
                      <th>Joining</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($users))
                      @php
                          $i=0;
                      @endphp
                    @foreach($users as $user)
                    @php
                        $i++;
                    @endphp
                    <tr>
                       <td>
                       {{$i}}
                        </td>
                        <td>{{ucfirst($user->name)}}</td>
                        <td>{{$user->email}}</td>
                        <td>@if(empty($user->job_title)){{'-'}}@else{{ucfirst($user->job_title)}}@endif</td>
                        <td>@if (empty($user->organization->name)){{'-'}} @else{{ucfirst($user->organization->name)}}@endif</td>
                        <td>@if (empty($user->country->name)){{'-'}}@else{{ucfirst($user->country->name)}}@endif</td>
                        {{-- <td> 
                            @php
                            $x=($user->status==1)? 0:1;
                        @endphp
                            @if($user->status==1)
                            <a href="{{route('user-status-change')}}?status={{$x}}&user_id={{$user->id}}"><button class="btn active-button-color w-82"> {{'Active'}}</button></a>@else
                            <a href="{{route('user-status-change')}}?status={{$x}}&user_id={{$user->id}}"><button class="btn inactive-button-color">{{'Inactive'}}</button></a>@endif
                        </td> --}}
                        <td>
                            @foreach ($user->membership as $plan)
                            @if (!empty($plan->plan_name))
                               
                                    {{$plan->plan_name}}
                               
                            @else
                                    {{'-'}}
                            @endif
                            @endforeach
                        </td>
                        <td><?php echo(date("d-m-Y", strtotime($user->created_at))); ?></td>
                        
                     </tr>
                   @endforeach
                  @endif 
                </tbody>
                </table>
              </div>
              {{-- <div class="d-flex align-items-center justify-content-between flex-column flex-sm-row mt-4">
                <p class="mb-3 mb-sm-0">Showing 1 to 20 of 20 entries</p>
                <nav>
                  <ul class="pagination pagination-primary mb-0">
                    <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-left"></i></a></li>
                    <li class="page-item active"><a class="page-link">1</a></li>
                    <li class="page-item"><a class="page-link">2</a></li>
                    <li class="page-item"><a class="page-link">3</a></li>
                    <li class="page-item"><a class="page-link">4</a></li>
                    <li class="page-item"><a class="page-link"><i class="mdi mdi-chevron-right"></i></a></li>
                  </ul>
                </nav>
              </div> --}}
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="row">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Monthly Analytics</h4>
              <p class="card-description">Products that are creating the most revenue and their sales throughout the year and the variation in behavior of sales.</p>
              <div id="js-legend" class="chartjs-legend mt-4 mb-5 analytics-legend"></div>
              <div class="demo-chart">
                <canvas id="dashboard-monthly-analytics"></canvas>                  
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      {{-- <div class="row">
        <div class="col-md-4 grid-margin grid-margin-md-0">
          <div class="card">
            <div class="card-body">
              <div class="wrapper d-flex align-items-center justify-content-start justify-content-sm-center flex-wrap">
                <img class="img-md rounded" src="../../images/faces/face1.jpg" alt="">
                <div class="wrapper ml-4">
                  <p class="font-weight-medium">Tim Cook</p>
                  <p class="text-muted">timcook@gmail.com</p>
                  <p class="text-info mb-0 font-weight-medium">Designer</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin grid-margin-md-0">
          <div class="card">
            <div class="card-body">
              <div class="wrapper d-flex align-items-center justify-content-start justify-content-sm-center flex-wrap">
                <img class="img-md rounded" src="../../images/faces/face2.jpg" alt="">
                <div class="wrapper ml-4">
                  <p class="font-weight-medium">Sarah Graves</p>
                  <p class="text-muted">Sarah@gmail.com</p>
                  <p class="text-info mb-0 font-weight-medium">Developer</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <div class="wrapper d-flex align-items-center justify-content-start justify-content-sm-center flex-wrap">
                <img class="img-md rounded" src="../../images/faces/face3.jpg" alt="">
                <div class="wrapper ml-4">
                  <p class="font-weight-medium">David Grey</p>
                  <p class="text-muted">David@gmail.com</p>
                  <p class="text-info mb-0 font-weight-medium">Support Lead</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
    </div>
    @endsection
    <!-- content-wrapper ends -->
    