<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}


if(isset($_GET['post_id'])){ 
   $data = $post->selectById('posts',$_GET['post_id']);  
   $oldImagepath = $data[0]->imagepath;
  //
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

   if($post->update($_GET['post_id'])){

    //delete from /uploads folder old image   
    $path = "uploads/" . $oldImagepath;
        if($path){
            if(!unlink($path)){
                echo "Not Working";
            } 
            header('Location: post.php?post_id='.$_GET['post_id']);
        }
    
    }else{
        header('Location: error.php');
    }  
}

   

require_once 'views/editpost.view.php';