<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}
$departments=$department->selectAll('departments');
$newTest=null;
if(isset($_POST['test_sub_btn'])){
  $user_id=$_SESSION['loggedUser']->id; 
  $department_id= $_POST['department_selection'];
  $newTest = $test->createTest($user_id);

 

}


require_once 'views/addtest.view.php';