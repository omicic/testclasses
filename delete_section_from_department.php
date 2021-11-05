<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}



if(isset($_GET['id'])){ 
  //var_dump($_GET['id']);
  //
  $departmentsections->deleteById('department_sections',$_GET['id']);
  //header('Location: show_department.php');
}