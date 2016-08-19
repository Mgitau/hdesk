<?php

namespace Hdesk\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable =[
      'ticket_id',
      'user_id',
      'root_cause',
      'action_required',
      'corrective_action',
    ];

    public function user(){
      return $this->belongsTo('Hdesk\Models\User');
    }

    public function ticket(){
      return $this->belongsTo('Hdesk\Models\ticket');
    }



}
