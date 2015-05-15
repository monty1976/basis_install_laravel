<?php namespace App\Post;

class PostRepository implements PostRepositoryInterface {
    
    public function insertPost(Post $post){
        $post->save();
    }
}

