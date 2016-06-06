<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;
use Hdesk\Models\Ticket;
use Hdesk\Http\Requests;
use DB;

class TrashController extends Controller
{
    public function getTrashbin(){

    // $tickets = DB::table('tickets')->whereNull('deleted_at')->orderBy('id', 'desc')->paginate(15);
    // $tickets = DB::table('tickets')->whereNotNull('deleted_at')->paginate(15);
    $tickets = Ticket::withTrashed()->paginate(15);
    return view('trash.trashbin')->with('tickets', $tickets);
    }
}
