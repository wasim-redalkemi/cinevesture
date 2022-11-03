@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Project Management</h4>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table order-listing">
                            <thead>
                                <tr>

                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Genre</th>
                                    <th>Date</th>
                                    <th>Created</th>
                                    <th>Views</th>
                                    <th>Favorited</th>
                                    <th>Badge</th>
                                    <th>Action</th>
                                    <!-- <th>Actions</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($projects as $key=>$project)
                                
                                <tr>
                                    <td>1</td>
                                    <td>{{$project->project_name}}</td>
                                    <td>{{$project->category_id}}</td>
                                    <td>{{$project->category_id}}</td>
                                    <td>{{ date('d-M-y', strtotime($project->created_at)) }}</td>
                                    @if (isset($project->user->name))
                                    <td>{{$project->user->name}}</td>
                                    @endif
                                   
                                    <td>{{$project->user->name}}</td>
                                    <th>
                                        
                                        @php
                                       $x=($project->favorited==1)? 0:1;
                                       @endphp
                                        
                                        <input type="checkbox" class="fav_inp" path="{{route('adminmarkfav')}}?s={{$x}}&p={{$project->id}}" name="fav" id="fav" <?php if($project->favorited == 1){echo 'checked';}?>>
                                     
                                    </th>                                    
                                    <td>
                                        @php
                                        $recom=($project->Recommended_badge==1)? 0:1;
                                        @endphp
                                        
                                         <input type="checkbox" class="recom_inp" path="{{route('adminmarkrecom')}}?s={{$recom}}&p={{$project->id}}" name="fav" id="fav" <?php if($project->Recommended_badge == 1){echo 'checked';}?>>
                                    </td>
                                    <td d->
                                    
                                        <button class="btn mb-2  btn-outline-primary w-65 view-btn">View</button></div>
                                       
                                        <button class="btn btn-outline-primary w-60 view-btn">Edit</button>
                                   
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
@push('scripts')
<script>
    $(document).ready(function() {       
        $('.fav_inp').change(function()
        {
            window.location.href=$(this).attr('path');
        })
        $('.recom_inp').change(function()
        {
            window.location.href=$(this).attr('path');
        })
    })
</script>

@endpush

