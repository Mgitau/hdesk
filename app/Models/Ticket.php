<?php

namespace Hdesk\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
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
}
