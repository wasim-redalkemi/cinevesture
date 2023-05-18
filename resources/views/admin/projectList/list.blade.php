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
                       <table class="table order-listing table-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                   <th class="col-md-2">S no.</th>
                                   <th class="col-md-2">Name</th>
                                   <th class="col-md-1">Type</th>
                                    <th class="col-md-1">Project Count</th>
                                    <th class="col-md-2 notForPrint">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if(isset($projects_data))
                              @php
                              $i=($projects_data->perPage()*($projects_data->currentPage()-1))
                                @endphp    
                                @foreach($projects_data as $project)
                                <?php $i++;?> 
                                    <tr>
                                    <td>
                                    <?php echo $i;?>
                                    </td>
                                        <td>{{ucfirst($project->list_name)}}</td>
                                        <td>{{ucfirst($project->type)}}</td>

                                        <td>
                                            
                                            <a href="{{route('list-projects',['id' => $project->id ,'name' =>$project->list_name,'pcount' => (@$project->lists[0]->pcount) ? @$project->lists[0]->pcount : 0])}}"><button type="button" class="btn btn-primary btn-sm btn-sm mt-10">
                                            {{(@$project->lists[0]->pcount) ? @$project->lists[0]->pcount : 0}}</button>
                                            <input type="hidden" id="project_count" name="project_count" value="{{(@$project->lists[0]->pcount) ? @$project->lists[0]->pcount : 0}}"></a>
                                        </td>
                                       <td>
                                         @if($project->status=='published')
                                            <a class="btn btn-success btn-fw mb-1 btn-sm mt-10  @if($project->list_name=='carousel') d-none @endif w-112 view-btn btn_padding text-white" href="{{route('change-status',['id' => $project->id , 'status' =>'unpublished'])}}">                                            
                                                {{ucfirst($project->status)}}
                                            </a>
                                        @else
                                            <a class="btn btn-warning btn-fw mb-1 btn-sm mt-10 w-112 view-btn btn_padding text-white" href="{{route('change-status',['id' => $project->id , 'status' =>'published'])}}">
                                                {{ucfirst($project->status)}}
                                            </a>
                                        @endif

                                        <a class="confirmAction btn btn-danger btn-fw mb-1 @if($project->list_name=='carousel') d-none @endif  btn-sm mt-10 w-60 view-btn btn_padding" href="{{route('delete-list',['id' =>$project->id ])}}">
                                            Delete
                                        </a>
                                        <a class="btn text-white btn-warning @if($project->list_name=='carousel') d-none @endif" href="{{route('projectlistedit',['id'=>$project->id])}}">Edit</a>
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
                               <div class="col-md-12 d-flex justify-content-between mt-3">
                                <div>{{'Showing '.$projects_data->firstItem() .' to' .' '. $projects_data->lastItem().' of'.' '.$projects_data->total()}}</div>
                               <div style="float:right;" >{{$projects_data->onEachSide(0)->appends($_GET)->links()}}</div>
                               </div> 
                              </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
