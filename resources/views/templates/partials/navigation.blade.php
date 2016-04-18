<nav class="nav navbar-default">

	<div class="container-fluid">

		<div class="navbar-header">

			<a class="navbar-brand" href="{{Route('home')}}">H-Desk</a>

		</div> <!-- end navbar-header -->

		<ul class="nav navbar-nav navbar-right">

			@if (Auth::check())
					<li><a href="{{Route('admin.signout')}}">Sign Out</a></li>
			@else

			<li><a href="{{Route('ticket.newticket')}}">Submit Ticket</a></li>

			<li><a href="{{Route('search.ticketsearch')}}">View Ticket</a></li>

			<li><a href="{{Route('admin.login')}}">Sign In</a></li>
			@endif






      </ul>

	</div>  <!-- end container-fluid -->


</nav> <!-- end nav -->
