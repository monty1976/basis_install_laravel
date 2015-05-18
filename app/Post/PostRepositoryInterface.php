<?php 
namespace App\Post;

interface PostRepositoryInterface {
    
    public function getPostByNurseryId($nursery_id);
    
    public function insertPost(Post $post);
}