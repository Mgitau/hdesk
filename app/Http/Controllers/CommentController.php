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
      dd($note);

      // if($comment){
      //   dd($comment);
      //
      // }elseif($note){
      //   dd($note);
      // }
    }
}
