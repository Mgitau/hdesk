<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;

use Hdesk\Http\Requests;

class TicketStatusController extends Controller
{
  public function getOpenTickets(){

    $tickets = \Hdesk\Models\Ticket::Where('status', 'open')->orderBy('id', 'desc')->paginate(15);
    return view('dashboard.ticketstatus.open')->with('tickets', $tickets);

  }

  public function getPendingTickets(){
    $tickets = \Hdesk\Models\Ticket::Where('status', 'pending')->orderBy('id', 'desc')->paginate(15);
    return view('dashboard.ticketstatus.pending')->with('tickets', $tickets);
  }

  public function getClosedTickets(){
    $tickets = \Hdesk\Models\Ticket::Where('status', 'closed')->orderBy('id', 'desc')->paginate(15);
    return view('dashboard.ticketstatus.open')->with('tickets', $tickets);
  }

  public function getCloseTicket($id){
    $tickets = \Hdesk\Models\Ticket::where('id', "{$id}")->update(['Status' => 'Closed']);
    return redirect()->back()->with('info', 'Ticket Closed');
  }
}
