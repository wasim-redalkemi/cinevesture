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
  .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20rem; }
  .toggle.ios .toggle-handle { border-radius: 20rem; }
  .toggle-on{
    color: #fff;
    background-color: #971E9B;
    border-color: #971E9B;  
  }
  .btn-primary.active{
    color: #fff;
    background-color: #971E9B;
    border-color: #971E9B;
  }
  .toggle-handle {
    background: #971E9B;

  }
  .toggle-off{
    color: #fff;
    background-color: #b26cb4;
    border-color: #f9fafb; 
  }
  .btn-primary:hover {
    color: #fff;
    background-color: #971E9B;
    border-color: #971E9B;
}
.btn-light:hover {
    color: #fff;
    background-color: #b26cb4;
    border-color: #f9fafb; 
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
                @if($endorsement)
                @foreach($endorsement as $edm)
                <div class="profile_wraper profile_wraper_padding mt-4">
                  <div class="row">
                    <div class="col-md-3">
                        <div class="guide_profile_main_text deep-pink">{{$edm['endorsementCreater']->name}}</div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">{{$edm['endorsementCreater']->job_title}}</div>
                        <div class="profile_upload_text Aubergine_at_night fw_300">{{date('d M Y',strtotime($edm->created_at))}}</div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">{{$edm['endorsementCreater']['organization']->name?$edm['endorsementCreater']['organization']->name:NULL}}</div>
                    </div>
                    <div class="col-md-7">
                        <div class="guide_profile_main_text Aubergine_at_night">Published</div>
                        <div class="guide_profile_main_subtext Aubergine_at_night">
                        {{$edm->comment}}
                        </div>
                    </div>
                    <div class="col-md-2">
                    <input type="checkbox" class="check" <?php if($edm->status == '1'){echo'checked';}?> data-toggle="toggle" value="{{$edm->id}}" data-on="" data-off="" data-style="ios">   
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
         $.ajax(
        {
            url:"{{ route('endorsement-status-change') }}",
            type:'POST', 
            dataType:'json',
            data:{end_id:checkbox,"_token": "{{ csrf_token() }}"},
            success:function(response)
            {   
                toastMessage(response.status, response.msg);
                $('.modal').hide();
                $('.modal-backdrop').remove();
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

</script>
@endpush
