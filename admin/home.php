<?php 
$title = "Admin home";
require "../core/init.php";


if(!isLogged()){
    header("Location: /testclass/index.php");
}

//$admin = getUser($_SESSION['id']);



require "./views/home.view.php";