@extends('templates.default')
@section('title', 'Results')
@section('content')


<div class="container">

    <div class="hdesk-container">

        @if(!$ticket)

          <div class="alert alert-danger">
		          <p>No ticket found, sorry</p>
	       </div>

        @else

        <div class="row">
          <div class="col-md-12">
            <h4 class="text-center">{{$ticket->subject}}</h4>
          </div>

          @if(Auth::check())
          <span class="pull-right">
            @if($ticket->status === 'Closed')
              <a class="btn btn-primary" href="{{ Route('ticket.edit', ['ticket_id' => $ticket->id]) }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
              <a class="btn btn-danger" href="{{ Route('ticket.trash', ['ticket_id' => $ticket->id]) }}" role="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Trash</a>
            @else
              <a class="btn btn-success" href="{{ Route('status.closed', ['ticket_id' => $ticket->id]) }}" role="button"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Mark Closed</a>
              <a class="btn btn-primary" href="{{ Route('ticket.edit', ['ticket_id' => $ticket->id]) }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
              <a class="btn btn-danger" href="{{ Route('ticket.trash', ['ticket_id' => $ticket->id]) }}" role="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Trash</a>
            @endif
          </span>
          @endif

          </div>
          <div class="row">
            <div class="col-md-2">

               <p><b>Ticket ID:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

               {{$ticket->ticket_no}}

            </div> <!--end col-md-10-->

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Ticket Status:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

              {{$ticket->status}}

            </div> <!--end col-md-10-->

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Category:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->category}}

            </div>

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Priority:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->priority}}

            </div>

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Created on:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->created_at->diffForHumans()}}

            </div>

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Updated on:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->updated_at->diffForHumans()}}

            </div>

        </div> <!--end row-->

        <hr class="hdesk-hr">

        <div class="row">

            <div class="col-md-2">

               <p><b>Name:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->name}}

            </div>

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Email:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

                {{$ticket->email}}

            </div>

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Subject:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

               {{$ticket->subject}}

            </div>

        </div> <!--end row-->

        <div class="row">

            <div class="col-md-2">

               <p><b>Message:</b></p>

            </div> <!--end col-md-2-->

            <div class="col-md-10">

               {{$ticket->message}}

            </div>

        </div> <!--end row-->

    </div> <!--end hdesk-container-->

</div><!-- end containter-->


@endif

@stop
