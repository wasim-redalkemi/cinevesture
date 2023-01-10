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
                              <div class="col-md-6">
                                <div class="form-group">
                                        <label class="mb-3">Name</label>
                                        <input type="hidden" name="id" id="id" value="{{$projectList->id}}">
                                        <input type="text" class="form-control form-control-lg" name="name" placeholder="List name" aria-label="Username" value="{{ucFirst($projectList->list_name)}}">
                                </div>
                                <div class="row" style="margin-top:15px">
                                    <div class="col-md-12" style="padding-left: 42%;">
                                        <button type="submit" class="btn btn-success btn-sm mt-10 text-white">Update</button>
                                    </div>
                                </div>
                              </div>
                            </div>
                     </form>
                 </div>
            </div>
        </div>
    </div>
</div>
@endsection
