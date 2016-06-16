<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;
use Hdesk\Models\Ticket;
use Hdesk\Http\Requests;
use DB;

class TrashController extends Controller
{
    public function getTrashbin(){
    $tickets = Ticket::withTrashed()->orderBy('id', 'desc')->paginate(15);
    return view('trash.trashbin')->with('tickets', $tickets);
    }

    public function getTrashTicket($id){
     $ticket = \Hdesk\Models\Ticket::find($id)->delete();
     return redirect()->route('dashboard.index')->with('info', 'Ticket has been Trashed');

    }
}
