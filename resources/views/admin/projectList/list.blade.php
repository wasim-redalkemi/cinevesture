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
                                   <th>Id</th>
                                   <th>Name</th>
                                    <th>Status</th>
                                    <th>Project Count</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if(isset($projects_data))
                              <?php $i=0;?>  
                                @foreach($projects_data as $project)
                                <?php $i++;?> 
                                    <tr>
                                    <td>
                                    <?php echo $i;?>
                                    </td>
                                        <td>{{$project->lists->list_name}}</td>
                                        <td>{{$project->lists->list_status}}</td>
                                        <td><a href="{{route('search-project',['id' => $project->lists->id ])}}"><button type="button" class="btn btn-primary btn-sm btn-sm mt-10">{{$project->project_count}}</button></a></td>
                                       <td>
                                        <a onclick="return confirm('Are you sure to change list status?')" href="{{route('change-status',['id' => $project->lists->id , 'status' => $project->lists->list_status])}}">
                                        @if($project->lists->list_status=='Publish'|| $project->lists->list_status=='publish')
                                        <button  class="btn btn-success btn-fw mb-1 btn-sm mt-10 w-65 view-btn text-white" type="button" >{{$project->lists->list_status}}</button>
                                        @else
                                        <button class="btn btn-warning btn-fw mb-1 btn-sm mt-10 w-65 view-btn 
                                        " type="button" >{{$project->lists->list_status}}</button>
                                        @endif
                                        </a>
                                        <a onclick="return confirm('Are you sure to delete this list?')" href="{{route('delete-list',['id' => $project->lists->id ])}}">
                                        @if($project->lists->list_name=="carousel")
                                        <button class="btn btn-danger btn-fw mb-1  btn-sm mt-10 w-60 view-btn btn_padding" type="button" disabled>Delete</button>
                                        @else
                                        <button class="btn btn-danger btn-fw mb-1  btn-sm mt-10 w-60 view-btn btn_padding" type="button" >Delete</button>
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
                               <div style="float:right;" >{{$projects_data->links()}}</div>
                               </div> 
                              </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
