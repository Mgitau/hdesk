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
			$searchItem = $request->input('searchItem');

			if(!$searchItem){
				//$this->validate($request, ['searchItem'	=> 'required']);
				redirect()->Route('dashboard.index')->with('info', 'Enter search value');
			}


			$searchItem = $request->input('searchItem');

			$tickets = DB::table('tickets')->where('name', 'LIKE', "%{$searchItem}%")
																		->orWhere('email', 'LIKE', "%{$searchItem}%")
																		->orWhere('subject', 'LIKE', "%{$searchItem}%")
																		->orwhere('ticket_no', 'LIKE', "%{$searchItem}%" )
																		->get();
																		//->paginate(5);

			return view('dashboard.search')->with('tickets', $tickets);

		}

}
