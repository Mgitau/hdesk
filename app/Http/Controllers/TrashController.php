<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;
use Hdesk\Models\Ticket;
use Hdesk\Http\Requests;

class TrashController extends Controller
{
    public function getTrashbin(){

      $tickets = Ticket::onlyTrashed()->where('deleted_at');
    //  $tickets = \Hdesk\Models\Ticket::withTrashed()->get();
      //$tickets = \Hdesk\Models\Ticket::onlyTrashed()->orderBy('id', 'desc')->paginate(15);
      return view('trash.trashbin')->with('tickets', $tickets);

    }

    public function getTrashTicket($id){
     $ticket = Ticket::find($id);
     $ticket->delete();
     return redirect()->route('tickets.open')->with('info', 'Ticket has been Trashed');

    }

//     public function getTrashbinRestore($id){
//       $ticket = Ticket::onlyTrashed()->where('id',$id)->restore();
//       return redirect()->back()->with('info', 'Ticket Restored');
//       //$this->getTrashBin();
//     }
 }
