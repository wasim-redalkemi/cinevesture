@extends('admin.layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Job Management</h4>
            {{-- <div class="row"> --}}
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
                            <div id="collapseOne" class="collapse p-3 pt-4" data-parent="#accordion">
                                <form class="" method="get" action="{{route('job')}}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Location</label>
                                                <select name="country"  id="" class="form-control form-control-sm radius w-75">
                                                    @if (!empty($countries))
                                                        <option value="">Select</option>
                                                        @foreach ($countries as $key => $country)                                        
                                                            <option value="{{$country->id}}" <?php if($country->id == request('country')){echo('selected');} ?>>{{$country->name}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Status</label>
                                            <select name="status" id="" class="form-control form-control-sm radius w-75">
                                                <option value="">Select</option>
                                                <option value="published"<?php if (request('status')=="published") {echo ('selected');} ?>>Active</option>
                                                <option value="unpublished" <?php if (request('status')=="unpublished") {echo ('selected');} ?>>Inactive</option>
                                            </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                            <label>Search</label>
                                            <div><input type="text" value="{{request('search')}}" class="form-control form-control-sm w-75" name="search" id="" placeholder="Search"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 ">
                                            <div class="form-group">
                                                <label for="">Action</label>
                                                <div class="d-flex">
                                                    {{-- <input type="submit" name="" id=""> --}}
                                                    <div><button type="submit" class="btn btn-success btn-sm mr-3 text-white">Filter</button></div>
                                                    <div><a href="{{route('job')}}"><button type="button" class="btn btn-warning btn-sm fa fa-refresh text-white">  Refresh</button></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row mt-3">
                    </div>
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table id="order-listing" class="table order-listing table-sm table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="col-md-2">Id</th>
                                        <th class="col-md-2">Title </th>
                                        <th class="col-md-2">Organization</th>
                                        <th class="col-md-2">Location</th>
                                        <th class="col-md-2">Created by</th>
                                        <th class="col-md-2">Promote</th>
                                        <th class="col-md-2">Status </th>
                                        <th class="col-md-2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=0;?>
                                    @foreach($jobs as $key=>$job)
                                    <?php $i++;?>
                                    <tr class="jsgrid-alt-row">
                                        <td>
                                        <?php echo $i;?>
                                        </td>
                                        <td>
                                            {{ucfirst($job->title)}}
                                        </td>
                                       <td>
                                        @foreach ($job->jobOrganisation as $organisation)
                                            {{$organisation->name}}
                                        @endforeach
                                        </td>
                                       <td>
                                            {{$job->jobLocation->name}}
                                        </td>
                                        <td>
                                            @foreach ($job->user as $value)
                                                {{$value->name}}
                                            @endforeach
                                        </td>
                                        <td>
                                            
                                            @php $promote=($job->Promote=="1")?"0":"1"; @endphp
                                           <input type="checkbox" name="promote" path="{{route('promot_update')}}?p={{$promote}}&id={{$job->id}}" id='' class="promote" <?php if ($job->Promote==1) {echo 'checked';}?>>
                                        </td>
                                        <td class="" style="width: 100px;">
                                            @php
                                                $x=($job->save_type=='published')? 'unpublished':'published';
                                            @endphp
                                            @if ($job->save_type=='published')
                                            <a href="{{route('status_update')}}?status={{$x}}&job_Id={{$job->id}}"><button type="button" class="btn btn-primary btn btn-success text-white">{{($job->save_type=='published') ?"Active":"Inactive"}}</button>
                                            </a>
                                            @else
                                            <a href="{{route('status_update')}}?status={{$x}}&job_Id={{$job->id}}"><button type="button" class="btn btn-primary btn btn-warning text-white">{{($job->save_type=='unpublished') ?"Inactive":"Active"}}</button>
                                            </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('posted-job-single-view',['job_id'=>$job->id])}}"><button class="btn mb-2 view-btn btn btn-primary">View</button></a>
                                            <a href="{{route('job-delete',['id'=>$job->id])}}"><button class="btn mb-2 view-btn btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>                            
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div style="float:right;">{{$jobs->links()}}</div>
                    </div> 
                </div>
        </div>
    </div>
</div>    

@endsection
@push('scripts')
<script>
    $(document).ready(function() {       
        $('.promote').change(function()
        {
            window.location.href=$(this).attr('path');
        })
        
    })
    
    @if (request('status')|| request('search') || request('country')) 
        $(".collapse").addClass("show");
    @endif

  
</script>
@endpush

