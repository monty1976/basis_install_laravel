<?php 
namespace App\Post;

interface PostRepositoryInterface {
      
    public function getPostForNurseries($nursery_id);
    
    public function insertPost(Post $post);
}