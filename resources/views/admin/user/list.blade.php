@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">User Management</h4>
            <div class="row">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="my_card mb-4">
                          <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                <div class="text-center d-block">
                                    <button class="btn btn-sm btn-success text-white">
                                        Apply Filter
                                    </button>
                                </div>
                            </a>
                          </div>
                          <div id="collapseOne" id="show_filter" class="collapse p-3 pt-4" data-parent="#accordion">
                            <form class="" method="get" action="{{route('user-management')}}">
                        
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Organization </label>
                                            <select name="organization" id="" class="form-control radius">
                                                @if (!empty($UserOrganisation))
                                                <option value="">Select</option>
                                                @foreach ($UserOrganisation as $k => $v)                                        
                                                <option value="{{$v->id}}"<?php if ($v->id == request('organization')) {echo 'selected';} ?>>{{$v->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Location</label>
                                        <select name="country" id="" class="form-control form-control radius">
                                            <option value="">Country</option>
                                            @foreach ($countries as $key=>$country)
                                            <option value="{{$country->id}}" <?php if ($country->id == request('country')) {echo 'selected';} ?>>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Date Joined From</label>
                                        <input type="date" name="from_date" value="{{request('from_date')}}" class="form-control form-control-sm radius"placeholder="Jane Doe">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Date Joined to</label>
                                        <input type="date" name="to_date" value="{{request('to_date')}}" class="form-control form-control-sm radius"placeholder="Jane Doe">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="" class="form-control form-control radius">
                                            <option value="">Select</option>
                                            <option value="1" <?php if (request('status')=="1") {echo 'selected';} ?>>Active</option>
                                            <option value="0" <?php if (request('status')=="0") {echo 'selected';} ?> >Inactive</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Membership</label>
                                        <select name="membership" id="" class="form-control radius">
                                            <option value="">Select</option>
                                            <option value="free" <?php if (request('membership')=="free") {echo 'selected';} ?>>Free</option>
                                            <option value="basic" <?php if (request('membership')=="basic") {echo 'selected';} ?> >Basic</option>
                                            <option value="pro" <?php if (request('membership')=="pro") {echo 'selected';} ?> >Pro</option>
                                            <option value="enterprise" <?php if (request('membership')=="enterprise") {echo 'selected';} ?> >Enterprise</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Search</label>
                                        <div><input type="text" value="{{request('search')}}" class="form-control form-control-sm" name="search" id="" placeholder="Search"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt">
                                        <div class="form-group">
                                            <label for="">Action</label>
                                            <div class="d-flex">
                                                {{-- <input type="submit" name="" id=""> --}}
                                                <div><button type="submit" id="filter_btn" class="btn btn-success btn-sm mr-3 text-white">Filter</button></div>
                                                <div><a href="{{route('user-management')}}"><button type="button" class="btn btn-warning btn-sm fa fa-refresh text-white">  Refresh</button></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table order-listing table-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Title</th>
                                    <th>Organisation</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Membership</th>
                                    <th>Joining</th>
                                    <th class="noExport">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($users))
                               
                                @php
                                    $i=($users->perPage()*($users->currentPage()-1))
                                @endphp
                                
                            
                                @foreach($users as $user)
                                <?php $i++;?> 
                                <tr>
                                   <td>
                                    <?php echo $i;?>
                                    </td>
                                    <td>{{ucfirst($user->name)}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if(empty($user->job_title)){{'-'}}@else{{ucfirst($user->job_title)}}@endif</td>
                                    <td>@if (empty($user->organization->name)){{'-'}} @else{{ucfirst($user->organization->name)}}@endif</td>
                                    <td>@if (empty($user->country->name)){{'-'}}@else{{ucfirst($user->country->name)}}@endif</td>
                                    <td> 
                                        @php
                                        $x=($user->status==1)? 0:1;
                                    @endphp
                                        @if($user->status==1)
                                        <a href="{{route('user-status-change')}}?status={{$x}}&user_id={{$user->id}}"><button class="btn active-button-color w-82"> {{'Active'}}</button></a>@else
                                        <a href="{{route('user-status-change')}}?status={{$x}}&user_id={{$user->id}}"><button class="btn inactive-button-color">{{'Inactive'}}</button></a>@endif
                                    </td>
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
                                    <td class="noExport">
                                        <div class="mb-1" >
                                           <a href="{{route('profile-public-show',['id'=>$user->id])}}"><button class="btn btn-info btn-sm w-74">View</button></a>
                                        </div>
                                       <div>
                                            <a class="confirmAction" href="{{route('user-delete',['id'=>$user->id])}}">
                                               <button class="btn btn-danger  btn-sm">Delete</button>
                                            </a>
                                        </div> 
                                    </td>
                                 </tr>
                               @endforeach
                              @endif 
                            </tbody>
                        </table>
                        <div class="row mt-3">
                         <div class="col-md-12 d-flex justify-content-between mt-3">
                            <div>{{'Showing '.$users->firstItem().' to' .' '. $users->lastItem().' of'.' '.$users->total()}}</div>
                             <div style="float:right;" >{{$users->links()}}</div>
                             </div> 
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
    @if (request('organization') || request('country') || request('from_date') || request('to_date') || request('status') || request('membership') || request('search'))
        $(".collapse").addClass("show");
    @endif
     
       
        
});
</script>
@endpush
