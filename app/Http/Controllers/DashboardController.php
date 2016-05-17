<?php

namespace Hdesk\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Hdesk\Http\Requests;

class DashboardController extends Controller
{

  public function getDashboard(){
    return view('dashboard.index');
  }




}
