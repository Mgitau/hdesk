<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;

use Hdesk\Http\Requests;



class AgentController extends Controller
{
  public function getCreateAgent()
  {
    return view('agent.createagent');
  }

  public function postCreateAgent(Request $request)
  {
    $this->validate($request,[
      'first_name' => 'required|alpha|max:20',
      'last_name' => 'required|alpha|max:20',
      'last_name' => 'required|unique:admins|alph|max:20',
      'email' => 'required|unique:admins|email|max:255',
      'password' => 'required|min:6',
    ]);

    dd("all ok");
  }

}
