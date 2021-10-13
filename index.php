<?php 

require_once 'bootstrap.php';

if(isset($_GET['post_id']) && isset($_SESSION['loggedUser'])){
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

$posts = $post->selectAll('posts');



require_once 'views/index.view.php';
?>