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
                                    <th>Message</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($userQuerys as $key => $userQuery)
                                <tr class="jsgrid-alt-row">
                                    <td>{{$userQuery->id}}</td>
                                    <td>{{$userQuery->first_name}}</td>
                                   <td>{{$userQuery->last_name}}</td>
                                   <td>{{$userQuery->email}}</td>
                                    <td>{{$userQuery->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush

