<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;
use Hdesk\Models\Ticket;
use Hdesk\Http\Requests;

class TrashController extends Controller
{
    public function getTrashbin(){

      $tickets = Ticket::onlyTrashed()->Where('deleted_at','!=','0000-00-00')->orderBy('id', 'desc')->paginate(15);
      return view('trash.trashbin')->with('tickets', $tickets);

    }

    public function getTrashTicket($id){
     $ticket = Ticket::find($id);
     $ticket->delete();
     return redirect()->route('tickets.open')->with('info', 'Ticket has been Trashed');

    }

    public function getTrashbinRestore($id){
      $ticket = Ticket::onlyTrashed()->where('id',$id)->restore();
      return redirect()->back()->with('info', 'Ticket Restored');
      //$this->getTrashBin();
    }

    public function getTrashbinDelete($id){
      $ticket = Ticket::onlyTrashed()->where('id',$id)->forcedelete();
      return redirect()->back()->with('info', 'Ticket Permanently Deleted');
    }
 }
