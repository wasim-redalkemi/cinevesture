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
                   <form role="form" method="Post" action="{{ route('create-list') }}">
                            @csrf
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control form-control-lg" name="name" placeholder="List name" aria-label="Username" required>
                                </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status</label required>
                                        <select  name="status"class="form-control form-control-lg" id="listStatus" required>
                                        <option value="unpublished">Unpublish</option>
                                        <option value="published">Publish</option>
                                        </select>
                                    </div>
                              </div>
                              <div class="col-md-4">
                                   <div class="form-group">
                                        <label for="exampleFormControlSelect1">Type</label required>
                                        <select  name="type"class="form-control form-control-lg add_fields_placeholder" required>
                                        <option value="curated">Curated</option>
                                        <option value="automated">Automated</option>
                                        </select>
                                    </div>
                              </div>
                            </div>
                            <div class="row add_fields_placeholderValue">
                                <div class="col-md-4">
                                   <div class="form-group">
                                        <label for="exampleFormControlSelect1">Category</label>
                                        <select  name="categories[]"class="form-control form-control-lg" multiple>
                                        <option value="">Select</option>
                                            @php
                                              if($categories && $categories != '')
                                                foreach ($categories as $key => $value) {
                                                    @endphp
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                   @php
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Genre</label>
                                        <select  name="genre[]"class="form-control form-control-lg" multiple>
                                        <option value="">Select</option>
                                            @php
                                            if($genre && $genre != '')
                                                foreach ($genre as $key => $value) {
                                                    @endphp
                                                    <option value="{{$value->id}}">{{$value->gender}}</option>
                                                    @php
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Language</label>
                                        <select  name="language[]"class="form-control form-control-lg" multiple>
                                        <option value="">Select</option>
                                            @php
                                            if($language && $language != '')
                                                foreach ($language as $key => $value) {
                                                    @endphp
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @php
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">location</label>
                                        <select  name="location[]"class="form-control form-control-lg" multiple>
                                        <option value="">Select</option>
                                            @php
                                            if($location && $location != '')
                                                foreach ($location as $key => $value) {
                                                    @endphp
                                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                                    @php
                                                }
                                            @endphp
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Recommended</label>
                                        <select  name="recommended"class="form-control form-control-lg">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Favorite</label>
                                        <select  name="favorite"class="form-control form-control-lg">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="row" style="margin-top:15px">
                                    <div class="col-md-12" style="padding-left: 42%;">
                                        <button type="submit" class="btn btn-success btn-sm mt-10 text-white">Create</button>
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
        $(".add_fields_placeholder").change(function() {
            if($(this).val() == "automated") {
                $(".add_fields_placeholderValue").show();
            }
            else {
                $(".add_fields_placeholderValue").hide();
            }
        });
        $(".add_fields_placeholderValue").hide();
    });
</script>
@endpush

