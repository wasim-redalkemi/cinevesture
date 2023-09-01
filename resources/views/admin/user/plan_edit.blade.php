@extends('admin.layouts.app')

@section('content')
<div class="hide-me animation for_authtoast">
    @include('admin.include.flash_message')
</div>
<div class="content-wrapper">
    <div class="card col-md-12">
        <div class="card-body">
            <h1 class="card-title">User plan update</h1>
            <div class="row">
                <div class="col-md-12">
                   <form role="form" method="Post" action="{{route('user-plan-update')}}">
                            @csrf
                            <div class="row">
                              <div class="col-md-3">
                                <div class="form-group">
                                        <label class="">Name</label>
                                        <input type="text" class="form-control radius" name="first_name" placeholder="First name" aria-label="Username" value="{{$user->first_name.' '.$user->last_name}}" readonly>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group">
                                     <label for="exampleFormControlSelect1">Email</label required value="">
                                       <input type="email" class="form-control radius" placeholder="Email" value="{{$user->email}}" name="email" id="" readonly >
                                </div>
                              </div>
                              <hr>
                              <br>
                              <div class="col-md-3">
                                <div class="form-group">
                                     <label for="exampleFormControlSelect1">Plan type<span class = "text-danger">*</span></label required>
                                     <select  name="plan_type"class="form-control radius" id="listStatus" >
                                     <option value="#">Select plan</option>
                                     <option  value=8 @if ($subscription && $subscription->plan_id == 8) selected @endif >Basic</option>
                                     <option value=10 @if ($subscription && $subscription->plan_id == 10) selected @endif>Pro</option>
                                     <option value=14 @if ($subscription && $subscription->plan_id == 14) selected @endif>Enterprise</option>
                                     </select>
                                    </div>
                                </div>
                                  <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Expiry date<span class = "text-danger">*</span></label>
                                        <input type="date" min="{{date('Y-m-d')}}" class="form-control radius"  placeholder="Select end date" @if ($subscription)
                                            
                                         value="{{date('Y-m-d',strtotime($subscription->subscription_end_date))}}" @endif name="end_date" id="" >
                                   </div>
                                  </div>
                                </div>
                                <input type="hidden" name="user_id" value="{{$user->id}}" id="">
                                 
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

