<?php

namespace Hdesk\Http\Controllers;

use DB;

use Hdesk\Models\Ticket;

use Illuminate\Http\Request;


class SearchController extends Controller
{
    //display the search page
	public function getSearch()
	{
		return view ('search.ticket');
	}


    //dispay the results after searching
    public function getResults(Request $request)
    {
        //Get ticket_id from the search from
        $ticket_id = $request->input('ticket_id');


        //Check if the ticket_id was supplied in the form
       if(!$ticket_id)
       {
           return redirect()->route('search.ticket');
       }

        //Perform search query on Database
        $ticket = DB::table('tickets')->where('ticket_no','LIKE', "%{$ticket_id}%")->first();

        //dd($ticket);

       return view('search.results')->with('ticket', $ticket);



    }

}
