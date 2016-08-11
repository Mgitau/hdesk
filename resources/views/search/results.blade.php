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
    <br>
  @foreach ($ticket->comments as $comment)

    @if($comment->root_cause)

      <div class="panel panel-primary">
        <div class="panel-heading"><b>Root Cause</b></div>
        <div class="panel-body">
          {{$comment->root_cause}}
        </div>
        <div class="panel-footer">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span><i> {{ $comment->user->getNameOrUsername() }}</i>
          @if(Auth::user())
          <div class="pull-right">
            <a href="#" class="btn btn-xs btn-default">Edit</a>
            <a href="{{ Route('comment.delete', [ 'comment_id' => $comment->id]) }}" class="btn btn-xs btn-danger">Delete</a>
          </div>
          @endif
        </div>
      </div>

    @elseif($comment->action_required)

      <div class="panel panel-success">
        <div class="panel-heading"><b>Action Required</b></div>
        <div class="panel-body">
          {{$comment->action_required}}
        </div>
        <div class="panel-footer">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span><i> {{ $comment->user->getNameOrUsername() }}</i>
          @if(Auth::user())
          <div class="pull-right">
            <a href="#" class="btn btn-xs btn-default">Edit</a>
            <a href="{{ Route('comment.delete', [ 'comment_id' => $comment->id]) }}" class="btn btn-xs btn-danger">Delete</a>
          </div>
          @endif
        </div>
        </div>
      @elseif($comment->corrective_action)

      <div class="panel panel-danger">
        <div class="panel-heading"><b>Corrective Action</b></div>
        <div class="panel-body">
          {{$comment->corrective_action}}
        </div>
        <div class="panel-footer">
          <span class="glyphicon glyphicon-user" aria-hidden="true"></span><i> {{ $comment->user->getNameOrUsername() }}</i>
          @if(Auth::user())
          <div class="pull-right">
            <a href="#" class="btn btn-xs btn-default">Edit</a>
            <a href="{{ Route('comment.delete', [ 'comment_id' => $comment->id]) }}" class="btn btn-xs btn-danger">Delete</a>
          </div>
          @endif
        </div>
      </div>

    @endif
    @endforeach

    @if(Auth::check())
      <div class="hdesk-container">
        <div class="row">
          <div class="col-md-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#root-cause">Root Cause</button>
            <!-- Modal -->
            <div class="modal fade" id="root-cause" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">Root Cause</h4>
                  </div>
                  <div class="modal-body">
                  <form action="{{route('ticket.comment', ['ticket_id' => $ticket->id])}}" id="root_cause" method="post">
                    <div class="form-group">
                      <label for="message-text" class="control-label">Message:</label>
                      <textarea class="form-control" name="rootcause" id="message-text"></textarea>
                    </div>
                    {{ csrf_field() }}
                  </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="$('#root_cause').submit();"class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#action-required">Action Required</button>
            <!-- Modal -->
            <div class="modal fade" id="action-required" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">Action Required</h4>
                  </div>
                  <div class="modal-body">
                    <form action="{{route('ticket.comment', ['ticket_id' => $ticket->id])}}" id="action_required" method="post">
                      <div class="form-group">
                        <label for="message-text" class="control-label">Message:</label>
                        <textarea class="form-control" name="actionrequired" id="message-text"></textarea>
                      </div>
                      {{ csrf_field() }}
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" onclick="$('#action_required').submit();" class="btn btn-primary">Submit</button>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#corrective-action">Corrective Action</button>
            <!-- Modal -->
            <div class="modal fade" id="corrective-action" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     <h4 class="modal-title" id="myModalLabel">Corrective Action</h4>
                  </div>
                  <div class="modal-body">
                      <form action="{{route('ticket.comment', ['ticket_id' => $ticket->id])}}" id="corrective_action" method="post">
                      <div class="form-group">
                        <label for="message-text" class="control-label">Message:</label>
                        <textarea class="form-control" name="correctiveaction" id="message-text"></textarea>
                      </div>
                      {{ csrf_field() }}
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" onclick="$('#corrective_action').submit();"class="btn btn-primary">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      @endif


@endif




</div><!-- end containter-->




@stop
