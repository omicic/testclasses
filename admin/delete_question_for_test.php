<?php 
$title = "Delete question for test";
require "../core/init.php";

if(!isLogged()){
    header("Location: /testclass/index.php");
}

$admin = getUser($_SESSION['id']);

$question_for_delete_id = $_GET['id'];
$test_q=getTestQu($question_for_delete_id);

if(deleteTestQuestion($question_for_delete_id)){
    deleteQuestionFromDb($question_for_delete_id);
    header('Location: add_questions.php?id='.$test_q['test_id']);
}else{
    header("Location: /error.php");
} 

