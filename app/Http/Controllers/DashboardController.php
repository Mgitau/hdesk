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

    //Soft delete used , querry checking if deleted_at column is empty
   $tickets = DB::table('tickets')->whereNull('deleted_at')->orderBy('id', 'desc')->paginate(15);
   return view('dashboard.index')->with('tickets', $tickets);
  }





}
