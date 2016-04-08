<?php

namespace Hdesk\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
  protected $table ='admins';
    protected $fillable = [
        'email',
        'username',
        'password',
        'first_name',
        'last_name',
        'sudo_admin',
        'remember_token',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];
}
