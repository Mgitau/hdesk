@extends('templates.default')

@section('title', 'Dashboard')

@section('title', 'Dashboard')

@section('content')

		<!-- include Ticket Partial -->
		@include('dashboard.partials.header')

		@if(!$tickets)
		<div class="alert alert-info">
				<p>No ticket found, sorry</p>
		</div>

		@else

    <!-- include Ticket Partial -->
		@include('dashboard.partials.ticketblock')


</div><!--end container-->
@endif

@stop
