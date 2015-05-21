<?php namespace App\Post;

class PostRepository implements PostRepositoryInterface {
    
    public function getPostForNurseries($nursery_id){
        return Post::where('nursery_id', '=', $nursery_id)->orWhere('nursery_id', '=', 3)->with('nursery')->take(5)->orderBy('date', 'desc')->get();
    }

    public function insertPost(Post $post){
        $post->save();
    }
}

