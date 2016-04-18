<?php

namespace Hdesk\Models;

// use Illuminate\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\Authenticatable as AuthenticatableContract;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract//, CanResetPasswordContract
{
  use Authenticatable;
      //CanResetPassword;

    protected $fillable = [
      'email',
      'username',
      'password',
      'first_name',
      'last_name',
      'is_admin',
      'is_agent',
      'is_user',
      'remember_token',
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getName(){
      if($this->first_name && $this->last_name){
        return "{$this->first_name} {$this_last_name}";
      }

      if($this->first_name){
        return $this->first_name;
      }
    }

    public function getNameOrUsername(){
      return $this->getName() ?: $this->username;
    }
}
