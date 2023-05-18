@extends('admin.layouts.app')

@section('content')
<div class="hide-me animation for_authtoast">
    @include('admin.include.flash_message')
</div>
<div class="content-wrapper">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Project List Management</h4>
        {{-- <div class="row">
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
        </div> --}}
          <div class="row">
            <div class="col-md-12">
              <div id="accordion">
                <div class="my_card mb-4">
                  @php
                    if($list_type[0]->type == 'curated')
                    { 
                  @endphp
                      <div class="card-header">
                          <a class="card-link" data-toggle="collapse" href="#collapseOne">
                              <div class="text-center d-block">
                                  <button class="btn btn-sm btn-success text-white">
                                      Apply Filter
                                  </button>
                              </div>
                          </a>
                      </div>
                 
                    <div id="collapseOne" class="collapse p-3 pt-4" data-parent="#accordion">
                        <form class="" method="get" action="{{ route('list-projects',['id' => request('id') ]) }}">
                            @csrf
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
                                    <select name="project_verified" id="" class="form-control form-control-sm radius">
                                        <option value="">Select</option>
                                        <option value="1" <?php if (request('project_verified')=="1") {echo ('selected');} ?>>Recommended</option>
                                        <option value="0" <?php if (request('project_verified')=="0") { echo('selected');} ?>>Unrecommended</option>
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
                                          <input type="hidden" value="{{$_REQUEST['id']}}" name="id">
                                            <div><button type="submit" class="btn btn-success btn-sm mr-3 text-white">Filter</button></div>
                                            <div><a href="{{route('list-projects',['id' => $_REQUEST['id']])}}"><button type="button" class="btn btn-warning btn-sm fa fa-refresh text-white">  Refresh</button></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    @php  
                    }
                  @endphp
                </div>
            </div>
              <div class="table-responsive">
                <form id="saveProject" method="Post" action="{{route('save-search-projects')}}">
                  @csrf
                    <table id="" class="table order-listing table-sm table-bordered table-hover">
                           <thead>
                                <tr>
                              
                                <td class="text-center" colspan="5">
                                  <h4 class="p-1 m-0">List name : <b>{{$list_name}}</b></h4>
                                </td>
                                
                              </tr>
                               <tr>
                                
                                 <th>Id</th>
                                 <th>Name</th>
                                 <th>Image</th>
                                 <th>Status</th>
                                  @php
                                  if($list_type[0]->type == 'curated')
                                  { 
                                  @endphp
                                 <th>Select</th>
                                 @php  
                                  }
                                  @endphp
                                </tr>
                           </thead>
                           
                              <tbody>
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
                                        @php
                                        if($list_type[0]->type == 'curated')
                                        { 
                                        @endphp
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
                                        @php  
                                        }
                                        @endphp
                                    </tr>
                                    
                                    @php
                                      $lc++;
                                    @endphp
                                  @endforeach
                                  
                              </tbody>
                    </table>
                    <div style="text-align: center;" class="m-4">
                      @php
                      if($list_type[0]->type == 'curated')
                      { 
                      @endphp
                        <input type="hidden" name="list_id" value="{{$_REQUEST['id']}}" id="">
                        <input type="hidden" name="add_edit" value="{{$is_added_only}}" id="">
                        <button type="submit" class="btn btn-success btn-icon-text btn_padding">
                        <i class="mdi mdi-file-check btn-icon-prepend"></i>
                        Save</button>
                      @php  
                      }
                      @endphp
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
    
    @if(request('category') || request('genre') || request('from_date') || request('to_date') || request('favorited') || (request('favorited') == '0') || request('project_verified') ||(request('project_verified')=='0')|| request('search'))
        $(".collapse").addClass("show");
    @endif

</script>

@endpush

