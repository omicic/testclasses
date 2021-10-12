<?php 
require_once 'bootstrap.php';

//da ne moze da ide na register stranicu ako je logovan
if(isset($_SESSION['loggedUser'])){
    header("Location: index.php");
}

if(isset($_POST['registerBtn'])){
    $user->registerUser();
}

if(isset($_POST['loginBtn'])){
    
    $user->loginUser();
}

require_once 'views/login.register.view.php';?>