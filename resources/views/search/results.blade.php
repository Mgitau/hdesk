@extends('templates.default')
@section('title', 'Results')
@section('content')


<div class="container">


      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="text-center">{{$ticket->subject}}</h4>
        </div><!-- panel-heading-->

        <div class="panel-body">
          @if(!$ticket)

            <div class="alert alert-danger">
                <p>No ticket found, sorry</p>
           </div>
          @else

          <div class="row">
            <span class="pull-right">
              @if($ticket->status === 'Open')
               <span class="statusopen"> {{$ticket->status}}</span>

               @elseif($ticket->status === 'Pending')
                 <span class="statuspending"> {{$ticket->status}}</span>

               @elseif($ticket->status === 'Closed')
                 <span class="statusclosed"> {{$ticket->status}}</span>

              @endif
            </span>
          </div>

          <br>

          <div class="row">
            @if(Auth::check())
            <span class="pull-right">
              @if($ticket->status === 'Closed')
                <a class="btn btn-info" href="{{ Route('ticket.edit', ['ticket_id' => $ticket->id]) }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
                <a class="btn btn-danger" href="{{ Route('ticket.trash', ['ticket_id' => $ticket->id]) }}" role="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Trash</a>
              @else
                <a class="btn btn-success" href="{{ Route('status.closed', ['ticket_id' => $ticket->id]) }}" role="button"><span class="glyphicon glyphicon-check" aria-hidden="true"></span> Mark Closed</a>
                <a class="btn btn-info" href="{{ Route('ticket.edit', ['ticket_id' => $ticket->id]) }}" role="button"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Edit</a>
                <a class="btn btn-danger" href="{{ Route('ticket.trash', ['ticket_id' => $ticket->id]) }}" role="button"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Trash</a>
              @endif
            </span>
            @endif

          </div>

            <table class="table">
              <tr>
                <td class="no-border"><b>Ticket ID:</b></td>
                <td class="no-border">{{$ticket->ticket_no}}</td>
              </tr>

              <tr>
                <td class="no-border"><b>Category</b></td>
                <td class="no-border">{{$ticket->category}}</td>
              </tr>

              <tr>
                <td class="no-border"><b>Priority:</b></td>
                <td class="no-border">{{$ticket->priority}}</td>
              </tr>

              <tr>
                <td class="no-border"><b>Created on:</b></td>
                <td class="no-border">{{$ticket->created_at->diffForHumans()}}</td>
              </tr>

              <tr>
                <td class="no-border"><b>Updated on:</b></td>
                <td class="no-border">{{$ticket->updated_at->diffForHumans()}}</td>
              </tr>

              <tr>
                <td class="no-border"><b>Name:</b></td>
                <td class="no-border">{{$ticket->name}}</td>
              </tr>

              <tr>
                <td class="no-border"><b>Email:</b></td>
                <td class="no-border">{{$ticket->email}}</td>
              </tr>

              <tr>
                <td class="no-border"><b>Subject:</b></td>
                <td class="no-border">{{$ticket->subject}}</td>
              </tr>

              <tr>
                <td class="no-border"><b>Message:</b></td>
                <td class="no-border">{{$ticket->message}}</td>
              </tr>

            </table><!--table-->

        </div><!--panel-body-->

      </div>

  @foreach ($ticket->comments as $comment)

    @if($comment->root_cause)

      <div class="panel panel-danger">
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

      <div class="panel panel-info">
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

      <div class="panel panel-success">
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


<!-- Popup Modals -->
    @if(Auth::check())
      <div class="hdesk-container">
        <div class="row">
          <div class="col-md-3">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#root-cause">Root Cause</button>
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
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#action-required">Action Required</button>
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
                    <a type="button" class="btn btn-default" data-dismiss="modal">Close</a>
                    <button type="submit" onclick="$('#action_required').submit();" class="btn btn-primary">Submit</button>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#corrective-action">Corrective Action</button>
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
      <br>
      @endif


@endif

</div><!-- end containter-->

@stop
