@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Project List Management</h4>
            <div class="row">
                <div class="col-md-12">
                   <form role="form" id="searchProject" method="Post" action="{{ route('find-project',['id' => $id ]) }}" >
                            @csrf
                            <div class="row">
                              <div class="col-md-12">
                                <div class="profile_input" style="width: 100%;">
                                    <div class="col-md-6">
                                    <label style="width: 50%;">Search Project</label>
                                        </div>
                                    <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{isset($_POST['name']) ? $_POST['name'] : '' }}">

                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                                   
                                </div>
                                </div>
                            </div>
                            </form>
                            <table class="mt-5"  style="border:1px solid black;border-collapse: separate; border-spacing: 2em;text-align:center;">
                          
                              <tr style="border-bottom:1px solid black;">
                                <td>Name</td>
                                <td>Finance Secured</td>
                                <td>Recommended Badge</td>
                                <td>Image</td>
                                <td>Select</td>
                              </tr>
                             
                              <form id="saveProject" method="Post" action="{{route('save-search-projects')}}">
                              @csrf
                              @if(isset($project_data))
                              <div class="row">
                                @foreach($project_data as $project)
                                <?php $image=$project->projectImage->file_link; ?>   
                                   <tr>
                                    <td>{{$project->project_name}}</td>
                                    <td>{{$project->financing_secured}}</td>
                                    <td>{{$project->Recommended_badge}}</td>
                                    <td><img src="<?php echo asset("images/asset/$image")?>" style="height: 174px; width: 245px;border:2px solid black"></img></td>
                                    <td><input type="checkbox" class="checkbox_btn" name="" aria-label=""></td>
                                    <input type="hidden" value="{{$project->id}}"  name="projectids[]">
                                    <input type="hidden" value="{{$id}}"  name="listids[]">
                                   </tr>
                                @endforeach
                               </div>
                              @endif
                          
                              @if(isset($search_projects))
                              <div class="row">
                                @foreach($search_projects as $project)
                                <?php $image=$project->projectImage->file_link; ?>   
                                   <tr>
                                    <td>{{$project->project_name}}</td>
                                    <td>{{$project->financing_secured}}</td>
                                    <td>{{$project->Recommended_badge}}</td>
                                    <td><img src="<?php echo asset("images/asset/$image")?>" style="height: 174px; width: 245px;border:2px solid black"></img></td>
                                    <td><input type="checkbox" class="checkbox_btn" name="" aria-label=""></td>
                                    <input type="hidden" value="{{$project->id}}"  name="projectid">
                                    <input type="hidden" value="{{$id}}"  name="listid">
                                   </tr>
                                @endforeach
                                
                              </div>
                              @endif
                              
                             <tr><td>
                              <button type="submit"  class="btn btn-outline-primary btn-sm mt-10">Save</button>
                             
                            </td></tr>                    
                            </form>
                    </table>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
