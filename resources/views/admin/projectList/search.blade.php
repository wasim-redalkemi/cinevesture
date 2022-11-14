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
                <form role="form" id="searchProject" method="Post" action="{{ route('find-project',['id' => $id ]) }}" >
                  @csrf
                  <div class="row">
                      <div class="col-12">
                        <div class="table-resposnsive">
                            <table id="project-listing" class="table project-listing">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input type="text" class="form-control"  name="name" id="name"  value="{{isset($_POST['name']) ? $_POST['name'] : '' }}"placeholder="Project name" aria-label="Project name">
                                      <div class="input-group-append">
                                        <button class="btn btn-sm btn-primary" type="Submit">Search</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
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
                                  <th>Id</th>
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
                                <?php $y=0; ?>
                                  @if(isset($project_data))
                                    <?php  $projectids=[];
                                        $listids=[];
                                        $i=0; ?>
                                    @foreach($project_data as $project)
                                    <?php $i++;?>
                                    <?php $image=$project->projectImage->file_link; ?>
                                        <tr class="jsgrid-alt-row">
                                          <td>
                                          <?php echo $i;?>
                                          </td>
                                          <td>{{$project->project_name}}</td>
                                          <td>{{$project->financing_secured}}</td>
                                          <td>{{$project->Recommended_badge}}</td>
                                          <td><img src="<?php echo asset("images/asset/$image")?>" style="height: 174px; width: 245px;border:2px solid black"></img></td>
                                          <td><input type="checkbox" class="checkbox_btn"  data="{{$id}}" value="{{$project->id.','.$id}}" name="projectids[]" aria-label=""></td>
                                        </tr>
                                    @endforeach
                                       <?php  $y=$i;?>
                                       @else
                                      <div class="profile_text" style="text-align: center;"><h2>No Data Found</h1>
                                      </div>
                                 @endif
                                  @if(isset($search_projects))
                                    @foreach($search_projects as $project)
                                      <?php  $y++;?>
                                      <?php $image=$project->projectImage->file_link; ?>
                                        <tr class="jsgrid-alt-row">
                                          <td>
                                              <?php echo $y;?>
                                              </td>
                                            <td>{{$project->project_name}}</td>
                                              <td>{{$project->financing_secured}}</td>
                                              <td>{{$project->Recommended_badge}}</td>
                                              <td><img src="<?php echo asset("images/asset/$image")?>" style="height: 174px; width: 245px;border:2px solid black"></img></td>
                                              <td><input type="checkbox" class="checkbox_btn" data-key="{{$id}}" data-project="{{$project->id}}" value="{{$project->id.','.$id}}" name="projectids[]" aria-label=""></td>
                                        </tr>
                                    @endforeach
                                   @endif
                                   @if(isset($project_data))
                                   <tr>
                                        <td colspan="6" style="text-align: center;">
                                          <button type="button" class="btn btn-primary btn-icon-text">
                                          <i class="mdi mdi-file-check btn-icon-prepend"></i>
                                           Save</button>
                                        </td>
                                   </tr>
                                   @else
                                    <div class="profile_text" style="text-align: center;"><h2>No Data Found</h1>
                                    </div>
                                    @endif
                              </form>
                            </tbody>
                            <div class="row">
                         <div class="col-md-12">
                             <div style="float:right;" >{{$project_data->links()}}</div>
                             </div> 
                         </div>
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

