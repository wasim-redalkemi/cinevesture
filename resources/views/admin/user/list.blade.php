@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">User Management</h4>
            <div class="row">
                <div class="col-md-12">
                    <form class="">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Organization</label>
                                
                                <select name="" id="" class="form-control radius">
                                    @if (!empty($UserOrganisation))
                                    @foreach ($UserOrganisation as $k => $v)                                        
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>

                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Location</label>
                                <select name="" id="" class="form-control form-control radius">
                                    @foreach ($UserOrganisation as $key=>$location)
                                    <option value="{{$location->id}}">{{$location->location}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Date Joined From</label>
                                <input type="date" class="form-control form-control-sm radius"placeholder="Jane Doe">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Date Joined From</label>
                                <input type="date" class="form-control form-control-sm radius"placeholder="Jane Doe">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Status</label>
                                <select name="" id="" class="form-control form-control radius">
                                    <option value="1">India</option>
                                    <option value="1">India1</option>
                                    <option value="1">India2</option>
                                    <option value="1">India3</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Membership </label>
                                <select name="" id="" class="form-control radius">
                                    <option value="1">India</option>
                                    <option value="1">India1</option>
                                    <option value="1">India2</option>
                                    <option value="1">India3</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                <label>Search</label>
                                <div><input type="text" class="form-control form-control-sm" name="" id=""></div>
                                </div>
                            </div>
                            <div class="col-md-3 mt">
                                <div class="form-group">
                                <label for="">Action</label>
                                <div><button type="submit" class="btn btn-primary btn-sm">Submit</button></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table order-listing">
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
                                    <td>active</td>
                                    <td>membership</td>
                                    <td><?php echo(date("d-m-Y", strtotime($user->created_at))); ?></td>
                                    <td>
                                        <button class="btn btn-danger  btn-sm">Delete</button>
                                        <a href="{{route('profile-public-show',[($user->id)])}}"><button class="btn btn-info btn-sm">View</button></a>
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
