<?php 

require_once 'bootstrap.php';

$posts = $post->selectAll('posts');

if(isset($_SESSION['loggedUser'])){

    if($_SESSION['loggedUser']->role == 'user'){
        //Delete post - if user is logged get post_id from a href, select post, if exist delete post and delete image from uploads folder
        if(isset($_GET['post_id'])){   
            $p = $post->selectById('posts',$_GET['post_id']);
            if($p){
                $path = "uploads/" . $p[0]->imagepath;
                if($path){
                    if(!unlink($path)){
                        echo "Not Working";
                    } else {
                    $post->deleteById('posts',$_GET['post_id']);
                    } 
                } 
            }
        }
    }

    if($_SESSION['loggedUser']->role == 'editor'){
        //var_dump($_GET['role']);
        if(isset($_GET['role']) && $_GET['role'] === 'user'){
            $posts = $post->selectAllPublic('1','user');
            var_dump($posts);
        }
        
    }
   
} 










require_once 'views/index.view.php';
?>