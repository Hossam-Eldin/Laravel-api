<?php

namespace App\Http\Controllers;
use App\Topic;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTopicRequest;

class TopicController extends Controller
{
    public function store(StoreTopicRequest $request){

      $topic =new Topic;
      $topic->title = $request->title;
      $topic->user()->associate($request->user());

      $post =new Post;
      $post->body =$request->body;
      $post->user()->associate($request->user());

      $topic->save();
      $topic->posts()->save($post);

    }
}
