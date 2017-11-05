<?php

namespace App\Transformers;
use App\Topic;


class TopicTransformer extends \League\Fractal\TransformerAbstract {

  protected $availableIncludes =['user', 'posts'];

  public function transform(Topic $topic){
    return [
      'id' => $topic->id,
      'title' => $topic->title,
      'created_at' => $topic->created_at->toDateTimeString(),
      'created_at_human' => $topic->created_at->diffForHumans(),

    ];
  }
  public  function includeUser(Topic $topic){
    return $this->item($topic->user,  new UserTransformer);
  }

  public  function includePosts(Topic $topic){
    return $this->collection($topic->posts,  new PostTransformer);
  }

}
