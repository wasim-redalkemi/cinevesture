@extends('admin.layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Querys Management</h4>
            <hr>
            <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div><label for="">First Name</label></div>
                    <div><input type="text" class="radius inp-height form-control" value="{{$query->first_name}}" name="" id="" disabled></div>
                </div>
                <div class="col-md-4">
                    <div><label for="">Last Name</label></div>
                    <div><input type="text" class="radius inp-height form-control" value="{{$query->last_name}}" name="" id="" disabled></div>
                </div>              
            </div>
            <div class="row">
                <div class="col-md-8 mt-4">
                    <div><label for="">Email</label></div>
                    <div ><input class="radius inp-height form-control" type="text" value="{{$query->email}}" name="" id="" disabled></div>
                </div >
            </div>
            
            
            <div class="row mt-4">
                <div class="col-md-8">
                    <div>
                        <div><label for="">Subject</label></div>
                        <div><input class="radius inp-height form-control" type="text" value="{{$query->subject}}" name="" id="" disabled></div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-8">
                    <div>
                        <div><label for="">Message</label></div>
                       <div class="form_elem"> <textarea class="radius form-control" type="text-field" style="height: 150px;" value="{{$query->message}}" name="" id="" disabled>{{$query->message}}</textarea></div>
                       
                    </div>
                </div>
            </div>
            <div class="row mt-4" >
                <div class="col-md-4">
                    <div><label for="">Date</label></div>
                    <div><input type="text" class="radius inp-height form-control" value="{{ date("d/m/Y", strtotime($query->created_at))}}" name="" id="" disabled></div>
                </div>
                <div class="col-md-4">
                    <div><label for="">Time</label></div>
                    <div><input type="text" class="radius inp-height form-control" value="{{ date("h:i:sa", strtotime($query->created_at))}}" name="" id="" disabled></div>
                </div>     
            </div>
           
        </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
@endpush

