<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;


class User extends Authenticatable
{
    use Notifiable,HasApiTokens;


    // protected $appends =['avatar'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    // public function getAvatarAttribute(){
    //   return $this->avatar();
    // }

    public function avatar(){
      return 'https://www.redwolf.in/image/catalog/artwork-Images/mens/mr-robot-one-or-zero-artwork-india.png';
    }
}
