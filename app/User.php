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

      public function hasLikedPost(Post $post)
      {
        return $post->likes->where('user_id', $this->id)->count() === 1;

      }

    public function ownsTopic(Topic $topic){
      return $this->id === $topic->user->id;
    }


    public function ownsPost(Post $post){
      return $this->id === $post->user->id;
    }
}
