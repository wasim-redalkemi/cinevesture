@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')
@section('content')
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="modal_container">
                    <div class="icon_container done">
                        <i class="fa fa-check icon_style" aria-hidden="true"></i>
                    </div>
                    <div class="head_text mt-4">Congratulations!</div>
                    <div class="sub_text mt-4">
                        You have successfuly published a Job. Do you want to promote your job?
                        <i class="fa fa-info-circle" aria-hidden="true"></i>
                    </div>
                    <div><button class="submit_btn mt-4">Submit your job for promotion</button></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Unpublish job -->

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="modal_container">
                    <div class="icon_container warning">
                        <i class="fa fa-times icon_style" aria-hidden="true"></i>
                    </div>
                    <div class="head_text mt-4">Are you sure?</div>
                    <div class="sub_text mt-4">Do you really want to unpublish this job?</div>
                    <div class="d-flex justify-content-center mt-4">
                        <button class="cancel_btn mx-3">Cancel</button>
                        <button class="delete_btn mx-3">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection