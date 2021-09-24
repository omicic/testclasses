<?php 
$title = "New post";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

$admin = getUser($_SESSION['id']);
//$categories = getCategories();
$categories = getAdminCategories($_SESSION['id']);
//$posts = getAllPostsFromUser($user['id']);


if($_SERVER['REQUEST_METHOD'] == "POST"){
    $errors = [];
    $time = $_POST['timer'] . ":00";
    //dd($time);
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


    if(count($errors) == 0){
     
            //save post to database
            $id = saveTest($admin['id'],$title,$body,$_POST['category'],$_POST['public'], $time);
            if($id){
                header("Location: add_questions.php?id=" . $id);
            }else{
                    $ups = "Ups, something went wrong";
            }    
    }
}

require "./views/new_test.view.php";