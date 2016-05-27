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
}
