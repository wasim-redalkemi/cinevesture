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
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                        <label class="">Name<span class = "text-danger">*</span></label>
                                        <input type="hidden" name="id" id="id" value="{{$projectList->id}}">
                                        <input type="text" class="form-control radius" name="name" placeholder="List name" aria-label="Username" value="{{ucFirst($projectList->list_name)}}" required>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                     <label for="exampleFormControlSelect1">Status<span class = "text-danger">*</span></label required value="{{$projectList->status}}" required>
                                     <select  name="status"class="form-control radius" id="listStatus" required>
                                     <option value="">Select</option required>
                                     <option {{ $projectList->status == 'published' ? 'selected' : '' }}  value="published">Publish</option>
                                     <option {{ $projectList->status == 'unpublished' ? 'selected' : '' }}  value="unpublished">Unpublish</option value="{{$projectList->status}}">
                                     </select>
                                </div>
                                </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                     <label for="exampleFormControlSelect1">Type<span class = "text-danger">*</span></label required value="{{$projectList->type}}" required>
                                     <select  name="type"class="form-control radius add_fields_placeholder" required>
                                     <option {{ $projectList->type == 'curated' ? 'selected' : '' }}  value="curated">Curated</option>
                                     <option {{ $projectList->type == 'automated' ? 'selected' : '' }}  value="automated">Automated</option value="{{$projectList->type}}">
                                     </select>
                                </div>
                              </div>
                              {{-- <div class="col-md-4">
                                <div class="form-group" id="add_fields_placeholderValue">
                                     <label for="exampleFormControlSelect1">Category</label value="{{$projectList->categories}}">
                                     <select  name="categories[]"class="form-control " id="add_fields_placeholderValue" multiple>
                                     <option value="">Select</option>
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
                                </div> --}}
                            </div>
                            <div class="row add_fields_placeholderValue">
                                  <div class="col-md-4">
                                     <div class="form-group select2_wrap">
                                          <label for="exampleFormControlSelect1">Category</label>
                                          <select  name="categories[]"class=" radius js-example-basic-multiple select2-hidden-accessible .select2-selection__choice" multiple tabindex="-1" aria-hidden="true" style="width:100%">
                                          <option value="">Select</option>
                                              @php
                                                $pre_cat = explode(',',$projectList->ProjectListFilters[0]->category_id??'');
                                                if($categories && $categories != '')
                                                  foreach ($categories as $key => $value) {
                                                      @endphp
                                                      <option value="{{$value->id}}" {{(in_array($value->id,$pre_cat)) ? 'selected' : ''}}>{{$value->name}}</option>
                                                     @php
                                                  }
                                              @endphp
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group select2_wrap">
                                          <label for="exampleFormControlSelect1">Genre</label>
                                          <select  name="genre[]"class="radius js-example-basic-multiple select2-hidden-accessible .select2-selection__choice" multiple tabindex="-1" aria-hidden="true" style="width:100%">
                                          <option value="">Select</option>
                                          @php
                                          $pre_genre = explode(',',$projectList->ProjectListFilters[0]->genre_id??'');
                                          if($genre && $genre != '')
                                            foreach ($genre as $key => $value) {
                                                @endphp
                                                <option value="{{$value->id}}" {{(in_array($value->id,$pre_genre)) ? 'selected' : ''}}>{{$value->name}}</option>
                                                @php
                                            }
                                          @endphp
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group select2_wrap">
                                          <label for="exampleFormControlSelect1">Language</label>
                                          <select  name="language[]"class="radius js-example-basic-multiple select2-hidden-accessible .select2-selection__choice" multiple tabindex="-1" aria-hidden="true" style="width:100%">
                                          <option value="">Select</option>
                                              @php
                                                $pre_language = explode(',',$projectList->ProjectListFilters[0]->language_id??'');
                                              if($language && $language != '')
                                                  foreach ($language as $key => $value) {
                                                      @endphp
                                                      <option value="{{$value->id}}" {{(in_array($value->id,$pre_language)) ? 'selected' : ''}}>{{$value->name}}</option>
                                                      @php
                                                  }
                                              @endphp
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group select2_wrap">
                                          <label for="exampleFormControlSelect1">location</label>
                                          <select  name="location[]"class="radius js-example-basic-multiple select2-hidden-accessible .select2-selection__choice" multiple tabindex="-1" aria-hidden="true">
                                          <option value="">Select</option>
                                              @php
                                                $pre_location = explode(',',$projectList->ProjectListFilters[0]->location_id??'');
                                              if($location && $location != '')
                                                  foreach ($location as $key => $value) {
                                                      @endphp
                                                      <option value="{{$value->id}}" {{(in_array($value->id,$pre_location)) ? 'selected' : ''}}>{{$value->name}}</option>
                                                      @php
                                                  }
                                              @endphp
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="exampleFormControlSelect1">Recommended</label>
                                          <select  name="recommended"class="form-control radius">
                                          <option value="1" {{ $projectList->ProjectListFilters[0]->recommendation??'' == '1' ? 'selected' : '' }}>Yes</option>
                                          <option value="0" {{ $projectList->ProjectListFilters[0]->recommendation??'' == '0' ? 'selected' : '' }}>No</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label for="exampleFormControlSelect1">Favorite</label>
                                          <select  name="favorite"class="form-control radius">
                                          <option value="1" {{ $projectList->ProjectListFilters[0]->favorite??'' == '1' ? 'selected' : '' }}>Yes</option>
                                          <option value="0" {{ $projectList->ProjectListFilters[0]->favorite??'' == '0' ? 'selected' : '' }}>No</option>
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

@push('scripts')
<script>
    $(document).ready(function()
    {
        $(".add_fields_placeholderValue").hide();
        $(".add_fields_placeholder").change(function() {
            if($(this).val() == "automated") {
                $(".add_fields_placeholderValue").show();
            }
            else {
                $(".add_fields_placeholderValue").hide();
            }
        });
        if($(".add_fields_placeholder").val() == "automated") {
         $(".add_fields_placeholderValue").show();
        }
    });
</script>
@endpush