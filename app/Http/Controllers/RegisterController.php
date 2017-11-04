<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Transformers\UserTransformer;

class RegisterController extends Controller
{
    //
    public function  register(StoreUserRequest $request){

      $user = new User;
      $user->username = $request->username;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);

      $user->save();

      return fractal()
       ->item($user)
       ->transformWith(new UserTransformer)
       ->toArray();
    }
}
