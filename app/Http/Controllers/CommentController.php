<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;

use Hdesk\Http\Requests;

class CommentController extends Controller
{
    public function postComment(Request $request){

      $this->validate($request,[
        'message' => 'max:255',
      ]);
      $comment = $request->input('comment');
      $note =$request->input('note');

      if($comment){
        dd('This is a Comment');

      }elseif($note){
        dd('This is a note');
      }
    }
}
