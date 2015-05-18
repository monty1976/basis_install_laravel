<?php namespace App\Post;

class PostRepository implements PostRepositoryInterface {
    
    public function getPostByNurseryId($nursery_id){
        return Post::where('nursery_id', '=', $nursery_id)->take(3)->orderBy('date', 'desc')->get();
    }

    public function insertPost(Post $post){
        $post->save();
    }
}

