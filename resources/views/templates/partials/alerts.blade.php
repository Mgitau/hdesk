@if (Session::has('info'))

	<div class="alert alert-info">
		{{ Session::get('info') }}
	</div>

@elseif(Session::has('alert'))

	<div class="alert alert-danger">
		{{ Session::get('alert') }}
	</div>

@endif
