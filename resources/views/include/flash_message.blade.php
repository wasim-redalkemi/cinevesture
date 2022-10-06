@if ($message = Session::get('success'))
<div class="toast align-items-end text-black bg-success border-0 justify-content-end" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
	 Sussess: {{ $message }}
    </div>
    <button type="button" class="btn-close btn-close-black me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endif


@if ($message = Session::get('error'))
<div class="toast align-items-end text-white bg-danger border-0 justify-content-end" id="error-toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="d-flex">
    <div class="toast-body">
      Error: {{$message}}
    </div>
    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
</div>
@endif


@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-block">
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