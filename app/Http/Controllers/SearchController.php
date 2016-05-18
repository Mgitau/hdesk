<?php

namespace Hdesk\Http\Controllers;

use DB;
use Hdesk\Models\Ticket;
use Illuminate\Http\Request;
use  Illuminate\Pagination\LengthAwarePaginator ;

class SearchController extends Controller
{
    //display the search page
	public function getSearch()
	{
		return view ('search.ticketsearch');
	}


    //dispay the results after searching
    public function getResults(Request $request)
    {
        //Get ticket_id from the search from
        $ticket_id = $request->input('ticket_id');


        //Check if the ticket_id was supplied in the form
       if(!$ticket_id)
       {
           return redirect()->route('search.ticketsearch');
       }

        //Perform search query on Database
        $ticket = DB::table('tickets')->where('ticket_no','LIKE', "%{$ticket_id}%")->first();

        //dd($ticket);

       return view('search.results')->with('ticket', $ticket);

    }

		public function getTicketById($ticketid)
		{

			$ticket = DB::table('tickets')->where('ticket_no','LIKE', "%{$ticketid}%")->first();

			//dd($ticket);

		 return view('search.results')->with('ticket', $ticket);

		}


		public function getDashboardSearch(Request $request){
			//dd('Result');

			$page = $request->input('page', 1);

			$paginate = 15;

			$searchItem = $request->input('searchItem');

			if(!$searchItem){
				return redirect()->Route('dashboard.index')->with('info', 'Enter a search value');
			}

			$name = DB::table('tickets')->where('name', 'LIKE', "%{$searchItem}%");
			$email = DB::table('tickets')->where('email', 'LIKE', "%{$searchItem}%");
			$subject = DB::table('tickets')->where('subject', 'LIKE', "%{$searchItem}%");
			$tickets = DB::table('tickets')->where('ticket_no', 'LIKE', "%{$searchItem}%" )
																			->union($name)
																			->union($email)
																			->union($subject)
																			->get();

			return view('dashboard.search')->with('tickets', $tickets);
/**
* @Todo Implement custom pagination below
*/
			// $results = DB::table('tickets')->where('ticket_no', 'LIKE', "%{$searchItem}%" )
			// 																->union($name)
			// 																->union($email)
			// 																->union($subject)
			// 																->get();

			// $slice = array_slice($results, $paginate * ($page -1), $paginate);
			// $tickets = new LengthAwarePaginator ($slice, count($results), $paginate);
			//
		  // return view('dashboard.index', compact('tickets'))->with('tickets', $tickets);

		}

}
