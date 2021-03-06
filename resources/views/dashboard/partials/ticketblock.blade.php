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
        @if( $ticket->status === 'Open')
          <span class="label label-info">{{$ticket->status}}</span>

        @elseif( $ticket->status === 'Pending')
          <span class="label label-warning">{{$ticket->status}}</span>

        @elseif( $ticket->status === 'Closed')
          <span class="label label-success">{{$ticket->status}}</span>
        @endif

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
    </tr>

    @endforeach
  </table>
  {!! $tickets->links() !!}

</div>
