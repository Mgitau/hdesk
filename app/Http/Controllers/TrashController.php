<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;
use Hdesk\Models\Ticket;
use Hdesk\Http\Requests;

class TrashController extends Controller
{
    public function getTrashbin(){
      // $tickets = \Hdesk\Models\Ticket::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
      $tickets = \Hdesk\Models\Ticket::withTrashed()->get();
    // dd($tickets);
      return view('trash.trashbin')->with('tickets', $tickets);
    }

    public function getTrashTicket($id){
     $ticket = \Hdesk\Models\Ticket::find($id)->delete();
     return redirect()->route('dashboard.index')->with('info', 'Ticket has been Trashed');

    }
}
