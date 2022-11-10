@extends('admin.layouts.app')

@section('content')
<div class="hide-me animation for_authtoast">
    @include('admin.include.flash_message')
</div>
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Project List Management</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table order-listing">
                            <thead>
                                <tr>
                                   <th>Name</th>
                                    <th>Status</th>
                                    <th>Project Count</th>
                                </tr>
                            </thead>
                            <tbody>
                              @if(isset($project_list))  
                                @foreach($project_list as $project)
                                    <tr>
                                        <td>{{$project->list_name}}</td>
                                        <td>{{$project->list_status}}</td>
                                        <td><a href="{{route('search-project',['id' => $project->id ])}}"><button type="button" class="btn btn-outline-primary btn-sm mt-10">{{$project_count}}</button></a></td>
                                    </tr>
                                @endforeach
                               @endif
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
