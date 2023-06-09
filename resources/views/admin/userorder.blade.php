@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">User Management</h4>
            {{-- <div class="row">
                <div class="col-md-12">
                    <div id="accordion">
                        <div class="my_card mb-4">
                          <div class="card-header">
                            <a class="card-link" data-toggle="collapse" href="#collapseOne">
                                <div class="text-center d-block">
                                    <button class="btn btn-sm btn-success text-white">
                                        Apply Filter
                                    </button>
                                </div>
                            </a>
                          </div>
                          <div id="collapseOne" id="show_filter" class="collapse p-3 pt-4" data-parent="#accordion">
                            <form class="" method="get" action="{{route('user-management')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Organization </label>
                                            <select name="organization" id="" class="form-control radius">
                                                @if (!empty($UserOrganisation))
                                                <option value="">Select</option>
                                                @foreach ($UserOrganisation as $k => $v)                                        
                                                <option value="{{$v->id}}"<?php if ($v->id == request('organization')) {echo 'selected';} ?>>{{$v->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Location</label>
                                        <select name="country" id="" class="form-control form-control radius">
                                            <option value="">Country</option>
                                            @foreach ($countries as $key=>$country)
                                            <option value="{{$country->id}}" <?php if ($country->id == request('country')) {echo 'selected';} ?>>{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Date Joined From</label>
                                        <input type="date" name="from_date" value="{{request('from_date')}}" class="form-control form-control-sm radius"placeholder="Jane Doe">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Date Joined to</label>
                                        <input type="date" name="to_date" value="{{request('to_date')}}" class="form-control form-control-sm radius"placeholder="Jane Doe">
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" id="" class="form-control form-control radius">
                                            <option value="">Select</option>
                                            <option value="1" <?php if (request('status')=="1") {echo 'selected';} ?>>Active</option>
                                            <option value="0" <?php if (request('status')=="0") {echo 'selected';} ?> >Inactive</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Membership</label>
                                        <select name="membership" id="" class="form-control radius">
                                            <option value="">Select</option>
                                            <option value="free" <?php if (request('membership')=="free") {echo 'selected';} ?>>Free</option>
                                            <option value="basic" <?php if (request('membership')=="basic") {echo 'selected';} ?> >Basic</option>
                                            <option value="pro" <?php if (request('membership')=="pro") {echo 'selected';} ?> >Pro</option>
                                            <option value="enterprise" <?php if (request('membership')=="enterprise") {echo 'selected';} ?> >Enterprise</option>
                                        </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <label>Search</label>
                                        <div><input type="text" value="{{request('search')}}" class="form-control form-control-sm" name="search" id="" placeholder="Search"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mt">
                                        <div class="form-group">
                                            <label for="">Action</label>
                                            <div class="d-flex">
                                                <div><button type="submit" id="filter_btn" class="btn btn-success btn-sm mr-3 text-white">Filter</button></div>
                                                <div><a href="{{route('user-management')}}"><button type="button" class="btn btn-warning btn-sm fa fa-refresh text-white">  Refresh</button></a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                          </div>
                        </div>
                    </div>
                    
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table order-listing table-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Title</th>
                                    <th>Organisation</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                    <th>Membership</th>
                                    <th>Joining</th>
                                    <th class="notForPrint">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($users))
                               
                                @php
                                    // $i=($users->perPage()*($users->currentPage()-1))
                                @endphp
                                
                            
                                {{-- @foreach($users as $user) --}}
                                <?php $i++;?> 
                                <tr>
                                   <td>
                                    <?php echo $i;?>
                                    </td>
                                    <td>sdkj</td>
                                    <td>s,djn</td>
                                    <td>sdkjc</td>
                                    <td>dkjcn</td>
                                    <td>dkjc</td>
                                    <td> 
                                        sdkjc
                                    </td>
                                    <td>
                                        cn
                                    </td>
                                    <td>\xlkcnj </td>
                                    <td class="noExport">
                                        xscd
                                    </td>
                                 </tr>
                               {{-- @endforeach --}}
                              @endif 
                            </tbody>
                        </table>
                        {{-- <div class="row mt-3">
                         <div class="col-md-12 d-flex justify-content-between mt-3">
                            <div>{{'Showing '.$users->firstItem().' to' .' '. $users->lastItem().' of'.' '.$users->total()}}</div>
                             <div style="float:right;" >
                                {{$users->links()}}
                                {{ $users->appends($_GET)->links() }}
                                {{ $users->onEachSide(0)->appends($_GET)->links() }}
                            </div>
                             </div> 
                         </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</div>
@endsection
@push('scripts')
<script>
    $(document).ready(function(){
    // @if (request('organization') || request('country') || request('from_date') || request('to_date') || request('status') || request('membership') || request('search'))
    //     $(".collapse").addClass("show");
    // @endif
     
       
        
});
</script>
@endpush
