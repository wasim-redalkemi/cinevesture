@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Category Update</h4>
            <hr>
            <div class="container mt-5">
                <form action="{{route('category.update')}}" method="post">
                    @csrf
                    <div class="row">
                    @foreach ($categories as $key=>$category)
                    <input type="text" name="" value="{{$projectcategories->project_id}}" name="" id="">
                        <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="{{$category->id}}" class="form-check-input" @if(in_array($category->id,$projectcategories))checked  @endif>
                                    {{$category->name}}
                                </label>
                            </div>
                        </div>
                    @endforeach
                    </div>  
                    <span class="input-group-append">
                        <button class="file-upload-browse btn btn-primary" type="submit">Upload</button>
                      </span> 
                </form>    
            </div>
           
        </div>
        
    </div>
</div>
@endsection
@push('scripts')
@endpush