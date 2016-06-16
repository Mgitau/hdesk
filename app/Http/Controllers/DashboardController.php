<?php

namespace Hdesk\Http\Controllers;

use Mail;
use DB;
use Illuminate\Http\Request;
use Hdesk\Models\Ticket;
use Hdesk\Http\Requests;
use Carbon\Carbon;


class DashboardController extends Controller
{

  public function getDashboard(){

    $tickets =\Hdesk\Models\Ticket::orderBy('id', 'desc')->paginate(15);
    return view('dashboard.index')->with('tickets', $tickets);

  }

  public function getOpenTickets(){

    $tickets = \Hdesk\Models\Ticket::Where('status', 'open')->orderBy('id', 'desc')->paginate(15);
    return view('dashboard.ticketstatus.open')->with('tickets', $tickets);

  }

  public function getPendingTickets(){
    $tickets = \Hdesk\Models\Ticket::Where('status', 'pending')->orderBy('id', 'desc')->paginate(15);
    return view('dashboard.ticketstatus.open')->with('tickets', $tickets);
  }

  public function getClosedTickets(){
    $tickets = \Hdesk\Models\Ticket::Where('status', 'closed')->orderBy('id', 'desc')->paginate(15);
    return view('dashboard.ticketstatus.open')->with('tickets', $tickets);
  }








}
