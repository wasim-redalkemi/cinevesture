@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Genre Update</h4>
            <hr>
            <div class="container mt-5">
                <form action="{{route('genre.update')}}" method="post">
                    @csrf
                        
                    <input type="hidden" value ="{{$project_id}}" name="p_id" >
                    <div class="row">
                        {{-- {{$projectcategories }} --}}
                    @foreach ($mastergenres as $key=>$mastergenre)
                    
                        {{-- <input type="text" name="" value="{{$projectcategory->project_id}}" name="" id=""> --}}
                       
                        <div class="col-md-3">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" name="genres[]" value="{{$mastergenre->id}}" class="form-check-input" @if(in_array($mastergenre->id,$genres))checked  @endif>
                                   
                                    {{$mastergenre->name}}
                                </label>
                            </div>
                        </div>
                    @endforeach
                    </div>  
                    <div class="input-group-append d-flex justify-content-center m-4">
                        <button class="file-upload-browse btn-sm btn btn-primary" type="submit">Upload</button>
                    </div> 
                </form>    
            </div>
           
        </div>
        
    </div>
</div>
@endsection
@push('scripts')
@endpush