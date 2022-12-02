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
                <div class="col-md-12">
                    <div class="table-responsive">
                       <table class="table order-listing1212">
                            <thead>
                                <tr>
                                   <th class="col-md-2">Id</th>
                                   <th class="col-md-2">Name</th>
                                    <th class="col-md-2">Status</th>
                                    <th class="col-md-2">Project Count</th>
                                    <th class="col-md-2">Action</th>
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
                                        <td>{{$project->list_name}}</td>
                                        <td>{{$project->list_status}}</td>
                                        <td><a href="{{route('list-projects',['id' => $project->id ,'pcount' => (@$project->lists[0]->pcount) ? @$project->lists[0]->pcount : 0])}}"><button type="button" class="btn btn-primary btn-sm btn-sm mt-10">
                                            
                                        {{(@$project->lists[0]->pcount) ? @$project->lists[0]->pcount : 0}}</button>
                                        <input type="hidden" id="project_count" name="project_count" value="{{(@$project->lists[0]->pcount) ? @$project->lists[0]->pcount : 0}}"></a>
                                       
                                        </td>
                                       <td>
                                        <a onclick="return confirm('Are you sure to change list status?')" href="{{route('change-status',['id' => $project->id , 'status' => $project->list_status])}}">
                                            @if($project->list_status=='Publish'|| $project->list_status=='publish')
                                            <button  class="btn btn-success btn-fw mb-1 btn-sm mt-10 w-65 view-btn btn_padding  text-white col-md-5" type="button" >{{$project->list_status}}</button>
                                            @else
                                            <button class="btn btn-warning btn-fw mb-1 btn-sm mt-10 w-65 view-btn btn_padding  text-white col-md-5" type="button" >{{$project->list_status}}</button>
                                            @endif
                                        </a>
                                        <a onclick="return confirm('Are you sure to delete this list?')" href="{{route('delete-list',['id' =>   $project->id ])}}">
                                            <button @if($project->list_name=="carousel") disabled @endif class="btn btn-danger btn-fw mb-1 btn-sm mt-10 w-60 view-btn btn_padding col-md-4" type="button" >Delete</button>
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
