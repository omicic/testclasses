<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}



if(isset($_GET['id'])){ 
  $department->deleteById('departments',$_GET['id']);
  header('Location: show_departments.php');
}