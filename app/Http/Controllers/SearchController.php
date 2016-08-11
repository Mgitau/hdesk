<?php

namespace Hdesk\Http\Controllers;

use DB;
use Hdesk\Models\Ticket;
use Illuminate\Http\Request;
use  Illuminate\Pagination\LengthAwarePaginator ;

class SearchController extends Controller
{
		public function getSearch()
		{
			return view ('search.ticketsearch');
		}

    public function getResults(Request $request)
    {
				$ticket_id = $request->input('ticket_id');

	     if(!$ticket_id)
	     {
	         return redirect()->route('search.ticketsearch');
	     }

			 $ticket = \Hdesk\Models\Ticket::where('ticket_no', $ticket_id)->first();
	     return view('search.results')->with('ticket', $ticket);

    }

		public function getTicketById($ticketid)
		{

			$ticket = Ticket::withTrashed()->where('id','LIKE', "%{$ticketid}%")->first();
			return view('search.results')->with('ticket', $ticket);
		}


		public function getDashboardSearch(Request $request){
			$searchItem = $request->input('searchItem');

			if(!$searchItem){
				redirect()->Route('dashboard.index')->with('alert', 'Enter search value');
			}


			$searchItem = $request->input('searchItem');

			$tickets = \Hdesk\Models\Ticket::where(function($query) use ($searchItem){
															$query->where('name', 'LIKE', "%{$searchItem}%")
																		->orWhere('email', 'LIKE', "%{$searchItem}%")
																		->orWhere('subject', 'LIKE', "%{$searchItem}%")
																		->orwhere('ticket_no', 'LIKE', "%{$searchItem}%" );
			})
			->get();
			return view('dashboard.search')->with('tickets', $tickets);

		}

}
