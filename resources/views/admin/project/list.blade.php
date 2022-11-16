@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Project Management</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table table-sm table-bordered table-hover order-listing">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Genre</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Views</th>
                                    <th>Status</th>
                                    <th>Favorited</th>
                                    <th>Badge</th>
                                    <th>Action</th>
                                  </tr>
                            </thead>
                            <tbody>
                                <?php $i=0;?>
                                @foreach($projects as $key=>$project)
                                <?php $i++;?>
                                
                                <tr class="jsgrid-alt-row">
                                    <td>
                                    <?php echo $i;?>
                                    </td>
                                    <td>{{ucfirst($project->project_name)}}</td>
                                    
                                   <td>
                                    @if (!empty($project->projectCategory))
                                        
                                    
                                   
                                    <ol type="1" class="table_scroller">
                                    @foreach ($project->projectCategory as $key=>$category)
                                    <li>{{$category->name.','}}</li>
                                     
                                     @endforeach
                                    </ol>
                                     <a href="{{route('category.update-view')}}?pid={{$project->id}}&cid={{$category->id}}"><i class="fa fa-edit"></i></a>
                                     @endif
                                    </td>
                                  
                                   <td>
                                    @if ($project->genres)
                                        
                                    
                                    

                                    <ol type="1" class="table_scroller">
                                        @foreach ($project->genres as $key=>$genre)
                                        <li>{{$genre->name.','}}</li>
                                         
                                         @endforeach
                                        </ol>
                                    @if (!empty($genre->name))
                                    <a href="{{route('genre.update-view')}}?p_id={{$project->id}}&g_id={{$genre->id}}"><i class="fa fa-edit"></i></a>
                                    @else 
                                    {{'-'}}
                                    @endif
                                    @endif
                                    </td>

                                    <td>{{ date('d-M-y', strtotime($project->created_at)) }}</td>
                                    @if (isset($project->user->name))
                                    <td>{{ucfirst($project->user->name)}}</td>
                                    @endif
                                    <td>2</td>
                                    
                                    <td class="" style="width: 100px;">
                                        @php
                                            $x=($project->project_verified==1)? 0:1;
                                        @endphp
                                        @if ($project->project_verified==1)
                                        <a href="{{route('project-list-status')}}?status={{$x}}&pId={{$project->id}}"><button type="button" class="btn btn-primary btn btn-success">{{($project->project_verified==1) ?"Publish":"Unpublish"}}</button>
                                        </a>
                                        @else
                                        <a href="{{route('project-list-status')}}?status={{$x}}&pId={{$project->id}}"><button type="button" class="btn btn-primary btn btn-warning">{{($project->project_verified==1) ?"Publish":"Unpublish"}}</button>
                                        </a>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        @php
                                       $x=($project->favorited==1)? 0:1;
                                       @endphp
                                        <input type="checkbox" class="fav_inp" path="{{route('project-list-favorite')}}?s={{$x}}&p={{$project->id}}" name="fav" id="fav" <?php if($project->favorited == 1){echo 'checked';}?>>
                                    </td> 
                                    <td>
                                        @php
                                        $recom=($project->Recommended_badge==1)? 0:1;
                                        @endphp
                                        
                                         <input type="checkbox" class="recom_inp" path="{{route('project-list-recommended')}}?s={{$recom}}&p={{$project->id}}" name="fav" id="fav" <?php if($project->Recommended_badge == 1){echo 'checked';}?>>
                                    </td>
                                    <td>
                                        <a href="{{route('project-public-view',[($project->id)])}}"><button class="btn mb-2 view-btn btn btn-primary">View</button></a>
                                        {{-- <button class="btn btn-outline-primary w-60 view-btn">Edit</button> --}}
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
                            <div style="float:right;">{{$projects->links()}}</div>
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
    $(document).ready(function() {       
        $('.fav_inp').change(function()
        {
            window.location.href=$(this).attr('path');
        })
        $('.recom_inp').change(function()
        {
            window.location.href=$(this).attr('path');
        })
    })

</script>

@endpush

