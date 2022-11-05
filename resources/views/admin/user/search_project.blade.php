@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Project List Management</h4>
            <div class="row">
                <div class="col-12">
                   <form role="form" method="Post" action="{{ route('find-project') }}">
                            @csrf
                            <div class="row">
                              <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Project Name</label>
                                    <input type="text"  name="name" placeholder="Search.." aria-describedby="basic-addon1">
                                    <button type="submit"><i class="fa fa-search"></i></button>
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
