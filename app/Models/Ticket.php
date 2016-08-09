<?php

namespace Hdesk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

    protected $table ='tickets';

    protected $fillable = [
        'name',
        'email',
        'category',
        'priority',
        'subject',
        'message',
        'ticket_no',
        'attachment',
        'status',
    ];

    protected $dates = ['deleted_at'];


    // public function scopeOpenTicketCount(){
    //   return \Hdesk\Models\Ticket::where('status', 'Open')->count();
    // }
    //
    // public function scopePendingTicketCount(){
    //   return $PendingTickets = \Hdesk\Models\Ticket::where('status', 'Pending')->count();
    // }
    //
    // public function scopeClosedTicketCount(){
    //   return $ClosedTickets = \Hdesk\Models\Ticket::where('status', 'Closed')->count();
    // }

    public function comments(){
      return $this->hasMany('Hdesk\Models\Comment');
    }
}
