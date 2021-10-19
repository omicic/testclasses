<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}

if(isset($_SESSION['loggedUser'])){
    if(isset($_POST['user_sub_btn'])){
        if($_SESSION['loggedUser']->role =='admin'){ 
        $user->registerUser('editor');
        } else {  
        $user->registerUser('proffesor'); 
        }
    }
}  

require_once 'views/adduser.view.php';