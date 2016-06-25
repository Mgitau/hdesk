<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;
use Hdesk\Models\Ticket;
use Hdesk\Http\Requests;
use DB;

class TrashController extends Controller
{
    public function getTrashbin(){
      $tickets = \Hdesk\Models\Ticket::onlyTrashed()->orderBy('id', 'desc')->paginate(15);
      return view('trash.trashbin')->with('tickets', $tickets);
    }

    public function getTrashTicket($id){
     $ticket = \Hdesk\Models\Ticket::find($id)->delete();
     return redirect()->route('dashboard.index')->with('info', 'Ticket has been Trashed');

    }

    public function getTrashbinRestore($id){
      $ticket = \Hdesk\Models\Ticket::onlyTrashed()->where('id',$id)->restore();
      return redirect()->back()->with('info', 'Ticket Restored');
      //$this->getTrashBin();
    }
}
