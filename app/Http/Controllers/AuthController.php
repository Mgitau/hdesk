<?php

namespace Hdesk\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Hdesk\Models\User;


class AuthController extends Controller
{

  public function getNewAdmin()
  {
    return view('admin.newadmin');
  }

  public function postNewAdmin(Request $request)
  {
    $this->validate($request,[
      'first_name' => 'required|alpha|max:20',
      'last_name' => 'required|alpha|max:20',
      'username' => 'required|unique:users,username|alpha|max:20',
      'email' => 'required|unique:users,email|email|max:255',
      'password' => 'required|min:6',
    ]);

    User::create([
      'first_name' => $request->input('first_name'),
      'last_name' => $request->input('last_name'),
      'username' => $request->input('username'),
      'email' => $request->input('email'),
      'password' => bcrypt($request->input('password')),
    ]);

      return redirect()->route('home')->with('info', 'Admin Account created');
  }

  //Display login interface
  public function getLogin()
  {
    return view('admin.login');
  }

  public function postLogin(Request $request)
  {
    $this->validate($request, [
      'email'     => 'required',
      'password'  => 'required',
    ]);

    if(!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){
      return redirect()->back()->with('info', 'could not sign in with those details');
    }

    return redirect()->route('dashboard.index')->with('info', 'Welcome, You are now signed in');
  }

  public function getSignOut(){
    Auth::logout();

    return redirect()->route('home');
  }


}
