 Dear {{$ticket->name}},
 <br><br>
 We would like to acknowledge that we have received your request and a ticket has been created.
 An IT support representative will be reviewing your request and will send you a personal response.
 <br><br>
 To view the status of the ticket please click on the ticket id
 <a href="{{(url('results?ticket_id='.$ticket->ticket_no))}}">{{$ticket->ticket_no}}</a>
 <br><br>
 Thank you for your patience.
 <br><br>
 Sincerely,<br>
 Triad IT Department
