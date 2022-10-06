@if ($message = Session::get('success'))
<div class="alert alert-success alert-block animation">
	<span><i class="bx bx-check-circle"></span></i><strong> {{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="toast align-items-end text-white bg-danger border-0 animation" id="error-toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      Error: {{$message}}
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
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