<?php 
$title = "Admin home";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

$admin = getUser($_SESSION['id']);
$categories = getCategories();
$id = $_GET['id'];
//$tests = getAllTestsFromAdmin($user['id']);
$test = getSingleTest($id);


 if($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];
  
    if(!isset($_POST['title']) || empty($_POST['title'])){
        $title_error = "Title is required";
        array_push($errors,$title_error);
    }else{
        $title = $_POST['title'];
    }
    if(!isset($_POST['body']) || empty($_POST['body'])){
        $body_error = "Body is required";
        array_push($errors,$body_error);
    }else{
        $body = $_POST['body'];
    }

    $timer = $_POST['timer'];

    if(count($errors) == 0){
        //dd($title);
        if(editTest($id,$title,$body,$_POST['category'],$_POST['public'],$timer)){
            //dd(true);
            header("Location: all_tests.php");
        }else{
            hedaer("Location: /testclass/error.php");
        }
    }
} 


require "./views/edit_test.view.php";