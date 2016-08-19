<?php

namespace Hdesk\Http\Controllers;

use Mail;
use DB;
use Illuminate\Http\Request;
use Illuminate\Routing\UrlGenerator;
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
            'name' => 'max:20',
            'email' => 'required|email|max:255',
            'category' => 'required|max:255',
            'priority' => 'required|max:255',
            'subject' => 'required|max:255',
            'message' => 'required|max:255',
            'ticket_no' => 'required',
        ]);

        $ticket = \Hdesk\Models\Ticket::create([
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
       Mail::queue('ticket.email', ['ticket' => $ticket], function($message) use ($ticket){
           $message->to($ticket->email, $ticket->name)
                   ->subject('Ticket Received-'.$ticket->subject)
                   ->bcc('it@triad.co.ke', 'Triad IT Dpartment');
       });

       return redirect()->route('home')->with('info', 'Your ticket has been successfully submitted! Ticket ID: '.$ticketnumber);
     }

     public function getTicketEdit($id){
       $ticket = \Hdesk\Models\Ticket::where('id', 'LIKE', "%{$id}%")->first();
       return view('ticket.editticket')->with('ticket', $ticket);
     }

     public function postTicketEdit(Request $request){

        $this->validate($request, [
          'id' => 'required',
          'name' => 'required|max:20',
          'email' => 'required|email|max:255',
          'category' => 'required|max:255',
          'priority' => 'required|max:255',
          'subject' => 'required|max:255',
          'message' => 'required',
          'status'  => 'required',
        ]);

        $ticket_id = $request->input('id');

        $ticket = \Hdesk\Models\Ticket::where('id', "{$ticket_id}")
        ->update([
          'name'  => $request->input('name'),
          'email'  => $request->input('email'),
          'category'  => $request->input('category'),
          'priority'  => $request->input('priority'),
          'subject'  => $request->input('subject'),
          'message'  => $request->input('message'),
          'status'  => $request->input('status'),
        ]);

        return redirect()
              ->route('search.ticketbyid', ['ticket_id' => $ticket_id])
              ->with('info', 'Ticket has been edited');

     }





}
