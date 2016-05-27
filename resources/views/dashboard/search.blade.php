@extends('templates.default')

@section('content')

		<!-- include Ticket Partial -->
		@include('dashboard.partials.header')

		@if(!$tickets)
		<div class="alert alert-danger">
				<p>No ticket found, sorry</p>
		</div>

		@else

    <!-- include Ticket Partial -->
		@include('dashboard.partials.searchresults')


</div><!--end container-->
@endif

@stop
