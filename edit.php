<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}

if(isset($_GET['post_id'])){ 
   $data = $post->selectById('posts',$_GET['post_id']);  
   var_dump($data[0]);
}

require_once 'views/editpost.view.php';