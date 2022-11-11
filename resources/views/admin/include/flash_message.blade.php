@if ($message = Session::get('success'))
<div class="alert alert-success" id="success-toast" class="toast" data-animation="true" data-autohide="true" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body" style="margin-top:2px;">
	 Success: {{ $message }}
    </div>
    <div><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div>  </div>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger" id="error-toast" class="toast" data-animation="true" data-autohide="true" data-delay="5000" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body" style="margin-top:2px;">
	 Error: {{ $message }}
    </div>
    <div><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a></div>  </div>
</div>
@endif

@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block animation">
	<button type="button" class="close" data-dismiss="alert"><i class="bx bx-x-circle"></i></button>	
	<strong> {{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('info'))
<div class="alert alert-info alert-block">
	<button type="button" class="close" data-dismiss="alert"><i class="bx bx-x-circle"></i></button>	
	<strong> {{ $message }}</strong>
</div>
@endif
@section('scripts')
<script>
	$(document).ready(function() {
		$('.close').on('click', function() {
			$(".hide-me").hide();
		});
	});
</script>
@endsection
