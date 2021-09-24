<?php 

require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

$admin = getUser($_SESSION['id']);


if($_SERVER['REQUEST_METHOD'] == "POST"){

   if($exist){  

         $all_public_tests = getAllTestsFromAdminCategory($user['id'],$all_categories[$index]['id']);
   

    }         

}