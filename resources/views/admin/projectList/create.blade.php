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
                              <div class="col-md-6">
                                <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control form-control-lg" name="name" placeholder="List name" aria-label="Username" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="exampleFormControlSelect1">Status</label required>
                                        <select  name="status"class="form-control form-control-lg" id="listStatus" required>
                                        <option value="">Select</option required>
                                        <option value="published">Publish</option>
                                        <option value="unpublished">Unpublish</option>
                                        </select>
                                    </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="exampleFormControlSelect1">Type</label required>
                                        <select  name="type"class="form-control form-control-lg" id="listType" required>
                                        <option value="">Select</option required>
                                        <option value="curated">Curated</option>
                                        <option value="automated">Automated</option>
                                        </select>
                                    </div>
                              </div>
                              <div class="col-md-6">
                                   <div class="form-group">
                                        <label for="exampleFormControlSelect1">Category</label required>
                                        <select  name="categories[]"class="form-control form-control-lg" id="listCategory" multiple required>
                                        <option value="">Select</option required>
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
