@extends('templates.default')

@section('content')

	<div class="container hdesk-container">

		<h3>Dashboard</h3>

    <div class="navbar navbar-default">
      <div class="navbar-header">
        <div class="container">
          <div class="nav navbar-nav">

              <select class="selectpicker " name="ticket-status">
                <option class="open_ticket">Open Tickets</option>
                <option class="closed_ticket">Closed Tickets</option>
                <option class="pending_ticket">Pending Tickets</option>
              </select>

              <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">Search</button>
              </form>


            <a class="btn btn-primary navbar-btn" href="{{ Route('ticket.newticket') }}" role="button">+ New Ticket</a>
          </div><!-- .nav navbar-nav -->

        </div><!-- .container-->
      </div><!-- .navbar-header-->

    </div><!-- .navbar-navbar-default-->

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
