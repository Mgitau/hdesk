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

    public function User(){
      return $this->belongsTo('Hdesk\User');
    }
}
