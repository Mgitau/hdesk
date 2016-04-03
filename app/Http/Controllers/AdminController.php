<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;

use Hdesk\Http\Requests;

class AdminController extends Controller
{
    public function getLogin(){
      return view('admin.login');
    }
}
