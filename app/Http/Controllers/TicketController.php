<?php

namespace Hdesk\Http\Controllers;

use Mail;
use DB;
use Illuminate\Http\Request;
use Hdesk\Http\Requests;
use Hdesk\Models\Ticket;

class TicketController extends Controller
{
    public function getTicket()
    {
    	return view('ticket.newticket');
    }

    public function postTicket(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:20',
            'email' => 'required|email|max:255',
            'category' => 'required|max:255',
            'priority' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required',
            'ticket_no' => 'required',
        ]);

        $ticket = Ticket::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'category' => $request->input('category'),
            'priority' => $request->input('priority'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'ticket_no' => $request->input('ticket_no'),
            'status'  => $request->input('status'),
        ]);
        $ticketnumber =$request->input('ticket_no');

       //Send submitted ticket in an email
       Mail::send('ticket.email', ['ticket' => $ticket], function($message) use ($ticket){
           $message->to($ticket->email, $ticket->name)
                   ->subject($ticket->ticket_no)
                   ->bcc('it@triad.co.ke', 'Triad IT Dpartment');
       });

       return redirect()->route('home')->with('info', 'Your ticket has been successfully submitted! Ticket ID:'.$ticketnumber);
     }

     public function getTicketEdit($ticket_no){

       //get ticket data from database
       $ticket = DB::table('tickets')->where('ticket_no', 'LIKE', "%{$ticket_no}%")->first();

       //dd($ticket);

       return view('ticket.editticket')->with('ticket', $ticket);
     }

     public function postTicketEdit(Request $request){
        $this->validate($request, [
          'name' => 'required|max:20',
          'email' => 'required|email|max:255',
          'category' => 'required|max:255',
          'priority' => 'required|max:255',
          'subject' => 'required|max:255',
          'message' => 'required',
          'ticket_no' => 'required',
          'status'  => 'required',
        ]);


     }



}
