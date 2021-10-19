<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}

if(isset($_SESSION['loggedUser']) && $_SESSION['loggedUser']->role =='admin'){ 

    if(isset($_POST['user_sub_btn'])){
        $user->registerUser('editor');
    }

}

require_once 'views/adduser.view.php';