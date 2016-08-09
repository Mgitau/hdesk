<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hdesk\Http\Requests;
use Hdesk\Models\Ticket;
use Hdesk\Models\User;
use Hdesk\Models\Comment;

class CommentController extends Controller
{
    public function postComment(Request $request, $ticket_id){


      $this->validate($request,[
        'rootcause' => 'max:255',
        'actionrequired' => 'max:255',
        'correctiveaction' => 'max:255',
      ]);

       Comment::create([
        'ticket_id'  	=> $ticket_id,
        'user_id'     => Auth::user()->id,
        'root_cause'  => $request->input('rootcause'),
        'action_required' => $request->input('actionrequired'),
        'corrective_action' => $request->input('correctiveaction'),
      ]);

      //$comments = Comment::where('ticket_id',$ticket_id);

      dd('All Ok');

    //  return redirect()->back()->with('comments', $comments);

    }
}
