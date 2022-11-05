@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Project List Management</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                   <th>Name</th>
                                    <th>Status</th>
                                    <th>Project Count</th>

                                </tr>
                            </thead>
                            <tbody>
                              @foreach($project_list as $project)
                                 <tr>
                                    <td>{{$project->list_name}}</td>
                                    <td>{{$project->list_status}}</td>
                                    <td>
                                        
                                       <a href="{{route('search-project')}}"><button type="button" class="btn btn-outline-primary btn-sm mt-10">{{$project_count}}</button></a>
</td>
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
