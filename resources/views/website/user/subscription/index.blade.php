@extends('website.layouts.app',['class' => 'bg_white'])

@section('title','Project-overview')

@section('header')
@include('website.include.header')
@endsection

@section('content')
<div class="hide-me animation for_authtoast">
    @include('website.include.flash_message')
</div>


<!-- Overview section -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <div class="container">
  <div style = "text-align:center;margin-top:200px">
    <form>
      <a  href="{{route('subscription-create')}}">
        <span class="before-submit">Subscribe</span>
       </a>
    </form>
  </div>
</div>
     </div>
        </div>
    </div>
</section>

@endsection



@push('scripts')
<script>

    $(document).ready(function(){
        $("#error-toast").toast("show");
        $("#success-toast").toast("show");
    });
</script>
@endpush
