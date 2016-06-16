<nav class="nav navbar-default">

	<div class="container-fluid">

		<div class="navbar-header">

			<a class="navbar-brand" href="{{Route('home')}}">H-Desk</a>

		</div> <!-- end navbar-header -->

		<ul class="nav navbar-nav navbar-right">

		@if(!Auth::check())
			<li><a href="{{Route('ticket.newticket')}}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> New Ticket</a></li>
			<li><a href="{{Route('search.ticketsearch')}}"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> Ticket Status</a></li>
			<li><a href="{{Route('admin.login')}}"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span> Sign In</a></li>
		@else

			<li><a href="{{Route('dashboard.index')}}"><span class="glyphicon glyphicon-dashboard" aria-hidden="true"></span> Dashboard</a></li>
			<li><a href="{{Route('admin.newadmin')}}">New Admin</a></li>
			<!-- Not implemeted -->
			<li><a href="{{Route('dashboard.trash')}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>  Trash</a></li>
			<li><a href="#"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {{Auth::user()->getFirstNameOrUsername()}}</a></li>
			<li><a href="{{Route('admin.signout')}}"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sign Out</a></li>
		@endif
      </ul>

	</div>  <!-- end container-fluid -->


</nav> <!-- end nav -->
