<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;

use Hdesk\Http\Requests;
use Hdesk\Models\Ticket;

class CommentController extends Controller
{
    public function postComment(Request $request, $id){
      dd($id);
      $this->validate($request,[
        'message' => 'required|max:255',
      ]);
      $comment = $request->input('comment');

      dd($comment);


    }
}
