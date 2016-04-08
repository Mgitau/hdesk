<?php

namespace Hdesk\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

use Hdesk\Http\Requests;

use Hdesk\Models\Admin;

class AdminController extends Controller
{

  public function getCreateAdmin()
  {
    return view('admin.createadmin');
  }

  public function postCreateAdmin(Request $request)
  {
    $this->validate($request,[
      'first_name' => 'required|alpha|max:20',
      'last_name' => 'required|alpha|max:20',
      'username' => 'required|unique:admins,username|alpha|max:20',
      'email' => 'required|unique:admins,email|email|max:255',
      'password' => 'required|min:6',
    ]);

    Admin::create([
      'first_name' => $request->input('first_name'),
      'last_name' => $request->input('last_name'),
      'username' => $request->input('username'),
      'email' => $request->input('email'),
      'password' => bcrypt($request->input('password')),
    ]);


// @todo Change redirect to dashboard index
    return redirect()->route('home')->with('info', 'Admin Account created');

  }
    //Display login interface
    public function getLogin(){
      return view('admin.login');
    }

    public function postLogin(Request $request)
    {
      $this->validate($request, [
        'email' => 'required',
        'password'  => 'required',
      ]);

      if(!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){
        return redirect()->back()->with('info', 'Could not sign you in with those details');
      }

      return redirect()->route('dashboard.index')->with('info', 'You are now signed in');
    }


}
