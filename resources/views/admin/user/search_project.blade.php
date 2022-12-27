@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Project List Management</h4>
            <div class="row">
              <div class="col-12">
                            <form role="form" id="searchProject" method="get" action="{{ route('search-project',['id' => $id ]) }}" >
                            @csrf
                            <div class="row">
                              <div class="col-12">
                                <div class="table-resposnsive">
                                  <table id="project-listing" class="table project-listing">
                                    <tbody>
                                      <thead><th colspan="4">Search Project</th></thead>
                                      <tr><td colspan="1"><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="{{isset($_POST['name']) ? $_POST['name'] : '' }}"></td>
                                      <td colspan="1"> <button type="submit"><i class="fa fa-search"></i></button></td>
                                    <td colspan="2"></td>
                                 </tr>
                                    </tbody>
                                </table>
                                </div>
                              </div>
                            </div>
                      </form>
              </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table order-listing">
                            <thead>
                                <tr style="text-align: center;">
                                  <th>Name</th>
                                  <th>Finance Secured</th>
                                  <th>Recommended Badge</th>
                                  <th>Image</th>
                                  <th>Select</th>
                                  </tr>
                            </thead>
                            <tbody style="text-align: center;">
                               
                            <form id="saveProject" method="Post" action="{{route('save-search-projects')}}">
                              @csrf
                              @if(isset($project_data))
                              <?php  $projectids=[];
                                     $listids=[]; ?>
                              @foreach($project_data as $project)
                                <?php $image=$project->projectImage->file_link; ?>
                                <tr class="jsgrid-alt-row">
                                
                                    <td>{{$project->project_name}}</td>
                                    <td>{{$project->financing_secured}}</td>
                                    <td>{{$project->project_verified}}</td>
                                    <td><img src="<?php echo asset("images/asset/$image")?>" style="height: 174px; width: 245px;border:2px solid black"></img></td>
                                    <td><input type="checkbox" class="checkbox_btn"  data="{{$id}}" value="{{$project->id.','.$id}}" name="projectids[]" aria-label=""></td>
                                    <!-- <input type="hidden" value="{{$project->id}}"  name="projectids[]"> -->
                                    <!-- <input type="hidden" value="{{$id}}"  name="listids[]"> -->
                                    </tr>
                                @endforeach
                                @endif
                                @if(isset($search_projects))
                               @foreach($search_projects as $project)
                                <?php $image=$project->projectImage->file_link; ?>
                                <tr class="jsgrid-alt-row">
                                   <td>{{$project->project_name}}</td>
                                    <td>{{$project->financing_secured}}</td>
                                    <td>{{$project->project_verified}}</td>
                                    <td><img src="<?php echo asset("images/asset/$image")?>" style="height: 174px; width: 245px;border:2px solid black"></img></td>
                                    <td><input type="checkbox" class="checkbox_btn" data-key="{{$id}}" data-project="{{$project->id}}"  value="{{$project->id}}"name="projectids[]" aria-label=""></td>
                                    <!-- <input type="hidden" value="{{$project->id}}"  name="projectids[]">
                                    <input type="hidden" value="{{$id}}"  name="listids[]"> -->
                                    </tr>
                                @endforeach
                                @endif
                                <tr>
                                  <td colspan="6" style="text-align: center;"><button type="submit"  class="btn btn-outline-primary btn-sm mt-10">Save</button></td>
                                </tr>
                            </tbody>
                            </form>
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

