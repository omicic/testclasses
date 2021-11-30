<?php 
require_once 'bootstrap.php';

/* $classes = $class->selectAll('classes');
var_dump($classes); */

//da ne moze da ide na register stranicu ako je logovan
if(isset($_SESSION['loggedUser'])){
    header("Location: index.php");
}

if(isset($_POST['registerBtn'])){
    $user->registerUser('user');
}

if(isset($_POST['loginBtn'])){
    $user->loginUser();
}

require_once 'views/login.register.view.php';?>