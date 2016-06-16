@extends('templates.default')
@section('title', 'Ticket')
@section('content')

	<div class="row">

		<div class="col-md-6 col-md-offset-3 hdesk-container">

			<h3 class="text-center">View Exisitng Ticket</h3>

			<hr>
			<form class="form-horizontal"  action="{{route('search.results')}}">

				<div class="form-group">

					<label for="ticket_id" class="col-md-2 control-label">Ticket ID</label>

					<div class="col-md-8">

						<input type="text" class="form-control" id="ticket_id" name="ticket_id" placeholder="Enter your ticket Id"></input>

					</div>

				</div>

				<button type="submit" class="btn btn-primary  col-md-offset-2">View Ticket</button>

			</form>

		</div> <!-- end md-6 -->

	</div> <!-- end row -->
@stop
