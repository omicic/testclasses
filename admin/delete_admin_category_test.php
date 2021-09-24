<?php 
$title = "Delete question for test";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

$admin = getUser($_SESSION['id']);

$admin_category_for_delete_id = $_GET['id'];

if(deleteAdminCategory($admin_category_for_delete_id)){
    header('Location: add_category.php');
}else{
    header("Location: /testclass/error.php");
} 

