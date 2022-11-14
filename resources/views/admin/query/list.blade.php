@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Querys Management</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table order-listing">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>
                                        Action
                                    </th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=0;@endphp
                                @foreach ($userQuerys as $key => $userQuery)
                                        
                                <tr class="jsgrid-alt-row">
                                    @php $i++;@endphp
                                   
                                    <td>{{$i}}</td>
                                    <td>{{$userQuery->first_name}} {{$userQuery->last_name}}</td>
                                   <td>{{$userQuery->email}}</td>
                                   <td>{{$userQuery->subject}}</td>
                                   {{-- $date=(Carbon::parse($userQuery->created_at)->format('DD-MM-YYYY')); --}}
                                    <td>{{ date("d/m/Y", strtotime($userQuery->created_at))}}</td>
                                    <td>{{ date("h:i:sa", strtotime($userQuery->created_at))}}</td>
                                    <td>
                                        <a href="{{route('query-show',['id'=>$userQuery->id])}}"><button class="btn btn-outline-primary w-60 view-btn">View More</button></a>
                                        <a href="{{route('query-delete',['id'=>$userQuery->id])}}"><button class="btn btn-outline-primary w-60 view-btn">Delete</button></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-12">
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

