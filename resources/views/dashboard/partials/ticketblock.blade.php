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
      <b>Category</b>
    </td>
    <td>
      <b>Creator</b>
    </td>
    <td>
      <b>Date</b>
    </td>
  </tr>

  @foreach($tickets as $ticket)
  <tr>
    <td>
      {{$ticket->id}}
    </td>
    <td>
      {{$ticket->ticket_no}}
    </td>
    <td>
      {{$ticket->subject}}
    </td>
    <td>
      {{$ticket->priority}}
    </td>
    <td>
      {{$ticket->category}}
    </td>
    <td>
      {{$ticket->name}}
    </td>
    <td>
      {{$ticket->created_at}}
    </td>
  </tr>

  @endforeach
</table>
{!! $tickets->links() !!}
