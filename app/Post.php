<?php

namespace App;

use App\Traits\Orderable;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Orderable;

    
    protected $fillable = ['body'];

    public function topic(){
      return $this->belongsTo(Topic::class);
    }

    public function user(){
      return $this->belongsTo(User::class);
    }
}
