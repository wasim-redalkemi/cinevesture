@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Project Management</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table order-listing">
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
                                    <!-- <th>Actions</th> -->
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
                                    <td>{{$project->project_name}}</td>
                                    @foreach ($project->projectCategory as $key=>$category)
                                   <td>{{$category->name}}</td>
                                   @endforeach
                                    
                                   @foreach ($project->genres as $key=>$genre)
                                   <td>{{$genre->name}}</td>
                                   @endforeach
                                    
                                    <td>{{ date('d-M-y', strtotime($project->created_at)) }}</td>
                                    @if (isset($project->user->name))
                                    <td>{{$project->user->name}}</td>
                                    @endif
                                    <td>2</td>
                                    
                                    <td class="jsgrid-cell" style="width: 100px;">
                                        @php
                                            $x=($project->project_verified==1)? 0:1;
                                        @endphp
                                        @if ($project->project_verified==1)
                                        <a href="{{route('project-list-status')}}?status={{$x}}&pId={{$project->id}}"><button type="button" class="btn btn-primary btn btn-success">{{($project->project_verified==1) ?"Publish":"Unpublish"}}</button>
                                        </a>
                                        @else
                                        <a href="{{route('project-list-status')}}?status={{$x}}&pId={{$project->id}}"><button type="button" class="btn btn-primary btn btn-danger">{{($project->project_verified==1) ?"Publish":"Unpublish"}}</button>
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
                                        <button class="btn mb-2  btn-outline-primary w-65 view-btn">View</button></div>
                                        <button class="btn btn-outline-primary w-60 view-btn">Edit</button>
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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

