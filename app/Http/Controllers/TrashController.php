<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;
use Hdesk\Models\Ticket;
use Hdesk\Http\Requests;

class TrashController extends Controller
{
    public function getTrashbin(){
<<<<<<< HEAD
      // $tickets = \Hdesk\Models\Ticket::onlyTrashed()->orderBy('id', 'desc')->paginate(10);
      $tickets = \Hdesk\Models\Ticket::withTrashed()->get();
    // dd($tickets);
=======
      $tickets = \Hdesk\Models\Ticket::onlyTrashed()->orderBy('id', 'desc')->paginate(15);
>>>>>>> 383e46e4a46d810ef386a578c061a044554de2c2
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
