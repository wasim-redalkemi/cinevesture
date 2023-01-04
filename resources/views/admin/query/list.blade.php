@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Query Management</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table order-listing table-sm table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="col-md-1">Id</th>
                                    <th class="col-md-1">Name</th>
                                    <th class="col-md-1">Email</th>
                                    <th class="col-md-1">Subject</th>
                                    <th class="col-md-1">Date</th>
                                    <th class="col-md-1">Time</th>
                                    <th class="col-md-2 notForPrint">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i=($userQuerys->perPage()*($userQuerys->currentPage()-1))
                                  @endphp 
                                
                                @foreach ($userQuerys as $key => $userQuery)
                                @php
                                    $i++;
                                @endphp
                                <tr class="jsgrid-alt-row">
                                   
                                    <td>{{$i}}</td>
                                    <td>{{ucfirst($userQuery->first_name)}} {{$userQuery->last_name}}</td>
                                   <td>{{$userQuery->email}}</td>
                                   <td>{{ucfirst($userQuery->subject)}}</td>
                                   {{-- $date=(Carbon::parse($userQuery->created_at)->format('DD-MM-YYYY')); --}}
                                    <td>{{ date("d/m/Y", strtotime($userQuery->created_at))}}</td>
                                    <td>{{ date("h:i:sa", strtotime($userQuery->created_at))}}</td>
                                    <td>
                                        <a href="{{route('query-show',['id'=>$userQuery->id])}}"><button class="btn btn-primary w-60 view-btn">View More</button></a>
                                        <a class="confirmAction" href="{{route('query-delete',['id'=>$userQuery->id])}}"><button class="btn btn-danger w-60 view-btn">Delete</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                           
                            <div class="col-md-12 d-flex justify-content-between mt-3">
                                 <div>{{'Showing '.$userQuerys->firstItem().' to' .' '. $userQuerys->lastItem().' of'.' '.$userQuerys->total()}}</div>
                                <div style="float:right;" >{{$userQuerys->links()}}</div>
                                </div> 
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush

