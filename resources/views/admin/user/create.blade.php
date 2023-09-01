@extends('admin.layouts.app')

@section('content')
<div class="hide-me animation for_authtoast">
    @include('admin.include.flash_message')
</div>
<div class="content-wrapper">
    <div class="card col-md-12">
        <div class="card-body">
            <h1 class="card-title">Add new user</h1>
            <div class="row">
                <div class="col-md-12">
                   <form role="form" method="Post" action="{{route('user-store')}}">
                            @csrf
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                        <label class="">First Name<span class = "text-danger">*</span></label>
                                        <input type="text" class="form-control radius" maxlength="40" name="first_name" placeholder="First name" aria-label="Username" value="{{old('first_name')}}" required >
                                        @if($errors->has('first_name'))
                                          <li class="mt-2 text-danger">{{ $errors->first('first_name') }}</li>
                                        @endif
                                </div>
                              </div>
                             
                              <div class="col-md-4">
                                <div class="form-group">
                                        <label class="">Last Name<span class = "text-danger">*</span></label>
                                        <input type="text" class="form-control radius" maxlength="40" name="last_name" placeholder="Last name" aria-label="Username" value="{{old('last_name')}}" required>
                                        @if($errors->has('last_name'))
                                          <li class="mt-2 text-danger">{{ $errors->first('last_name') }}</li>
                                        @endif
                                </div>
                               
                              </div>
                              
                              <div class="col-md-4">
                                <div class="form-group">
                                     <label for="exampleFormControlSelect1">Email<span class = "text-danger">*</span></label required value="">
                                       <input type="email" name="email" class="form-control radius" maxlength="50" placeholder="Email" value="{{old('email')}}" id="email" required>
                                       @if($errors->has('email'))
                                         <li class="mt-2 text-danger">{{ $errors->first('email') }}</li>
                                       @endif
                                </div>
                              </div>
                            
                              <div class="col-md-4">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Password<span class = "text-danger">*</span></label required value="">
                                      <input type="Password" class="form-control radius" maxlength="20" placeholder="Password" value="" name="password" id="" required>
                                      @if($errors->has('password'))
                                        <li class="mt-2 text-danger">{{ $errors->first('password') }}</li>
                                      @endif
                                </div>
                              </div>
                                  
                                  <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Confirm Password<span class = "text-danger">*</span></label required value="">
                                          <input type="password" class="form-control  radius" maxlength="20 " placeholder="Confirm password"  name="confirmed" id="" required>
                                          @if($errors->has('confirmed'))
                                           <li class="mt-2 text-danger">{{ $errors->first('confirmed') }}</li>
                                           @endif
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

