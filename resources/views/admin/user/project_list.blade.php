@extends('admin.layouts.app')

@section('content')
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
                                <div class="profile_input">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="list name" aria-describedby="basic-addon1">
                                </div>
                              </div>
                                <div class="col-md-6">
                                    <div class="profile_input">
                                        <label>Status</label>
                                        <input type="text" class="form-control" name="status" placeholder="list status" aria-describedby="basic-addon1">
                                    </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="justify-center">
                                    <button type="submit" class="btn btn-outline-primary btn-sm mt-10">Create</button>
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
