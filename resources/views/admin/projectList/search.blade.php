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
                <form role="form" id="searchProject" method="get" action="{{ route('list-projects',['id' => $id ]) }}" >
                  @csrf
                  <div class="row">
                      <div class="col-12">
                        <div class="table-resposnsive">
                            <table id="order-listing" class="table order-listing">
                              <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                    <div class="input-group">
                                      <input type="text" class="form-control" value="{{request('name')}}" name="name" id="name"  value="{{isset($_POST['name']) ? $_POST['name'] : '' }}"placeholder="Project name" aria-label="Project name">
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
                      <form id="saveProject" method="Post" action="{{route('save-search-projects')}}">
                        @csrf
                          <table id="order-listing" class="table order-listing">
                            <input type="hidden" name="list_id" value="{{$id}}" id="">
                                 <thead>
                                     <tr style="text-align: center;">
                                       <th>Id</th>
                                       <th>Name</th>
                                       <th>Image</th>
                                       <th>Select</th>
                                      </tr>
                                 </thead>
                                     <tbody style="text-align: center;">
                                     <?php 
                                        $i=0;
                                        foreach ($project_data['data'] as $key=>$project)
                                        {
                                        $i++;
                                        ?> 
                                          <tr>
                                            <td><?php echo $i;?></td>
                                            <td><?php echo $project['project_name'];?></td>
                                              <td>
                                                <?php
                                                  if(isset($project['project_only_image'][0]['file_link']))
                                                  {
                                                    echo $project['project_only_image'][0]['file_link'];
                                                  }
                                                  else{echo '-';}
                                                  ?>
                                              </td>
                                              <td>
                                                <input type="checkbox" value="<?php echo $project['id'];?>" name="projects_id[]" id="">
                                              </td>
                                          </tr>
                                          <?php
                                          }
                                        ?>
                                   </tbody>
                             </table>
                          <div style="text-align: center;">
                            <button type="submit" class="btn btn-success btn-icon-text btn_padding">
                            <i class="mdi mdi-file-check btn-icon-prepend"></i>
                            Save</button>
                          </div>
                      </form>
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

