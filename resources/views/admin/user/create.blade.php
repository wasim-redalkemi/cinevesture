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
                   <form role="form" method="Post" action="{{route('user-store')}}">
                            @csrf
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                        <label class="">First Name<span class = "text-danger">*</span></label>
                                        <input type="text" class="form-control radius" name="first_name" placeholder="First name" aria-label="Username" value="" required>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                        <label class="">Last Name<span class = "text-danger">*</span></label>
                                        <input type="text" class="form-control radius" name="last_name" placeholder="List name" aria-label="Username" value="" required>
                                </div>
                              </div>
                              
                              <div class="col-md-4">
                                <div class="form-group">
                                     <label for="exampleFormControlSelect1">Email</label required value="">
                                       <input type="email" class="form-control radius" placeholder="Email" value="" name="email" id="" >
                                </div>
                              </div>
                            
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Password</label required value="">
                                          <input type="password" class="form-control radius" placeholder="password" value="" name="password" id="" >
                                   </div>
                                  </div>
                                  
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Confirm Password</label required value="">
                                          <input type="password" class="form-control radius" placeholder="Confirm Password" value="" name="cpassword" id="" >
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

