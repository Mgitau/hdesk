<?php

namespace Hdesk\Http\Controllers;

use Illuminate\Http\Request;

use Hdesk\Http\Requests;
use Hdesk\Models\Ticket;
use Hdesk\Models\Comment;
use Hdesk\Models\User;

class CommentController extends Controller
{
    public function postComment(Request $request, $id){


      $this->validate($request,[
        'rootcause' => 'max:255',
        'actionrequired' => 'max:255',
        'correctiveaction' => 'max:255',
      ]);

      $rootcause = $request->input('rootcause');
      $action_required = $request->input('actionrequired');
      $corrective_action = $request->input('correctiveaction');

      $username = User::$this()->getNameOrUsername();
      dd($username);
      // $comment = Comment

      // if($rootcause){
      //   dd($rootcause);
      // }elseif($action_required){
      //   dd($action_required);
      // }elseif($corrective_action){
      //   dd($corrective_action);
      // }



      dd($comment);


    }
}
