<?php 
$title = "Admin home";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

$admin = getUser($_SESSION['id']);
//$posts = getAllPostsFromUser($user['id']);
//dd($admin);
$test_id = $_GET['id'];
//dd($test_id);

if(deleteTest($test_id)){
    header('Location: all_tests.php');
}else{
    header("Location: /testclass/error.php");
}

require "./views/home.view.php";