@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">User Management</h4>
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
                                @foreach($users as $user)
                                 <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if(empty($user->job_title)){{'-'}}@else{{$user->job_title}}@endif</td>
                                    <td>@if (empty($user->organization->name)){{'-'}} @else{{$user->organization->name}}@endif</td>
                                    <td>@if (empty($user->organization->country->name)){{'-'}}@else{{$user->organization->country->name}}@endif</td>
                                    <td>active</td>
                                    <td>membership</td>
                                    <td><?php echo(date("d-m-Y", strtotime($user->created_at))); ?></td>
                                    <td>
                                        <button class="btn btn-outline-primary mt-2 btn-sm">Delete</button>
                                        <a href="{{route('profile-public-show',[($user->id)])}}"><button class="btn btn-outline-primary btn-sm">View</button></a>
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
