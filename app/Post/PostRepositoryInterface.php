<?php 
namespace App\Post;

interface PostRepositoryInterface {
    
    public function insertPost(Post $post);
}