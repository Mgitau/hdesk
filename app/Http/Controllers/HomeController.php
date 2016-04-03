<?php 

namespace Hdesk\Http\Controllers;

class HomeController extends Controller
{

	public function index()
	{
		return view ('home');
	}

}