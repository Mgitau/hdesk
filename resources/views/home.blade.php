@extends('templates.default')

@section('content')


	<div class="row">

		<div class="col-md-6 col-md-offset-3">

			<div class="panel panel-default">

				<div class="panel-body">
					<a href="{{Route('ticket.newticket')}}" class="btn btn-default btn-md btn-block">SUBMIT A TICKET</a>
					<br>
					<a href="{{Route('search.ticket')}}" class="btn btn-default btn-md btn-block">VIEW EXISTING TICKET</a>
				</div>

			</div> <!-- end panel-default -->

		</div> <!-- end col-md-6 col-md-offset-3 -->

	</div> <!-- end row -->

</div> <!-- end container -->




@stop
