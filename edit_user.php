<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}


if(isset($_GET['id'])){ 
   $data = $user->selectById('users',$_GET['id']);  
//var_dump($data);
  
}

if($_SERVER['REQUEST_METHOD'] == "POST"){

   if($post->update($_GET['id'])){
   }  
}

   

require_once 'views/edit_user.view.php';