@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Cinevesture-organisation')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>
@push('add_css')
<style>
.switch {
  position: relative;
    display: inline-block;
    width: 55px;
    height: 28px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 25px;
    width: 26px;
    left: 2px;
    bottom: 2px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #971E9B;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
@endpush

<section class="profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('website.include.profile_sidebar')
            </div>
            <div class="col-md-9">
                <div class="profile_text mt-2"><h1>Endorsements</h1></div>
                @if(isset($endorsement))
                @foreach($endorsement as $edm)
                <div class="profile_wraper profile_wraper_padding my-4">
                  <div class="row">
                    <div class="col-md-3">
                        <div class="guide_profile_main_text deep-pink">{{$edm['endorsementCreater']->name}}</div>
                        <div class="preview_subtext mt-0">{{$edm['endorsementCreater']->job_title}} </div>
                        <div class="profile_upload_text Aubergine_at_night fw_300">{{strtoupper(date('jS F Y',strtotime($edm->created_at)))}}</div>
                        <div class="preview_subtext mt-0">{{isset($edm['endorsementCreater']['organization']->name)?$edm['endorsementCreater']['organization']->name:NULL}}</div>
                    </div>
                    <div class="col-md-7">
                        <div class="guide_profile_main_text Aubergine_at_night">Published</div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">
                        {{$edm->comment}}
                        </div>
                    </div>
                    <div class="col-md-2">
                      <div class="d-flex justify-content-end">
                    <!-- <input type="checkbox" class="check" <?php if($edm->status == '1'){echo'checked';}?> data-toggle="toggle" value="{{$edm->id}}" data-on="" data-off="" data-style="ios">  -->
                    <label class="switch">
                      <input type="checkbox" class="check" value="{{$edm->id}}" <?php if($edm->status == '1'){echo'checked';}?>>
                      <span class="slider round"></span>
                    </label>  
                    </div>
                    </div>
                  </div>
                </div>
                @endforeach
                 @else
                 <div class="profile_text" style="text-align: center;"><h1>No Data Found</h1></div>

                @endif
                {!! $endorsement->links() !!}
            </div>
        </div>
    </div>
</section>

@endsection

@section('footer')
@include('website.include.footer')
@endsection

@push('scripts')
<script>
    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });
  $(function() {
    $('.check').change( function(event){
         checkbox = $(this).val();
         $(".toast").hide();
         $.ajax(
        {
            url:"{{ route('endorsement-status-change') }}",
            type:'POST', 
            dataType:'json',
            data:{end_id:checkbox,"_token": "{{ csrf_token() }}"},
            success:function(response)
            {   
       
                toastMessage(response.status, response.msg);
              
            },
            error:function(response,status,error)
            {   
                console.log(response);
                console.log(status);
                console.log(error);
                
            } 
        });
    });
        

    });

    $('.btn-close').on('click', function() {
			$(".toast").hide();
		});

</script>
@endpush
