<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}


if(isset($_GET['post_id'])){ 
   $data = $post->selectById('posts',$_GET['post_id']);  
   
  // var_dump($data[0]);
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
  if($post->update($_GET['post_id'])){
        header('Location: post.php?post_id='.$_GET['post_id']);
    }else{
        header('Location: error.php');
    } 
}

   

require_once 'views/editpost.view.php';