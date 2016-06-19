<div class="table-responsive">
  <table class="table table-bordered">
    <tr>
      <td>
        <b>#</b>
      </td>
      <td>
        <b>Ticket ID</b>
      </td>
      <td>
        <b>Subject</b>
      </td>
      <td>
        <b>Priority</b>
      </td>
      <td>
        <b>Staus</b>
      </td>
      <td>
        <b>Category</b>
      </td>
      <td>
        <b>Creator</b>
      </td>
      <td>
        <b>Created</b>
      </td>
      <td>
        <b>Updated</b>
      </td>
      <td>
        <b>Actions</b>
      </td>
    </tr>

    @foreach($tickets as $ticket)
    <tr>
      <td>
        {{$ticket->id}}
      </td>
      <td>
        <a href="{{route('search.ticketbyid', ['ticketid' => $ticket->id])}}">{{$ticket->ticket_no}}</a>
      </td>
      <td>
        {{$ticket->subject}}
      </td>
      <td>
        {{$ticket->priority}}
      </td>
      <td>
        {{$ticket->status}}
      </td>
      <td>
        {{$ticket->category}}
      </td>
      <td>
        {{$ticket->name}}
      </td>
      <td>

        {{$ticket->created_at->diffForHumans()}}
      </td>
      <td>
        {{$ticket->updated_at->diffForHumans()}}
      </td>
      <td>
        <button type="button" name="button" class="btn btn-xs btn-default">Restore</button>
        <button type="button" name="button" class="btn btn-xs btn-danger">Delete</button>
      </td>
    </tr>

    @endforeach
  </table>
  {!! $tickets->links() !!}

</div>
