<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;

use Hdesk\Http\Requests;

class TicketStatusController extends Controller
{
    public function getTicketStatus($ticket_status){
      dd('closed Tickets');
    }
}
