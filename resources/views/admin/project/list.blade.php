@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Project Management</h4>
            <div class="row">
                <div class="col-md-12">
                    <form class="" method="get" action="{{route('admin-project-list')}}">
                        <fieldset class="pt-3 pb-3">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="category"  id="" class="form-control form-control-sm radius">
                                            @if (!empty($categories))
                                                <option value="">Select</option>
                                                @foreach ($categories as $key => $category)                                        
                                                    <option value="{{$category->id}}" <?php if($category->id == request('category')){echo('selected');} ?>>{{$category->name}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Genre</label>
                                    <select name="genre" value="" id="" class="form-control form-control-sm radius">
                                        <option value="">select</option>
                                       @foreach ($genres as $key=>$genre)
                                       <option value="{{$genre->id}}" <?php if ($genre->id == request('genre')) {echo ('selected');} ?>>{{$genre->name}}</option>
                                       @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Create From</label>
                                    <input type="date" name="from_date" value="{{request('to_date')}}" class="form-control form-control-sm radius">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Create to</label>
                                        <input type="date" name="to_date" value="{{request('to_date')}}" class="form-control form-control-sm radius">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Favorited</label>
                                    <select name="favorited" id="" class="form-control form-control-sm radius">
                                        <option value="">Select</option>
                                        <option value="1"<?php if (request('favorited')=="1") {echo ('selected');} ?>>Favorite</option>
                                        <option value="0" <?php if (request('favorited')=="0") {echo ('selected');} ?>>Unfavorite</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Recommended badge</label>
                                    <select name="Recommended_badge" id="" class="form-control form-control-sm radius">
                                        <option value="">Select</option>
                                        <option value="1" <?php if (request('Recommended_badge')=="1") {echo ('selected');} ?>>Recommended</option>
                                        <option value="0" <?php if (request('Recommended_badge')=="0") { echo('selected');} ?>>Unrecommended</option>
                                    </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                    <label>Search</label>
                                    <div><input type="text" value="{{request('search')}}" class="form-control form-control-sm" name="search" id="" placeholder="Search"></div>
                                    </div>
                                </div>
                                <div class="col-md-3 mt">
                                    <div class="form-group">
                                        <label for="">Action</label>
                                        <div class="d-flex">
                                            {{-- <input type="submit" name="" id=""> --}}
                                            <div><button type="submit" class="btn btn-success btn-sm mr-3">Filter</button></div>
                                            <div><a href="{{route('admin-project-list')}}"><button type="button" class="btn btn-warning btn-sm fa fa-refresh">  Refresh</button></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table order-listing table-sm table-bordered table-hover">
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
                                    <th>Favorite</th>
                                    <th>Recommend</th>
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
                    </div>
                </div>
                <div class="col-md-12">
                    <div style="float:right;">{{$projects->links()}}</div>
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

