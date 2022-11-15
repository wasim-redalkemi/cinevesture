@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">User Management</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
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
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if(isset($users)&& isset($users->organizaton))
                                @foreach($users as $user)
                                 <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->job_title}}</td>
                                    <td>{{$user->organization->name}}</td>
                                    <td>{{$user->organization->country->name}}</td>
                                    <td>active</td>
                                    <td>membership</td>
                                    <td><?php echo(date("d-m-Y", strtotime($user->created_at))); ?></td>
                                    <td><button class="btn btn-inverse-primary btn-fw mb-1 btn-sm mt-10 w-65 view-btn">View</button></td>
                                    <td><button class="btn btn-inverse-primary btn-fw mb-1 btn-sm mt-10 w-65 view-btn">Delete</button></td>
                                 </tr>
                               @endforeach
                              @else
                              <div class="profile_text" style="text-align: center;"><h2>No Data Found</h1></div>
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
