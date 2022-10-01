@extends('layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('include.header')
@endsection

@section('content')
<section class="">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="d-flex align-items-center justify-content-center mt-5">
                    <div class="flow_container">1</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">2</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">3</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">4</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">5</div>
                    <hr class="flow_hr">
                    <div class="flow_container opacity-50">6</div>
                </div>
                <!-- <div class=" mt-2">
                <div class="d-flex align-items-center">
                    <div class="w_14">Overview</div>
                    <div class="w_14">Details</div>
                    <div class="w_14">Description</div>
                    <div class="w_14">Gallery</div>
                    <div class="w_14">Requirements & Milestones</div>
                    <div class="w_14">Preview</div>
                </div>
                </div> -->


            </div>
        </div>
    </div>
</section>


<!-- Description section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="profile_wraper profile_wraper_padding mt-4">
                    <form role="form" method="POST" enctype="multipart/form-data" action="{{route('project-description-store',['id' => $user->id ])}}">
                        @csrf

                        <p class="flow_step_text pb-0"> Description</p>                
                        <div class="row">
                            <div class="col-md-6">
                                <div class="profile_input">
                                    <label>Logline *</label>
                                    <input type="text" class="form-control" name="logline" placeholder="Logline" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="profile_input">
                                    <label>Synopsis/Brief Description *</label>
                                    <textarea class="form-control" name="synopsis" aria-label="With textarea"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="profile_input">
                                    <label>Director/Creator/Founder’s Statement *</label>
                                </div>
                                <textarea class="form-control" name="director_statement" style="border: 1px solid #4D0D8A;" id="textAreaExample3" rows="1"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-end mt-5 pt-0 pt-md-5">
                                    <button class="cancel_btn mx-3">Go back</button>
                                    <button type="submit" class="guide_profile_btn">Save & Next</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection

@section('footer')
@include('include.footer')
@endsection

@section('scripts')
@endsection