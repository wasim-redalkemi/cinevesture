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
                          <div id="collapseOne" class="collapse p-3 pt-4" data-parent="#accordion">
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
                                            <option value="1" <?php if (request('membership')=="1") {echo 'selected';} ?>>Normal</option>
                                            <option value="2" <?php if (request('membership')=="2") {echo 'selected';} ?> >Private</option>
                                            <option value="3" <?php if (request('membership')=="3") {echo 'selected';} ?> >Premium</option>
                                            <option value="4" <?php if (request('membership')=="4") {echo 'selected';} ?> >Super Premium</option>
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
                                                <div><button type="submit" class="btn btn-success btn-sm mr-3">Filter</button></div>
                                                <div><a href="{{route('user-management')}}"><button type="button" class="btn btn-warning btn-sm fa fa-refresh">  Refresh</button></a></div>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($users))
                                <?php $i=0;?>
                                @foreach($users as $user)
                                <?php $i++;?> 
                                <tr>
                                   <td>
                                    <?php echo $i;?>
                                    </td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if(empty($user->job_title)){{'-'}}@else{{$user->job_title}}@endif</td>
                                    <td>@if (empty($user->organization->name)){{'-'}} @else{{$user->organization->name}}@endif</td>
                                    <td>@if (empty($user->organization->country->name)){{'-'}}@else{{$user->organization->country->name}}@endif</td>
                                    <td> @if($user->status==1)<div class="btn btn-success"> {{'Active'}}</div>@else
                                        <div class="btn btn-warning">{{'Inactive'}}</div>@endif
                                    </td>
                                    <td>membership</td>
                                    <td><?php echo(date("d-m-Y", strtotime($user->created_at))); ?></td>
                                    <td>
                                        <div class="mb-1">
                                           <a href="{{route('profile-public-show',[($user->id)])}}"><button class="btn btn-info btn-sm">View</button></a>
                                          </div>
                                       <div>
                                        <button class="btn btn-danger  btn-sm">Delete</button>
                                        </div> 
                                    </td>
                                 </tr>
                               @endforeach
                              @endif 
                            </tbody>
                        </table>
                        <div class="row">
                         <div class="col-md-12">
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
