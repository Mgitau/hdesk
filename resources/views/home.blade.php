@extends('templates.default')

@section('content')


	<div class="row">

		<div class="col-md-6 col-md-offset-3">

			<div class="panel panel-default">

				<div class="panel-body">
					<a href="{{Route('ticket.newticket')}}" class="btn btn-default btn-md btn-block"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> NEW SUPPORT TICKET</a>
					<br>
					<a href="{{Route('search.ticketsearch')}}" class="btn btn-default btn-md btn-block"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> CHECK TICKET STATUS</a>
				</div>



			</div> <!-- end panel-default -->

		</div> <!-- end col-md-6 col-md-offset-3 -->

	</div> <!-- end row -->

</div> <!-- end container -->




@stop
