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
                                    <th>Joining Date</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if(isset($users))
                                @foreach($users as $user)
                                 <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->job_title}}</td>
                                    
                                    <td>{{$user->organization->name}}</td>
                                    <td>{{$user->organization->name}}</td>
                                    <td>{{$user->organization->country->name}}</td>
                                    <td>active</td>
                                    <td>membership</td>
                                    <td><?php echo(date("d-m-Y", strtotime($user->created_at))); ?></td>
                                    <td>
                                        <button class="btn btn-outline-primary btn-sm">View</button>
                                        <button class="btn btn-outline-primary mt-2 btn-sm">Delete</button>
                                    </td>
                                </tr>
                               @endforeach
                              @endif 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
