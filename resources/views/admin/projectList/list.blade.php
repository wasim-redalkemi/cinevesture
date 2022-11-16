@extends('admin.layouts.app')

@section('content')
<div class="hide-me animation for_authtoast">
    @include('admin.include.flash_message')
</div>
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Project List Management</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table order-listing">
                            <thead>
                                <tr>
                                   <th>Name</th>
                                    <th>Status</th>
                                    <th>Project Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if(isset($project_list))  
                                @foreach($project_list as $project)
                                    <tr>
                                        <td>{{$project->list_name}}</td>
                                        <td>{{$project->list_status}}</td>
                                        <td><a href="{{route('search-project',['id' => $project->id ])}}"><button type="button" class="btn btn-primary btn-sm btn-sm mt-10">{{$project_count}}</button></a></td>
                                      
                                        <td>
                                        <a onclick="return confirm('Are you sure to change list status?')" href="{{route('change-status',['id' => $project->id , 'status' => $project->list_status])}}">
                                        <button class="btn btn-inverse-primary btn-fw mb-1 btn-sm mt-10 w-65 view-btn" type="button" >{{$project->list_status}}</button>
                                        </a>
                                        <a onclick="return confirm('Are you sure to delete this list?')" href="{{route('delete-list',['id' => $project->id ])}}">
                                        @if($project->list_name=="carousel")
                                        <button class="btn btn-inverse-primary btn-fw mb-1  btn-sm mt-10 w-60 view-btn" type="button" disabled>Delete</button>
                                        @else
                                        <button class="btn btn-inverse-primary btn-fw mb-1  btn-sm mt-10 w-60 view-btn" type="button" >Delete</button>
                                        @endif
                                        </a>
                                       </td>
                                    </tr>
                                @endforeach
                                @else
                                <div class="profile_text" style="text-align: center;"><h2>No Data Found</h1>
                                </div>
                                @endif                              
                                </tbody>
                                </table>
                             <div class="row">
                               <div class="col-md-12">
                               <div style="float:right;" >{{$project_list->links()}}</div>
                               </div> 
                              </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
