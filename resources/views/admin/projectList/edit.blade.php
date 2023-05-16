@extends('admin.layouts.app')

@section('content')
<div class="hide-me animation for_authtoast">
    @include('admin.include.flash_message')
</div>
<div class="content-wrapper">
    <div class="card col-md-12">
        <div class="card-body">
            <h1 class="card-title">Project List Management</h1>
            <div class="row">
                <div class="col-md-12">
                   <form role="form" method="Post" action="{{ route('update_project_list')}}">
                            @csrf
                            <div class="row d-flex">
                              <div class="col-md-6">
                                <div class="form-group">
                                        <label class="">Name</label>
                                        <input type="hidden" name="id" id="id" value="{{$projectList->id}}">
                                        <input type="text" class="form-control form-control-lg" name="name" placeholder="List name" aria-label="Username" value="{{ucFirst($projectList->list_name)}}" required>
                                </div>
                                
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                     <label for="exampleFormControlSelect1">Status</label required value="{{$projectList->status}}" required>
                                     <select  name="status"class="form-control form-control-lg" id="listStatus" required>
                                     <option value="">Select</option required>
                                     <option {{ $projectList->status == 'published' ? 'selected' : '' }}  value="published">Publish</option>
                                     <option {{ $projectList->status == 'unpublished' ? 'selected' : '' }}  value="unpublished">Unpublish</option value="{{$projectList->status}}">
                                     </select>
                                </div>
                                </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                     <label for="exampleFormControlSelect1">Type</label required value="{{$projectList->type}}" required>
                                     <select  name="type"class="form-control form-control-lg" id="listType" required>
                                     <option value="">Select</option required>
                                     <option {{ $projectList->type == 'curated' ? 'selected' : '' }}  value="curated">Curated</option>
                                     <option {{ $projectList->type == 'automated' ? 'selected' : '' }}  value="automated">Automated</option value="{{$projectList->type}}">
                                     </select>
                                </div>
                                </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                     <label for="exampleFormControlSelect1">Category</label required value="{{$projectList->categories}}" required>
                                     <select  name="categories[]"class="form-control form-control-lg" id="listCategories" multiple required>
                                     <option value="">Select</option required>
                                        @php
                                        if($categories && $categories != '')
                                        $i=0;
                                          foreach ($categories as $key => $value) {
                                              @endphp
                                              <option value="{{$value->id}}" {{(in_array($value->id, $selectedCategories)) ? 'selected' : ''}} >{{$value->name}}</option>
                                             @php
                                          }
                                          $i++;
                                      @endphp
                                     </select>
                                </div>
                                </div>
                                
                            </div>
                            <div class="row" style="margin-top:15px">
                                <div class="col-md-12" style="padding-left: 42%;">
                                    <button type="submit" class="btn btn-success btn-sm mt-10 text-white">Update</button>
                                </div>
                            </div>
                     </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
