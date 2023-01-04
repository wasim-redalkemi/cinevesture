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
            <form role="form" id="searchProject" method="get" action="{{ route('list-projects',['id' => request('id') ]) }}" >
              @csrf
              <div class="row">
                <div class="col-12">
                  <div class="table-resposnsive">
                      <table id="order-listing" class="table order-listing">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <div class="input-group">
                                <input type="text" required class="form-control" value="{{request('name')}}" name="name" id="name"  value="{{isset($_POST['name']) ? $_POST['name'] : '' }}"placeholder="Project name" aria-label="Project name">
                                <div class="input-group-append">
                                  <input type="hidden" value="{{$_REQUEST['id']}}" name="id">
                                  <button class="btn btn-sm btn-primary" type="Submit">Search</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div>
                            {{-- "bg-gradient-success p text-white" --}}
                            {{-- <button class="btn btn-sb btn-primary">
                              Refresh
                            </button> --}}
                            <a href="{{route('list-projects',['id' => $_REQUEST['id']])}}">
                              <button type="button" class="btn btn-linkedin">
                                <i class="mdi mdi-reload btn-icon-prepend"></i>                                                    
                                Refresh
                              </button>
                            </a>
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
            <div class="col-md-12">
              <div class="table-responsive">
                <form id="saveProject" method="Post" action="{{route('save-search-projects')}}">
                  @csrf
                    <table id="" class="table order-listing table-sm table-bordered table-hover">
                      <input type="hidden" name="list_id" value="{{$_REQUEST['id']}}" id="">
                           <thead>
                               <tr>
                                 <th>Id</th>
                                 <th>Name</th>
                                 <th>Image</th>
                                 <th>Status</th>
                                 <th>Select</th>
                                </tr>
                           </thead>
                           
                              <tbody>
                                <input type="hidden" name="add_edit" value="{{$is_added_only}}" id="">
                                  @php
                                      $lc = $project_data->firstItem();
                                  @endphp
                                  @foreach ($project_data as $key=>$project)
                                  
                                    <tr>
                                      <td>{{$lc}}</td>
                                      
                                      <td>{{ ucfirst($project['project_name'])}}</td>
                                        <td>
                                          @if (!empty($project->projectOnlyImage))
                                          @foreach ($project->projectOnlyImage as $item)
                                          <img src="{{Storage::url($item->file_link)}}" alt="">
                                            
                                          @endforeach
                                              {{-- {{$project->projectOnlyImage->file_link}} --}}
                                          @else
                                              <span>-</span>
                                          @endif
                                           
                                        </td>
                                        <td>
                                          {{ucfirst($project->admin_status)}}
                                        </td>
                                        <td>
                                           {{-- @if ($project->admin_status=='inactive')
                                           <input type="checkbox" value="<?php echo $project['id'];?>" name="projects_id[]" id="" @if ($is_added_only)
                                           uchecked
                                           @endif disabled>
                                           @else --}}
                                           <input type="checkbox" value="<?php echo $project['id'];?>" name="projects_id[]" id="" @if ($is_added_only)
                                           checked
                                           @endif>
                                           {{-- @endif --}}
                                          
                                      
                                        </td>
                                    </tr>
                                    
                                    @php
                                      $lc++;
                                    @endphp
                                  @endforeach
                                  
                              </tbody>
                    </table>
                    <div style="text-align: center;" class="m-4">
                      <button type="submit" class="btn btn-success btn-icon-text btn_padding">
                      <i class="mdi mdi-file-check btn-icon-prepend"></i>
                      Save</button>
                    </div>
                </form>
                <div class="row">
                  <div class="col-md-12">
                    <?php
                    // echo "<pre>";
                      // print_r($project_data);
                    // echo "</pre>";
                    
                    ?>
                    <div>{{'Showing '.($project_data->firstItem()).' to' .' '. ($project_data->lastItem()).' of'.' '.$project_data->total()}}</div>
                  <div style="float:right;" >{{$project_data->appends(request()->except('page'))->links()}}</div>
                  
                  </div> 
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

