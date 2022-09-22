@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
	<span><i class="bx bx-check-circle"></span></i><strong> {{ $message }}</strong>
</div>
@endif


@if ($message = Session::get('error'))
<div class="alert alert-danger alert-block">
	<span><i class="bx bx-x-circle"></i></span>
        <strong> {{ $message }}</strong>
	<button type="button" class="close" data-dismiss="alert"><i class="bx bx-x-circle"></i></button>	

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