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










}
