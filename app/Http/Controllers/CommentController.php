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

     return redirect()->back()->with('info', 'Comments Added');

    }

    public function getCommentDelete($comment_id){
      Comment::find($comment_id)->delete();

      return redirect()->back()->with('info', 'Comment has been deleted');


    }
}
