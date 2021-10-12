<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}

if(isset($_POST['post_sub_btn'])){
   
   $data = $post->createPost();
  

  
   //$errors = $post->getErrors();

   //var_dump($post);
  
}

require_once 'views/addpost.view.php';