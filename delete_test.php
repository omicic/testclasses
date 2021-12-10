<?php 
require_once 'bootstrap.php';

if(!isset($_SESSION['loggedUser'])){
    header('Location: index.php');
}



if(isset($_GET['id'])){ 
  $test->deleteById('tests',$_GET['id']);
  header('Location: show_tests.php');
}